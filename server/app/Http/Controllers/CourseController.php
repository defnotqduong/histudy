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
        $this->middleware('auth:api', ['except' => ['getCourse']]);
    }

    public function createCourse(CourseRequest $request)
    {
        $validatedData = $request->validated();

        $course = Course::createCourse($validatedData);

        return response()->json(['success' => true, 'message' => 'Course created Successfully', 'course' => new CourseResource($course)], 200);
    }

    public function getCourse(Request $request, $slug)
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
}
