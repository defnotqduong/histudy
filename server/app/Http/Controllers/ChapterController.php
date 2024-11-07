<?php

namespace App\Http\Controllers;

use App\Http\Requests\ChapterRequest;
use App\Http\Requests\VideoRequest;
use App\Http\Resources\ChapterResource;
use App\Models\Chapter;
use App\Models\Course;
use App\Services\UploadService;
use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ChapterController extends Controller
{

    protected $uploadService;

    public function __construct(UploadService $uploadService)
    {
        $this->middleware('auth:api', ['except' => ['']]);

        $this->middleware(['role:instructor'], [
            'only' => [
                'createChapter',
                'getChapter',
                'updateChapter',
                'reorderChapter',
                'uploadChapterVideo',
                'publishChapter',
                'unpublishChapter',
                'deleteChapter'
            ]
        ]);

        $this->uploadService = $uploadService;
    }

    public function createChapter(ChapterRequest $request, $slug)
    {
        $userId = Auth::id();

        $course = Course::where('slug', $slug)
            ->where('instructor_id', $userId)
            ->first();


        if (!$course) {
            return response()->json(['success' => false, 'message' => 'Course not found'], 404);
        }

        $title = $request->title;
        $lastChapter = Chapter::where('course_id', $course->id)->orderBy('position', 'desc')->first();
        $newPosition = $lastChapter ? $lastChapter->position + 1 : 1;

        $data = [
            'title' => $title,
            'course_id' => $course->id,
            'position' => $newPosition,
            'is_free' => $course->price == 0
        ];

        $chapter = Chapter::createChapter($data);

        return response()->json([
            'success' => true,
            'message' => 'Chapter created successfully',
            'chapter' => new ChapterResource($chapter)
        ], 200);
    }

    public function getChapter(Request $request, $slug, $id)
    {
        $userId = Auth::id();

        $course = Course::where('slug', $slug)
            ->where('instructor_id', $userId)
            ->first();


        if (!$course) {
            return response()->json(['success' => false, 'message' => 'Course not found'], 404);
        }

        $chapter = Chapter::where('id', $id)
            ->where('course_id', $course->id)
            ->first();

        if (!$chapter) {
            return response()->json(['success' => false, 'message' => 'Chapter not found'], 404);
        }

        return response()->json([
            'success' => true,
            'message' => 'Chapter found',
            'chapter' => new ChapterResource($chapter)
        ], 200);
    }

    public function updateChapter(ChapterRequest $request, $slug, $id)
    {
        $userId = Auth::id();

        $course = Course::where('slug', $slug)
            ->where('instructor_id', $userId)
            ->first();


        if (!$course) {
            return response()->json(['success' => false, 'message' => 'Course not found'], 404);
        }

        $chapter = Chapter::where('id', $id)
            ->where('course_id', $course->id)
            ->first();

        if (!$chapter) {
            return response()->json(['success' => false, 'message' => 'Chapter not found'], 404);
        }

        $chapter->updateChapter($request->all());

        return response()->json(['success' => true, 'message' => 'Chapter updated successfully', 'chapter' => new ChapterResource($chapter)], 200);
    }

    public function reorderChapter(Request $request, $slug)
    {
        $userId = Auth::id();

        $course = Course::where('slug', $slug)
            ->where('instructor_id', $userId)
            ->first();


        if (!$course) {
            return response()->json(['success' => false, 'message' => 'Course not found'], 404);
        }

        $items = $request->items;

        foreach ($items as $item) {
            $chapter = Chapter::where('id', $item['id'])
                ->where('course_id', $course->id)
                ->first();

            $chapter->updateChapter($item);
        }

        return response()->json([
            'success' => true,
            'message' => 'Chapter reorder Successfully'
        ], 200);
    }


    public function publishChapter(Request $request, $slug, $id)
    {
        $userId = Auth::id();

        $course = Course::where('slug', $slug)
            ->where('instructor_id', $userId)
            ->first();


        if (!$course) {
            return response()->json(['success' => false, 'message' => 'Course not found'], 404);
        }

        $chapter = Chapter::where('id', $id)
            ->where('course_id', $course->id)
            ->first();

        if (!$chapter) {
            return response()->json(['success' => false, 'message' => 'Chapter not found'], 404);
        }

        $hasPublishedLesson = $chapter->lessons->contains('is_published', true);

        if (!$chapter->title || !$hasPublishedLesson) {
            return response()->json(['success' => false, 'message' => 'Missing required fields'], 400);
        }

        $chapter->updateChapter([
            'is_published' => true
        ]);

        return response()->json(['success' => true, 'message' => 'Chapter published successfully'], 200);
    }

    public function unpublishChapter(Request $request, $slug, $id)
    {
        $userId = Auth::id();

        $course = Course::where('slug', $slug)
            ->where('instructor_id', $userId)
            ->first();


        if (!$course) {
            return response()->json(['success' => false, 'message' => 'Course not found'], 404);
        }

        $chapter = Chapter::where('id', $id)
            ->where('course_id', $course->id)
            ->first();

        if (!$chapter) {
            return response()->json(['success' => false, 'message' => 'Chapter not found'], 404);
        }

        $chapter->updateChapter([
            'is_published' => false
        ]);

        return response()->json(['success' => true, 'message' => 'Chapter unpublished successfully'], 200);
    }

    public function deleteChapter(Request $request, $slug, $id)
    {
        $userId = Auth::id();

        $course = Course::where('slug', $slug)
            ->where('instructor_id', $userId)
            ->first();


        if (!$course) {
            return response()->json(['success' => false, 'message' => 'Course not found'], 404);
        }

        $chapter = Chapter::where('id', $id)
            ->where('course_id', $course->id)
            ->first();

        if (!$chapter) {
            return response()->json(['success' => false, 'message' => 'Chapter not found'], 404);
        }

        foreach ($chapter->lessons as $lesson) {

            if ($lesson->video_url) {
                $this->uploadService->deleteObjectS3($lesson->video_url);
            }

            foreach ($lesson->attachments as $attachment) {
                if ($attachment->attachment_url) {
                    $this->uploadService->deleteObjectS3($attachment->attachment_url);
                }

                $attachment->deleteAttachment();
            }
            $lesson->deleteLesson();
        }

        $chapter->deleteChapter();

        return response()->json(['success' => true, 'message' => 'Chapter deleted successfully'], 200);
    }
}
