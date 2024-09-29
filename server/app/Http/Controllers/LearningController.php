<?php

namespace App\Http\Controllers;

use App\Http\Resources\ChapterResourceCollection;
use App\Http\Resources\CourseResource;
use App\Models\Course;
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
}
