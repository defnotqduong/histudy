<?php

namespace App\Http\Controllers;

use App\Http\Resources\CourseResource;
use App\Models\Course;
use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api', ['except' => ['getCourseForCheckout']]);
    }

    public function getCourseForCheckout(Request $request, $id)
    {
        $course = Course::where('id', $id)
            ->where('is_published', true)
            ->first();

        if (!$course) {
            return response()->json(['success' => false, 'message' => 'Course not found'], 404);
        }

        return response()->json([
            'success' => true,
            'message' => 'Course found',
            'course' => new CourseResource($course, false),
        ], 200);
    }
}
