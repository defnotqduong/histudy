<?php

namespace App\Http\Controllers;

use App\Http\Requests\AttachmentRequest;
use App\Models\Attachment;
use App\Models\Chapter;
use App\Models\Course;
use App\Models\Lesson;
use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AttachmentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api', ['except' => ['']]);

        $this->middleware(['role:instructor'], [
            'only' => [
                'createLessonAttachment',
                'deleteLessonAttachment'
            ]
        ]);
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
            $cloudinaryFile = Cloudinary::uploadFile($request->file('attachment')->getRealPath(), [
                'folder' => 'files',
            ]);

            $url = $cloudinaryFile->getSecurePath();
            $publicId = $cloudinaryFile->getPublicId();
            $name = $request->file('attachment')->getClientOriginalName();

            $data = [
                'name' => $name,
                'attachment_url' => $url,
                'attachment_public_id' => $publicId,
                'lesson_id' => $lesson->id,
            ];

            Attachment::createAttachment($data);
        }

        return response()->json(['success' => true, 'message' => 'Attachment added successfully'], 200);
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

        Cloudinary::destroy($attachment->attachment_public_id);

        $attachment->deleteAttachment();

        return response()->json(['success' => true, 'message' => 'Attachment deleted successfully'], 200);
    }
}
