<?php

namespace App\Http\Controllers;

use App\Http\Requests\ChapterRequest;
use App\Http\Requests\VideoRequest;
use App\Http\Resources\ChapterResource;
use App\Models\Chapter;
use App\Models\Course;
use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ChapterController extends Controller
{
    public function __construct()
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

    public function uploadChapterVideo(VideoRequest $request, $slug, $id)
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

        if ($request->hasFile('video')) {

            $cloudinaryVideo = Cloudinary::uploadVideo($request->file('video')->getRealPath(), [
                'folder' => 'videos'
            ]);

            $url = $cloudinaryVideo->getSecurePath();
            $publicId = $cloudinaryVideo->getPublicId();
            $duration = $request->duration;

            if ($chapter->video_public_id) {
                Cloudinary::destroy($chapter->video_public_id, [
                    'resource_type' => 'video'
                ]);
            }

            $chapter->updateChapter([
                'video_url' => $url,
                'video_public_id' => $publicId,
                'video_duration' => $duration
            ]);
        }

        return response()->json(
            [
                'success' => true,
                'message' => 'Video updated successfully',
                'chapter' => new ChapterResource($chapter),
            ],
            200
        );
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

            if ($lesson->video_public_id) {
                Cloudinary::destroy($lesson->video_public_id, [
                    'resource_type' => 'video'
                ]);
            }
            foreach ($lesson->attachments as $attachment) {
                if ($attachment->attachment_public_id) {
                    Cloudinary::destroy($attachment->attachment_public_id, [
                        'resource_type' => 'raw'
                    ]);
                }

                $attachment->deleteAttachment();
            }
            $lesson->deleteLesson();
        }

        $chapter->deleteChapter();

        return response()->json(['success' => true, 'message' => 'Chapter deleted successfully'], 200);
    }
}
