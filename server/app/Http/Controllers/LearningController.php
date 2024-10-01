<?php

namespace App\Http\Controllers;

use App\Http\Resources\AttachmentResource;
use App\Http\Resources\ChapterResourceCollection;
use App\Http\Resources\CourseResource;
use App\Http\Resources\LessonDiscussionResource;
use App\Http\Resources\LessonResource;
use App\Models\Attachment;
use App\Models\Chapter;
use App\Models\Course;
use App\Models\Lesson;
use App\Models\LessonDiscussion;
use App\Models\UserProgress;
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

        $discussions = LessonDiscussion::where('lesson_id', $lessonId)
            ->whereNull('parent_id')
            ->orderBy('created_at', 'desc')
            ->get();


        $previousLesson = Lesson::where('position', '<', $lesson->position)
            ->where('chapter_id', $lesson->chapter_id)
            ->where('is_published', true)
            ->orderBy('position', 'desc')
            ->first();

        if (!$previousLesson) {
            $previousChapter = Chapter::where('course_id', $lesson->chapter->course_id)
                ->where('position', '<', $lesson->chapter->position)
                ->orderBy('position', 'desc')
                ->first();

            if ($previousChapter) {
                $previousLesson = Lesson::where('chapter_id', $previousChapter->id)
                    ->where('is_published', true)
                    ->orderBy('position', 'desc')
                    ->first();
            }
        }

        if ($previousLesson) {
            if (!$previousLesson->progress || !$previousLesson->progress->is_completed) {
                return response()->json([
                    'success' => false,
                    'message' => 'You must complete the previous lesson first.'
                ], 403);
            }
        }

        $nextLesson = Lesson::where('position', '>', $lesson->position)
            ->where('chapter_id', $lesson->chapter_id)
            ->where('is_published', true)
            ->orderBy('position', 'asc')
            ->first();

        if (!$nextLesson) {
            $nextChapter = Chapter::where('course_id', $lesson->chapter->course_id)
                ->where('position', '>', $lesson->chapter->position)
                ->orderBy('position', 'asc')
                ->first();

            if ($nextChapter) {
                $nextLesson = Lesson::where('chapter_id', $nextChapter->id)
                    ->where('is_published', true)
                    ->orderBy('position', 'asc')
                    ->first();
            }
        }


        return response()->json([
            'success' => true,
            'lesson' => [
                'info' => new LessonResource($lesson),
                'attachments' => AttachmentResource::collection($lesson->attachments),
                'discussions' => LessonDiscussionResource::collection($discussions)
            ],
            'previous_lesson_id' => $previousLesson ? $previousLesson->id : null,
            'next_lesson_id' => $nextLesson ? $nextLesson->id : null,
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

    public function updateCompletedLesson(Request $request)
    {
        $lessonId = $request->lesson_id;
        $userId = Auth::id();

        $userProgress = UserProgress::where('user_id', $userId)
            ->where('lesson_id', $lessonId)
            ->first();

        if (!$userProgress) {
            UserProgress::create([
                'user_id' => $userId,
                'lesson_id' => $lessonId,
                'is_completed' => true,
            ]);
        }

        return response()->json([
            'success' => true,
            'message' => 'Lesson completion status updated successfully.'
        ]);
    }

    public function createDiscussion(Request $request, $lessonId)
    {
        $request->validate([
            'comment' => 'required|string',
            'parent_id' => 'nullable|exists:lesson_discussions,id',
        ]);

        $userId = Auth::id();

        $lesson = Lesson::where('id', $lessonId)
            ->where('is_published', true)
            ->first();

        if (!$lesson) {
            return response()->json([
                'success' => false,
                'message' => 'Lesson not found or not published'
            ], 404);
        }

        $isEnrolled = $lesson->chapter->course->customers()->where('user_id', $userId)->exists();

        if (!$isEnrolled) {
            return response()->json([
                'success' => false,
                'message' => 'You have not enrolled in this course'
            ], 403);
        }

        $discussion = LessonDiscussion::createDiscussion([
            'comment' => $request->comment,
            'parent_id' => $request->parent_id ? $request->parent_id : null,
            'user_id' => $userId,
            'lesson_id' => $lessonId,
        ]);

        $discussions = LessonDiscussion::where('lesson_id', $lessonId)
            ->whereNull('parent_id')
            ->orderBy('created_at', 'desc')
            ->get();


        return response()->json([
            'success' => true,
            'message' => 'Comment created successfully!',
            'discussions' => LessonDiscussionResource::collection($discussions)
        ], 201);
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
