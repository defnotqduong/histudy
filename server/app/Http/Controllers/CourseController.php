<?php

namespace App\Http\Controllers;

use App\Http\Requests\CourseRequest;
use App\Http\Requests\ImageRequest;
use App\Http\Resources\CourseResource;
use App\Models\Attachment;
use App\Models\Course;
use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CourseController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api', ['except' => ['getCourse', 'getPopularCourses']]);
    }

    public function createCourse(CourseRequest $request)
    {
        $validatedData = $request->validated();

        $course = Course::createCourse($validatedData);

        return response()->json(['success' => true, 'message' => 'Course created Successfully', 'course' => new CourseResource($course)], 200);
    }

    public function getPopularCourses(Request $request)
    {
        $courses = Course::getPopularCourses();

        return response()->json([
            'success' => true,
            'message' => 'Get popular Courses successfully',
            'courses' => CourseResource::collection($courses)
        ], 200);
    }

    public function getCourse(Request $request, $slug)
    {
        $userId = Auth::id();

        $course = Course::where('slug', $slug)
            ->where('user_id', $userId)
            ->first();

        if (!$course) {
            return response()->json(['success' => false, 'error' => 'Course not found'], 404);
        }

        return response()->json(['success' => true, 'message' => 'Course found', 'course' => new CourseResource($course)], 200);
    }

    public function getCourseForGuest(Request $request, $slug)
    {
        $course = Course::findBySlug($slug);

        if (!$course) {
            return response()->json(['success' => false, 'error' => 'Course not found'], 404);
        }

        return response()->json(['success' => true, 'message' => 'Course found', 'course' => new CourseResource($course)], 200);
    }

    public function updateCourse(CourseRequest $request, $slug)
    {
        $userId = Auth::id();

        $course = Course::where('slug', $slug)
            ->where('user_id', $userId)
            ->first();

        if (!$course) {
            return response()->json(['success' => false, 'error' => 'Course not found'], 404);
        }

        $course->updateCourse($request->all());

        return response()->json(['success' => true, 'message' => 'Course updated successfully', 'course' => new CourseResource($course)], 200);
    }

    public function updateCourseThumbnail(ImageRequest $request, $slug)
    {

        $userId = Auth::id();

        $course = Course::where('slug', $slug)
            ->where('user_id', $userId)
            ->first();

        if (!$course) {
            return response()->json(['success' => false, 'error' => 'Course not found'], 404);
        }

        if ($request->hasFile('thumbnail')) {

            $cloudinaryImage = Cloudinary::upload($request->file('thumbnail')->getRealPath(), [
                'folder' => 'images'
            ]);

            $url = $cloudinaryImage->getSecurePath();
            $publicId  = $cloudinaryImage->getPublicId();

            if ($course->thumb_url) {
                Cloudinary::destroy($course->thumb_public_id);
            }

            $course->updateCourse([
                'thumb_url' => $url,
                'thumb_public_id' => $publicId
            ]);
        }

        return response()->json(['success' => true, 'message' => 'Course updated successfully', 'course' => new CourseResource($course)], 200);
    }

    public function publishCourse(Request $request, $slug)
    {
        $userId = Auth::id();

        $course = Course::where('slug', $slug)
            ->where('user_id', $userId)
            ->first();

        if (!$course) {
            return response()->json(['success' => false, 'error' => 'Course not found'], 404);
        }

        $hasPublishedChapter = $course->chapters->contains('is_published', true);

        if (!$course->title || !$course->description || !$course->thumb_url || !$course->category_id || !$course->price ||  !$hasPublishedChapter) {
            return response()->json(['success' => false, 'message' => 'Missing required fields'], 400);
        }

        $course->updateCourse([
            'is_published' => true
        ]);

        return response()->json(['success' => true, 'message' => 'Course published successfully'], 200);
    }

    public function unpublishCourse(Request $request, $slug)
    {
        $userId = Auth::id();

        $course = Course::where('slug', $slug)
            ->where('user_id', $userId)
            ->first();

        if (!$course) {
            return response()->json(['success' => false, 'error' => 'Course not found'], 404);
        }

        $course->updateCourse([
            'is_published' => false
        ]);

        return response()->json(['success' => true, 'message' => 'Course unpublished successfully'], 200);
    }

    public function deleteCourse(Request $request, $slug)
    {
        $userId = Auth::id();

        $course = Course::where('slug', $slug)
            ->where('user_id', $userId)
            ->first();

        if (!$course) {
            return response()->json(['success' => false, 'error' => 'Course not found'], 404);
        }

        foreach ($course->chapters as $chapter) {
            if ($chapter->video_public_id) {
                Cloudinary::destroy($chapter->video_public_id, [
                    'resource_type' => 'video'
                ]);
            }
            $chapter->delete();
        }

        foreach ($course->attachments as $attachment) {
            if ($attachment->attachment_public_id) {
                Cloudinary::destroy($attachment->attachment_public_id);
            }
        }

        if ($course->thumb_url) {
            Cloudinary::destroy($course->thumb_public_id);
        }

        $course->deleteCourse();

        return response()->json(['success' => true, 'message' => 'Course deleted successfully'], 200);
    }
}
