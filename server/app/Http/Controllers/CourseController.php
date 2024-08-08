<?php

namespace App\Http\Controllers;

use App\Http\Requests\CourseRequest;
use App\Http\Resources\CourseResource;
use App\Models\Course;
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
}
