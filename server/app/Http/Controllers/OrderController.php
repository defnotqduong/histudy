<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Resources\CourseResource;
use App\Models\Course;
use App\Models\Purchase;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
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

    public function checkoutCourse($id)
    {
        $user = Auth::user();

        $course = Course::where('id', $id)
            ->where('is_published', true)
            ->first();

        if (!$course) {
            return response()->json([
                'success' => false,
                'message' => 'Course not found'
            ], 404);
        }

        $existingPurchase = Purchase::where('user_id', $user->id)
            ->where('course_id', $id)
            ->first();

        if ($existingPurchase) {
            return response()->json([
                'success' => false,
                'message' => 'You have already purchased this course'
            ], 400);
        }

        $purchase = Purchase::createPurchase([
            'user_id' => $user->id,
            'course_id' => $id
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Purchase successful',
        ], 200);
    }
}
