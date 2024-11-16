<?php

namespace App\Http\Controllers;

use App\Http\Requests\AttachmentRequest;
use App\Models\Attachment;
use App\Models\Chapter;
use App\Models\Course;
use App\Models\Lesson;
use App\Services\UploadService;
use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AttachmentController extends Controller
{

    protected $uploadService;
    public function __construct(UploadService $uploadService)
    {
        $this->middleware('auth:api', ['except' => ['']]);

        $this->middleware(['role:instructor'], [
            'only' => [
                'createLessonAttachment',
                'deleteLessonAttachment'
            ]
        ]);

        $this->uploadService = $uploadService;
    }

    public function createLessonAttachment(AttachmentRequest $request, $slug, $chapterId, $lessonId)
    {
        $userId = Auth::id();

        $course = Course::where('slug', $slug)
            ->where('instructor_id', $userId)
            ->first();


        if (!$course) {
            return response()->json(['success' => false, 'message' => 'Course not found'], 404);
        }

        $chapter = Chapter::where('id', $chapterId)
            ->where('course_id', $course->id)
            ->first();


        if (!$chapter) {
            return response()->json(['success' => false, 'message' => 'Chapter not found'], 404);
        }

        $lesson = Lesson::where('id', $lessonId)
            ->where('chapter_id', $chapter->id)
            ->first();


        if (!$lesson) {
            return response()->json(['success' => false, 'message' => 'Lesson not found'], 404);
        }


        if ($request->hasFile('attachment')) {
            $file = $request->file('attachment');

            $uploadResult = $this->uploadService->multipartUploaderToS3('files', $file);

            if ($uploadResult['status']) {

                $data = [
                    'name' => $uploadResult['fileName'],
                    'attachment_url' => $uploadResult['filePath'],
                    'lesson_id' => $lesson->id,
                ];

                Attachment::createAttachment($data);

                return response()->json(['success' => true, 'message' => 'Attachment added successfully'], 200);
            }

            return response()->json([
                'success' => false,
                'message' => 'Failed to upload image.',
            ], 500);
        }

        return response()->json([
            'success' => false,
            'message' => 'No file uploaded.',
        ], 400);
    }

    public function deleteLessonAttachment(Request $request, $slug, $chapterId, $lessonId, $id)
    {
        $userId = Auth::id();

        $course = Course::where('slug', $slug)
            ->where('instructor_id', $userId)
            ->first();


        if (!$course) {
            return response()->json(['success' => false, 'message' => 'Course not found'], 404);
        }

        $chapter = Chapter::where('id', $chapterId)
            ->where('course_id', $course->id)
            ->first();


        if (!$chapter) {
            return response()->json(['success' => false, 'message' => 'Chapter not found'], 404);
        }

        $lesson = Lesson::where('id', $lessonId)
            ->where('chapter_id', $chapter->id)
            ->first();


        if (!$lesson) {
            return response()->json(['success' => false, 'message' => 'Lesson not found'], 404);
        }

        $attachment = Attachment::where('id', $id)
            ->where('lesson_id', $lesson->id)
            ->first();

        if (!$attachment) {
            return response()->json(['success' => false, 'message' => 'Attachment not found'], 404);
        }

        $this->uploadService->deleteObjectS3($attachment->attachment_url);

        $attachment->deleteAttachment();

        return response()->json(['success' => true, 'message' => 'Attachment deleted successfully'], 200);
    }
}
