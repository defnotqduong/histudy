<?php

namespace App\Http\Controllers;

use App\Http\Requests\AssessmentRequest;
use App\Http\Resources\AssessmentResource;
use App\Http\Resources\QuestionResource;
use App\Http\Resources\QuestionResourceCollection;
use App\Models\Answer;
use App\Models\Assessment;
use App\Models\Course;
use App\Models\Question;
use App\Services\UploadService;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class AssessmentController extends Controller
{
    protected $uploadService;

    public function __construct(UploadService $uploadService)
    {
        $this->middleware('auth:api', ['except' => ['']]);

        $this->middleware(['role:instructor'], [
            'only' => [
                'getInstructorAssessments',
                'getAssessment',
                'createAssessment',
                'editAssessment',
                'deleteAssessment',
                'addQuestion',
                'getQuestion'
            ]
        ]);

        $this->uploadService = $uploadService;
    }

    public function getInstructorAssessments(Request $request)
    {
        $user = Auth::user();

        $courseId = $request->input('course_id');

        if ($courseId) {
            $assessments = Assessment::whereHas('course', function ($query) use ($user, $courseId) {
                $query->where('instructor_id', $user->id)
                    ->where('id', $courseId);
            })->with('course')->get();
        } else {
            $assessments = Assessment::whereHas('course', function ($query) use ($user) {
                $query->where('instructor_id', $user->id);
            })->with('course')->get();
        }

        return response()->json([
            'success' => true,
            'assessments' => AssessmentResource::collection($assessments)
        ]);
    }

    public function getAssessmentsForCourse($slug)
    {
        $user = Auth::user();

        $course = Course::where('slug', $slug)
            ->where('instructor_id', $user->id)
            ->first();

        if (!$course) {
            return response()->json([
                'success' => false,
                'message' => 'Course not found.',
            ], 404);
        }

        $assessments = $course->assessments;

        return response()->json([
            'success' => true,
            'assessments' => AssessmentResource::collection($assessments)
        ]);
    }

    public function createAssessment(AssessmentRequest $request, $slug)
    {

        $user = Auth::user();

        $course = Course::where('slug', $slug)
            ->where('instructor_id', $user->id)
            ->first();

        if (!$course) {
            return response()->json([
                'success' => false,
                'message' => 'Course not found.',
            ], 404);
        }

        $assessment = Assessment::create([
            'course_id' => $course->id,
            'title' => $request['title'],
            'description' => $request['description']
        ]);


        return response()->json([
            'success' => true,
            'assessment' => new AssessmentResource($assessment),
            'message' => 'Assessment created successfully.',
        ]);
    }

    public function getAssessment($slug, $id)
    {
        $user = Auth::user();

        $course = Course::where('slug', $slug)
            ->where('instructor_id', $user->id)
            ->first();

        if (!$course) {
            return response()->json([
                'success' => false,
                'message' => 'Course not found.',
            ], 404);
        }

        $assessment = $course->assessments()->where('id', $id)->first();

        if (!$assessment) {
            return response()->json([
                'success' => false,
                'message' => 'Assessment not found.',
            ], 404);
        }

        return response()->json([
            'success' => true,
            'assessment' => new AssessmentResource($assessment),
            'questions' => new QuestionResourceCollection($assessment->questions, true),
        ], 200);
    }

    public function editAssessment(AssessmentRequest $request, $slug, $id)
    {
        $user = Auth::user();

        $course = Course::where('slug', $slug)
            ->where('instructor_id', $user->id)
            ->first();

        if (!$course) {
            return response()->json([
                'success' => false,
                'message' => 'Course not found.',
            ], 404);
        }

        $assessment = $course->assessments()->where('id', $id)->first();

        if (!$assessment) {
            return response()->json([
                'success' => false,
                'message' => 'Assessment not found.',
            ], 404);
        }

        $assessment->update($request->all());

        return response()->json(['success' => true, 'message' => 'Course updated successfully', 'assessment' => new AssessmentResource($assessment)], 200);
    }

    public function deleteAssessment($slug, $id)
    {
        $user = Auth::user();

        $course = Course::where('slug', $slug)
            ->where('instructor_id', $user->id)
            ->first();

        if (!$course) {
            return response()->json([
                'success' => false,
                'message' => 'Course not found.',
            ], 404);
        }

        $assessment = $course->assessments()->where('id', $id)->first();

        if (!$assessment) {
            return response()->json([
                'success' => false,
                'message' => 'Assessment not found.',
            ], 404);
        }

        $assessment->delete();

        return response()->json([
            'success' => true,
            'message' => 'Assessment deleted successfully.',
        ], 200);
    }

    public function addQuestion(Request $request, $slug, $id)
    {
        $user = Auth::user();

        $course = Course::where('slug', $slug)
            ->where('instructor_id', $user->id)
            ->first();

        if (!$course) {
            return response()->json([
                'success' => false,
                'message' => 'Course not found.',
            ], 404);
        }

        $assessment = $course->assessments()->where('id', $id)->first();

        if (!$assessment) {
            return response()->json([
                'success' => false,
                'message' => 'Assessment not found.',
            ], 404);
        }

        $request->validate([
            'content' => 'required|string',
            'position' => 'nullable|integer',
            'answers' => 'required|array',
            'answers.*.content' => 'required|string',
            'answers.*.is_correct' => 'required|boolean',
        ]);

        $lastQuestion = Question::where('assessment_id', $assessment->id)->orderBy('position', 'desc')->first();

        $newPosition = $lastQuestion ? $lastQuestion->position + 1 : 1;

        $question = Question::create([
            'assessment_id' => $assessment->id,
            'content' => $request->content,
            'position' => $newPosition,
        ]);

        foreach ($request->answers as $answerData) {
            Answer::create([
                'question_id' => $question->id,
                'content' => $answerData['content'],
                'is_correct' => $answerData['is_correct'],
            ]);
        }

        return response()->json([
            'success' => true,
            'message' => 'Question and answers added successfully.',
        ], 201);
    }

    public function getQuestion($slug, $id, $questionId)
    {
        $user = Auth::user();

        $course = Course::where('slug', $slug)
            ->where('instructor_id', $user->id)
            ->first();

        if (!$course) {
            return response()->json([
                'success' => false,
                'message' => 'Course not found.',
            ], 404);
        }

        $assessment = $course->assessments()->where('id', $id)->first();

        if (!$assessment) {
            return response()->json([
                'success' => false,
                'message' => 'Assessment not found.',
            ], 404);
        }

        $question = Question::where('assessment_id', $id)
            ->where('id', $questionId)->first();

        if (!$question) {
            return response()->json([
                'success' => false,
                'message' => 'Question not found.',
            ], 404);
        }

        return response()->json([
            'success' => true,
            'question' => new QuestionResource($question)
        ], 200);
    }

    public function editQuestion(Request $request, $slug, $id, $questionId)
    {
        $user = Auth::user();

        $course = Course::where('slug', $slug)
            ->where('instructor_id', $user->id)
            ->first();

        if (!$course) {
            return response()->json([
                'success' => false,
                'message' => 'Course not found or unauthorized access.',
            ], 404);
        }

        $assessment = $course->assessments()->where('id', $id)->first();

        if (!$assessment) {
            return response()->json([
                'success' => false,
                'message' => 'Assessment not found.',
            ], 404);
        }

        $question = Question::where('assessment_id', $id)
            ->where('id', $questionId)
            ->first();

        if (!$question) {
            return response()->json([
                'success' => false,
                'message' => 'Question not found.',
            ], 404);
        }

        $request->validate([
            'content' => 'nullable|string',
            'answers' => 'nullable|array',
            'answers.*.content' => 'nullable|string',
            'answers.*.is_correct' => 'nullable|boolean',
            'answers.*.id' => 'nullable|exists:answers,id',
            'answers.*.delete' => 'nullable|boolean',
        ]);

        if ($request->has('content')) {
            $question->content = $request->content;
        }

        if ($request->has('answers')) {
            foreach ($request->answers as $answerData) {

                if (isset($answerData['delete']) && $answerData['delete'] == true) {
                    if (isset($answerData['id'])) {

                        $answer = Answer::where('question_id', $question->id)
                            ->where('id', $answerData['id'])
                            ->first();

                        if ($answer) {
                            $answer->delete();
                        }
                    }
                } elseif (isset($answerData['id'])) {
                    $answer = Answer::where('question_id', $question->id)
                        ->where('id', $answerData['id'])
                        ->first();

                    if ($answer) {
                        if (isset($answerData['content'])) {
                            $answer->content = $answerData['content'];
                        }
                        if (isset($answerData['is_correct'])) {
                            $answer->is_correct = $answerData['is_correct'];
                        }
                        $answer->save();
                    }
                } else {
                    Answer::create([
                        'question_id' => $question->id,
                        'content' => $answerData['content'],
                        'is_correct' => $answerData['is_correct'],
                    ]);
                }
            }
        }


        $question->save();

        return response()->json([
            'success' => true,
            'message' => 'Question and answers updated successfully.',
            'question' => new QuestionResource($question)
        ], 200);
    }

    public function reorderQuestion(Request $request, $slug, $id)
    {
        $user = Auth::user();

        $course = Course::where('slug', $slug)
            ->where('instructor_id', $user->id)
            ->first();

        if (!$course) {
            return response()->json([
                'success' => false,
                'message' => 'Course not found or unauthorized access.',
            ], 404);
        }

        $assessment = $course->assessments()->where('id', $id)->first();

        if (!$assessment) {
            return response()->json([
                'success' => false,
                'message' => 'Assessment not found.',
            ], 404);
        }

        $items = $request->items;

        foreach ($items as $item) {
            $question = Question::where('id', $item['id'])
                ->where('assessment_id', $assessment->id)
                ->first();

            $question->update(
                [
                    'position' => $item['position']
                ]
            );
        }

        return response()->json([
            'success' => true,
            'message' => 'Question reorder Successfully'
        ], 200);
    }

    public function deleteQuestion($slug, $id, $questionId)
    {
        $user = Auth::user();

        $course = Course::where('slug', $slug)
            ->where('instructor_id', $user->id)
            ->first();

        if (!$course) {
            return response()->json([
                'success' => false,
                'message' => 'Course not found or unauthorized access.',
            ], 404);
        }

        $assessment = $course->assessments()->where('id', $id)->first();

        if (!$assessment) {
            return response()->json([
                'success' => false,
                'message' => 'Assessment not found.',
            ], 404);
        }

        $question = Question::where('assessment_id', $id)
            ->where('id', $questionId)
            ->first();

        if (!$question) {
            return response()->json([
                'success' => false,
                'message' => 'Question not found.',
            ], 404);
        }

        $question->delete();

        return response()->json([
            'success' => true,
            'message' => 'Question deleted successfully.',
        ], 200);
    }
}
