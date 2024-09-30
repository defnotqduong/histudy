<?php

namespace App\Http\Controllers;

use App\Http\Resources\AttachmentResource;
use App\Http\Resources\ChapterResourceCollection;
use App\Http\Resources\CourseResource;
use App\Http\Resources\LessonResource;
use App\Models\Attachment;
use App\Models\Course;
use App\Models\Lesson;
use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LearningController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api', ['except' => ['']]);
    }

    public function getLearningInfo(Request $request, $slug)
    {
        $user = Auth::user();

        $course = Course::findBySlug($slug);

        if (!$course) {
            return response()->json([
                'success' => false,
                'message' => 'Course not found'
            ], 404);
        }

        $isEnrolled = $user->purchasedCourses->contains($course->id);

        if (!$isEnrolled) {
            return response()->json([
                'success' => false,
                'message' => 'You have not enrolled in this course'
            ], 403);
        }

        return response()->json([
            'success' => true,
            'message' => 'Course found',
            'course' => new CourseResource($course, false),
            'chapters' => new ChapterResourceCollection($course->publishedChapters, false),
        ], 200);
    }

    public function getLessonInfo($lessonId)
    {
        $lesson = Lesson::where('id', $lessonId)
            ->where('is_published', true)
            ->with('chapter.course')
            ->first();

        if (!$lesson) {
            return response()->json([
                'success' => false,
                'message' => 'Lesson not found or not published'
            ], 404);
        }

        $userId = Auth::id();

        $isEnrolled = $lesson->chapter->course->customers()->where('user_id', $userId)->exists();

        if (!$isEnrolled) {
            return response()->json([
                'success' => false,
                'message' => 'You have not enrolled in this course'
            ], 403);
        }

        return response()->json([
            'success' => true,
            'lesson' => [
                'info' => new LessonResource($lesson),
                'attachments' => AttachmentResource::collection($lesson->attachments)
            ]
        ], 200);
    }

    public function getFreeLessonVideoUrl($lessonId)
    {

        $lesson = Lesson::where('id', $lessonId)
            ->where('is_published', true)
            ->first();

        if (!$lesson) {
            return response()->json([
                'success' => false,
                'message' => 'Lesson not found or not published'
            ], 404);
        }

        if (!$lesson->is_free) {
            return response()->json([
                'success' => false,
                'message' => 'This lesson is not free'
            ], 403);
        }

        return response()->json([
            'success' => true,
            'video_url' => $lesson->video_url
        ], 200);
    }

    public function getAttachmentSignedUrl($attachmentId)
    {
        $attachment = Attachment::find($attachmentId);

        if (!$attachment) {
            return response()->json([
                'success' => false,
                'message' => 'Attachment not found'
            ], 404);
        }

        $userId = Auth::id();

        $isEnrolled = $attachment->lesson->chapter->course->customers()->where('user_id', $userId)->exists();

        if (!$isEnrolled) {
            return response()->json([
                'success' => false,
                'message' => 'You have not enrolled in this course'
            ], 403);
        }

        $url = Cloudinary::getUrl($attachment->attachment_public_id, [
            'sign_url' => true,
            'resource_type' => 'raw',
            'attachment' => true,
            'expires_at' => now()->addMinutes(30),
        ]);

        return response()->json(['success' => true, 'signed_url' => $url], 200);
    }
}
