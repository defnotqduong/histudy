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
    }

    public function createCourseChapter(ChapterRequest $request, $slug)
    {
        $userId = Auth::id();

        $course = Course::where('slug', $slug)
            ->where('user_id', $userId)
            ->first();

        if (!$course) {
            return response()->json(['success' => false, 'error' => 'Course not found'], 404);
        }

        $title = $request->title;
        $lastChapter = Chapter::where('course_id', $course->id)->orderBy('position', 'desc')->first();
        $newPosition = $lastChapter ? $lastChapter->position + 1 : 1;

        $data = [
            'title' => $title,
            'course_id' => $course->id,
            'position' => $newPosition
        ];

        $chapter = Chapter::createChapter($data);

        return response()->json([
            'success' => true,
            'message' => 'Chapter created successfully',
            'chapter' => new ChapterResource($chapter)
        ], 200);
    }

    public function getCourseChapter(Request $request, $slug, $id)
    {
        $userId = Auth::id();

        $course = Course::where('slug', $slug)
            ->where('user_id', $userId)
            ->first();

        if (!$course) {
            return response()->json(['success' => false, 'error' => 'Course not found'], 404);
        }

        $chapter = Chapter::findById($id);

        if (!$chapter) {
            return response()->json(['success' => false, 'error' => 'Chapter not found'], 404);
        }

        return response()->json([
            'success' => true,
            'message' => 'Chapter found',
            'chapter' => new ChapterResource($chapter)
        ], 200);
    }

    public function updateCourseChapter(ChapterRequest $request, $slug, $id)
    {
        $userId = Auth::id();

        $course = Course::where('slug', $slug)
            ->where('user_id', $userId)
            ->first();

        if (!$course) {
            return response()->json(['success' => false, 'error' => 'Course not found'], 404);
        }

        $chapter = Chapter::findById($id);

        if (!$chapter) {
            return response()->json(['success' => false, 'error' => 'Chapter not found'], 404);
        }

        $chapter->update($request->all());

        return response()->json(['success' => true, 'message' => 'Chapter updated successfully', 'chapter' => new ChapterResource($chapter)], 200);
    }

    public function reorderCourseChapter(Request $request, $slug)
    {
        $userId = Auth::id();

        $course = Course::where('slug', $slug)
            ->where('user_id', $userId)
            ->first();

        if (!$course) {
            return response()->json(['success' => false, 'error' => 'Course not found'], 404);
        }

        $items = $request->items;

        foreach ($items as $item) {
            $chapter = Chapter::where('id', $item['id'])
                ->where('course_id', $course->id)
                ->first();

            $chapter->update($item);
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
            ->where('user_id', $userId)
            ->first();

        if (!$course) {
            return response()->json(['success' => false, 'error' => 'Course not found'], 404);
        }

        $chapter = Chapter::find($id);

        if (!$chapter) {
            return response()->json(['success' => false, 'error' => 'Chapter not found'], 404);
        }

        if ($request->hasFile('video')) {

            $cloudinaryVideo = Cloudinary::uploadVideo($request->file('video')->getRealPath(), [
                'folder' => 'videos'
            ]);

            $url = $cloudinaryVideo->getSecurePath();
            $publicId = $cloudinaryVideo->getPublicId();

            if ($chapter->video_public_id) {
                Cloudinary::destroy($chapter->video_public_id, [
                    'resource_type' => 'video'
                ]);
            }

            $chapter->updateChapter([
                'video_url' => $url,
                'video_public_id' => $publicId
            ]);
        }

        return response()->json(['success' => true, 'message' => 'Video updated successfully', 'chapter' => $chapter], 200);
    }
}
