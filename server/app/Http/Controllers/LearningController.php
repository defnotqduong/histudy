<?php

namespace App\Http\Controllers;

use App\Http\Resources\AttachmentResource;
use App\Http\Resources\CertificateResource;
use App\Http\Resources\CertificateTemplateResource;
use App\Http\Resources\ChapterResourceCollection;
use App\Http\Resources\CourseResource;
use App\Http\Resources\LessonDiscussionResource;
use App\Http\Resources\LessonNoteResource;
use App\Http\Resources\LessonResource;
use App\Http\Resources\NotificationResource;
use App\Http\Resources\ReviewResource;
use App\Jobs\SendRabbitMQNotification;
use App\Models\Attachment;
use App\Models\Certificate;
use App\Models\Chapter;
use App\Models\Course;
use App\Models\Lesson;
use App\Models\LessonDiscussion;
use App\Models\LessonNote;
use App\Models\Notification;
use App\Models\Review;
use App\Models\UserProgress;
use App\Services\UploadService;
use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use setasign\Fpdi\Fpdi;
use Smalot\PdfParser\Parser;
use Illuminate\Http\UploadedFile;

class LearningController extends Controller
{

    protected $uploadService;

    public function __construct(UploadService $uploadService)
    {
        $this->middleware('auth:api', ['except' => ['getFreeLessonVideoUrl']]);

        $this->uploadService = $uploadService;
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

        $userReview = $course->reviews()->where('user_id', $user->id)->first();

        return response()->json([
            'success' => true,
            'message' => 'Course found',
            'course' => new CourseResource($course, false),
            'chapters' => new ChapterResourceCollection($course->publishedChapters, false),
            'review' => $userReview ? new ReviewResource($userReview) : null,
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
            ->orderBy('created_at', 'asc')
            ->get();

        $notes = LessonNote::where('lesson_id', $lessonId)
            ->where('user_id', $userId)
            ->orderBy('created_at', 'asc')
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
                'discussions' => LessonDiscussionResource::collection($discussions),
                'notes' => LessonNoteResource::collection($notes)
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

    public function checkCourseCompleted($slug)
    {
        $course = Course::findBySlug($slug);

        if (!$course) {
            return response()->json([
                'success' => false,
                'message' => 'Course not found'
            ], 404);
        }

        $lessons = $course->chapters()->with('lessons')->get()->flatMap(function ($chapter) {
            return $chapter->lessons->where('is_published', true);
        });

        if ($lessons->isEmpty()) {
            return response()->json([
                'success' => false,
                'message' => 'No lessons found in this course'
            ], 404);
        }

        $userId = Auth::id();
        $allLessonsCompleted = true;

        foreach ($lessons as $lesson) {
            $progress = $lesson->progress()->where('user_id', $userId)->first();

            if (!$progress || !$progress->is_completed) {
                $allLessonsCompleted = false;
                break;
            }
        }

        if ($allLessonsCompleted) {
            return response()->json([
                'success' => true,
                'message' => 'All lessons in this course are completed'
            ], 200);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Some lessons are not completed yet'
            ], 403);
        }
    }

    public function getCertificate($slug)
    {
        $user = Auth::user();

        $userId = $user->id;

        $course = Course::findBySlug($slug);

        if (!$course) {
            return response()->json([
                'success' => false,
                'message' => 'Course not found'
            ], 404);
        }

        $existingCertificate = Certificate::where('user_id', $userId)
            ->where('course_id', $course->id)
            ->first();

        if ($existingCertificate) {
            return response()->json([
                'success' => true,
                'is_exists' => true,
                'message' => 'Certificate already exists',
                'course' => [
                    'title' => $course->title,
                ],
                'cert' => new CertificateResource($existingCertificate)
            ], 200);
        }

        $isEnrolled = $user->purchasedCourses->contains($course->id);

        if (!$isEnrolled) {
            return response()->json([
                'success' => false,
                'message' => 'You have not enrolled in this course'
            ], 403);
        }

        $lessons = $course->chapters()->with('lessons')->get()->flatMap(function ($chapter) {
            return $chapter->lessons->where('is_published', true);
        });

        if ($lessons->isEmpty()) {
            return response()->json([
                'success' => false,
                'message' => 'No lessons found in this course'
            ], 404);
        }

        $allLessonsCompleted = true;

        foreach ($lessons as $lesson) {
            $progress = $lesson->progress()->where('user_id', $userId)->first();

            if (!$progress || !$progress->is_completed) {
                $allLessonsCompleted = false;
                break;
            }
        }

        if (!$allLessonsCompleted) {
            return response()->json([
                'success' => false,
                'message' => 'Some lessons are not completed yet'
            ], 403);
        }

        return response()->json([
            'success' => true,
            'is_exists' => false,
            'message' => 'Certificate not created',
            'course' => [
                'title' => $course->title,
            ],
            'cert' => new CertificateTemplateResource($course->certificateTemplate)
        ], 201);
    }

    public function createCertificate(Request $request, $slug)
    {
        $request->validate([
            'file' => 'required|image|max:4096',
        ]);

        $user = Auth::user();

        $userId = $user->id;

        $course = Course::findBySlug($slug);

        if (!$course) {
            return response()->json([
                'success' => false,
                'message' => 'Course not found'
            ], 404);
        }

        $existingCertificate = Certificate::where('user_id', $userId)
            ->where('course_id', $course->id)
            ->first();

        if ($existingCertificate) {
            return response()->json([
                'success' => true,
                'is_exists' => true,
                'message' => 'Certificate already exists',
                'cert' => new CertificateResource($existingCertificate)
            ], 200);
        }

        $isEnrolled = $user->purchasedCourses->contains($course->id);

        if (!$isEnrolled) {
            return response()->json([
                'success' => false,
                'message' => 'You have not enrolled in this course'
            ], 403);
        }

        $lessons = $course->chapters()->with('lessons')->get()->flatMap(function ($chapter) {
            return $chapter->lessons->where('is_published', true);
        });

        if ($lessons->isEmpty()) {
            return response()->json([
                'success' => false,
                'message' => 'No lessons found in this course'
            ], 404);
        }

        $allLessonsCompleted = true;

        foreach ($lessons as $lesson) {
            $progress = $lesson->progress()->where('user_id', $userId)->first();

            if (!$progress || !$progress->is_completed) {
                $allLessonsCompleted = false;
                break;
            }
        }

        if (!$allLessonsCompleted) {
            return response()->json([
                'success' => false,
                'message' => 'Some lessons are not completed yet'
            ], 403);
        }

        if ($request->hasFile('file')) {
            $file = $request->file('file');

            $uploadResult = $this->uploadService->multipartUploaderToS3('certificates', $file);

            if ($uploadResult['status']) {

                $certificate = Certificate::create([
                    'user_id' => $userId,
                    'course_id' => $course->id,
                    'cert_url' => $uploadResult['filePath'],
                    'issued_at' => now()
                ]);

                return response()->json([
                    'success' => true,
                    'message' => 'Certificate created successfully',
                    'cert' => new CertificateResource($certificate),
                ], 200);
            }

            return response()->json([
                'success' => false,
                'message' => 'Failed to create the certificate.',
            ], 500);
        }

        return response()->json([
            'success' => false,
            'message' => 'No file uploaded.',
        ], 400);
    }


    public function createDiscussion(Request $request, $lessonId)
    {
        $request->validate([
            'content' => 'required|string',
            'parent_id' => 'nullable|exists:lesson_discussions,id',
        ]);

        $user = Auth::user();
        $userId = $user->id;

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
            'content' => $request->content,
            'parent_id' => $request->parent_id ? $request->parent_id : null,
            'user_id' => $userId,
            'lesson_id' => $lessonId,
        ]);

        $discussions = LessonDiscussion::where('lesson_id', $lessonId)
            ->whereNull('parent_id')
            ->orderBy('created_at', 'asc')
            ->get();

        if ($request->parent_id) {
            $parentComment = LessonDiscussion::find($request->parent_id);

            if ($parentComment) {
                $receiverId = $parentComment->user_id;

                $notificationData = [
                    'sender_id' => $userId,
                    'receiver_id' => $receiverId,
                    'content' => $user->name . ' has replied to your comment in the course "' . $lesson->chapter->course->title . '".',
                    'noti_type' => 'lesson_comment_reply',
                ];

                $notification = Notification::create($notificationData);

                $notificationResourceArray = (new NotificationResource($notification))->toArray(request());

                (new SendRabbitMQNotification($notificationResourceArray))->handle();
            }
        }


        return response()->json([
            'success' => true,
            'message' => 'Comment created successfully!',
            'discussions' => LessonDiscussionResource::collection($discussions)
        ], 201);
    }


    public function createNoteLesson(Request $request, $lessonId)
    {

        $request->validate([
            'content' => 'required|string',
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

        LessonNote::createNote([
            'content' => $request->content,
            'user_id' => $userId,
            'lesson_id' => $lessonId,
        ]);

        $notes = LessonNote::where('lesson_id', $lessonId)
            ->where('user_id', $userId)
            ->orderBy('created_at', 'asc')
            ->get();


        return response()->json([
            'success' => true,
            'message' => 'Note created successfully!',
            'notes' => LessonNoteResource::collection($notes)
        ], 201);
    }

    public function deleteNoteLesson($lessonId, $noteId)
    {
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

        $note = LessonNote::where('id', $noteId)
            ->where('user_id', $userId)
            ->first();

        if (!$note) {
            return response()->json([
                'success' => false,
                'message' => 'Note not found '
            ], 404);
        }

        $note->delete();

        $notes = LessonNote::where('lesson_id', $lessonId)
            ->where('user_id', $userId)
            ->orderBy('created_at', 'asc')
            ->get();

        return response()->json([
            'success' => true,
            'message' => 'Note deleted successfully!',
            'notes' => LessonNoteResource::collection($notes)
        ], 201);
    }

    public function reviewCourse(Request $request, $courseId)
    {

        $request->validate([
            'content' => 'nullable|string',
            'rating' => 'required|integer|min:1|max:5'
        ]);

        $user = Auth::user();

        $course = Course::where('id', $courseId)
            ->where('is_published', true)
            ->first();


        if (!$course) {
            return response()->json([
                'success' => false,
                'message' => 'Lesson not found or not published'
            ], 404);
        }

        $isEnrolled = $course->customers()->where('user_id', $user->id)->exists();

        if (!$isEnrolled) {
            return response()->json([
                'success' => false,
                'message' => 'You have not enrolled in this course'
            ], 403);
        }

        $existingReview = Review::where('course_id', $courseId)
            ->where('user_id',  $user->id)
            ->first();

        if ($existingReview) {
            return response()->json([
                'success' => false,
                'message' => 'You have already reviewed this course'
            ], 400);
        }

        $review = Review::createReview([
            'course_id' => $courseId,
            'user_id' =>  $user->id,
            'content' => $request->content,
            'rating' => $request->rating
        ]);

        $notificationData = [
            'sender_id' => $user->id,
            'receiver_id' => $course->instructor_id,
            'content' => $user->name . ' has submitted a ' . $request->rating . '-star review for the course "' . $course->title . '".',
            'noti_type' => 'review',
        ];


        $notification = Notification::create($notificationData);

        $notificationResourceArray = (new NotificationResource($notification))->toArray(request());

        (new SendRabbitMQNotification($notificationResourceArray))->handle();

        return response()->json([
            'success' => true,
            'message' => 'Review created successfully!',
            'review' => new ReviewResource($review)
        ], 201);
    }
}
