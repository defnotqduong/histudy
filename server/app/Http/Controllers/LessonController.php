<?php

namespace App\Http\Controllers;

use App\Http\Requests\LessonRequest;
use App\Http\Requests\VideoRequest;
use App\Http\Resources\AttachmentResource;
use App\Http\Resources\LessonResource;
use App\Models\Chapter;
use App\Models\Course;
use App\Models\Lesson;
use App\Services\UploadService;
use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LessonController extends Controller
{

    protected $uploadService;

    public function __construct(UploadService $uploadService)
    {
        $this->middleware('auth:api', ['except' => []]);

        $this->middleware(['role:instructor'], [
            'only' => [
                'createLesson',
                'getLesson',
                'updateLesson',
                'reorderLesson',
                'uploadLessonVideo',
                'publishLesson',
                'unpublishLesson',
                'deleteLesson'

            ]
        ]);

        $this->uploadService = $uploadService;
    }

    public function createLesson(LessonRequest $request, $slug, $chapterId)
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

        $title = $request->title;
        $lastLesson = Lesson::where('chapter_id', $chapter->id)->orderBy('position', 'desc')->first();
        $newPosition = $lastLesson ? $lastLesson->position + 1 : 1;

        $data = [
            'title' => $title,
            'chapter_id' => $chapter->id,
            'position' => $newPosition,
            'is_free' => $course->price == 0
        ];

        $lesson = Lesson::createLesson($data);

        return response()->json([
            'success' => true,
            'message' => 'Lesson created successfully',
            'lesson' => new LessonResource($lesson)
        ], 200);
    }

    public function getLesson(Request $request, $slug, $chapterId, $id)
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

        $lesson = Lesson::where('id', $id)
            ->where('chapter_id', $chapter->id)
            ->first();


        if (!$lesson) {
            return response()->json(['success' => false, 'message' => 'Lesson not found'], 404);
        }

        return response()->json([
            'success' => true,
            'message' => 'Chapter found',
            'lesson' => new LessonResource($lesson),
            'attachments' => AttachmentResource::collection($lesson->attachments)
        ], 200);
    }

    public function updateLesson(LessonRequest $request, $slug, $chapterId, $id)
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

        $lesson = Lesson::where('id', $id)
            ->where('chapter_id', $chapter->id)
            ->first();


        if (!$lesson) {
            return response()->json(['success' => false, 'message' => 'Lesson not found'], 404);
        }

        $lesson->updateLesson($request->all());

        return response()->json(['success' => true, 'message' => 'Lesson updated successfully', 'lesson' => new LessonResource($lesson)], 200);
    }

    public function reorderLesson(Request $request, $slug, $chapterId)
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

        $items = $request->items;

        foreach ($items as $item) {
            $lesson = Lesson::where('id', $item['id'])
                ->where('chapter_id', $chapter->id)
                ->first();

            $lesson->updateLesson($item);
        }

        return response()->json([
            'success' => true,
            'message' => 'Lesson reorder Successfully'
        ], 200);
    }

    public function uploadLessonVideo(VideoRequest $request,  $slug, $chapterId, $id)
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

        $lesson = Lesson::where('id', $id)
            ->where('chapter_id', $chapter->id)
            ->first();


        if (!$lesson) {
            return response()->json(['success' => false, 'message' => 'Lesson not found'], 404);
        }

        if ($request->hasFile('video')) {

            $file = $request->file('video');

            $uploadResult = $this->uploadService->multipartUploaderToS3('videos', $file);

            if ($uploadResult['status']) {

                if ($lesson->video_url) {
                    $this->uploadService->deleteObjectS3($lesson->video_url);
                }

                $lesson->updateLesson([
                    'video_url' => $uploadResult['filePath'],
                    'video_duration' =>  $request->duration
                ]);

                return response()->json(
                    [
                        'success' => true,
                        'message' => 'Video updated successfully',
                        'chapter' => new LessonResource($lesson),
                    ],
                    200
                );
            }
        }

        // if ($request->hasFile('video')) {
        //     $file = $request->file('video');


        //     $uploadResult = $this->uploadService->multipartUploaderToS3('videos', $file);

        //     if ($uploadResult['status']) {
        //         $fileKey = 'videos/' . $uploadResult['fileName'];

        //         $hlsUploadResult = $this->uploadService->convertMp4ToHlsAndUpload($fileKey);

        //         if ($hlsUploadResult['status']) {
        //             $m3u8FileUrl = collect($hlsUploadResult['uploadedFiles'])
        //                 ->first(fn($filePath) => str_ends_with($filePath, '.m3u8'));

        //             if (!$m3u8FileUrl) {
        //                 return response()->json(['success' => false, 'message' => 'M3U8 file not found.'], 500);
        //             }

        //             if ($lesson->video_key) {
        //                 $this->uploadService->deleteObjectS3($lesson->video_key);
        //             }

        //             $lesson->updateLesson([
        //                 'video_key' => $fileKey,
        //                 'video_url' => $m3u8FileUrl,
        //                 'video_duration' => $request->duration,
        //             ]);

        //             return response()->json(
        //                 [
        //                     'success' => true,
        //                     'message' => 'Video updated successfully',
        //                     'video_url' => $m3u8FileUrl,
        //                     'lesson' => new LessonResource($lesson),
        //                 ],
        //                 200
        //             );
        //         }
        //     }

        //     return response()->json(['success' => false, 'message' => 'Failed to upload video.'], 500);
        // }
    }


    public function publishLesson(Request $request, $slug, $chapterId, $id)
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

        $lesson = Lesson::where('id', $id)
            ->where('chapter_id', $chapter->id)
            ->first();


        if (!$lesson) {
            return response()->json(['success' => false, 'message' => 'Lesson not found'], 404);
        }

        if (!$lesson->title || !$lesson->video_url) {
            return response()->json(['success' => false, 'message' => 'Missing required fields'], 400);
        }

        $lesson->updateLesson([
            'is_published' => true
        ]);

        return response()->json(['success' => true, 'message' => 'Lesson published successfully'], 200);
    }

    public function unpublishLesson(Request $request, $slug, $chapterId, $id)
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

        $lesson = Lesson::where('id', $id)
            ->where('chapter_id', $chapter->id)
            ->first();


        if (!$lesson) {
            return response()->json(['success' => false, 'message' => 'Lesson not found'], 404);
        }

        $lesson->updateLesson([
            'is_published' => false
        ]);

        return response()->json(['success' => true, 'message' => 'Lesson unpublished successfully'], 200);
    }

    public function deleteLesson(Request $request, $slug, $chapterId, $id)
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

        $lesson = Lesson::where('id', $id)
            ->where('chapter_id', $chapter->id)
            ->first();


        if (!$lesson) {
            return response()->json(['success' => false, 'message' => 'Lesson not found'], 404);
        }

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

        return response()->json(['success' => true, 'message' => 'Lesson deleted successfully'], 200);
    }
}
