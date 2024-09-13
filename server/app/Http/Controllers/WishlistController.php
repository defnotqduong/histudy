<?php

namespace App\Http\Controllers;

use App\Http\Resources\CourseResourceCollection;
use App\Models\Course;
use App\Models\Wishlist;
use App\Models\WishlistItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WishlistController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api', ['except' => []]);
    }

    public function getWishlist()
    {
        $user = Auth::user();
        $wishlist = $user->wishlist;

        return response()->json(
            [
                'success' => true,
                'wishlist' => new CourseResourceCollection($wishlist->courses, false),
            ],
            200
        );
    }

    public function addCourseToWishlist(Request $request)
    {
        $user = Auth::user();
        $wishlist = $user->wishlist;

        if (!$wishlist) {
            return response()->json(['success' => false, 'message' => 'Wishlist not found'], 404);
        }

        $course_id = $request->courseId;

        $course = Course::where('id', $course_id)
            ->first();

        if (!$course) {
            return response()->json(['success' => false, 'message' => 'Course not found'], 404);
        }

        $existingWishlistItem = WishlistItem::where('wishlist_id', $wishlist->id)
            ->where('course_id', $course_id)
            ->first();

        if ($existingWishlistItem) {
            return response()->json(['success' => false, 'message' => 'Course already in wishlist'], 400);
        }

        WishlistItem::create([
            'wishlist_id' => $wishlist->id,
            'course_id' => $course_id
        ]);

        return response()->json(
            [
                'success' => true,
                'message' => 'Course added to Wishlist successfully',
                'wishlist' => new CourseResourceCollection($wishlist->courses, false),
            ],
            200
        );
    }


    public function removeCourseFromWishlist(Request $request, $courseId)
    {
        $user = Auth::user();
        $wishlist = $user->wishlist;

        if (!$wishlist) {
            return response()->json(['success' => false, 'message' => 'Wishlist not found'], 404);
        }


        $wishlistItem = WishlistItem::where('wishlist_id', $wishlist->id)
            ->where('course_id', $courseId)
            ->first();

        if (!$wishlistItem) {
            return response()->json(['success' => false, 'message' => 'Course not found in wishlist'], 404);
        }

        $wishlistItem->delete();

        return response()->json(
            [
                'success' => true,
                'message' => 'Course removed from Wishlist successfully',
                'wishlist' => new CourseResourceCollection($wishlist->courses, false),
            ],
            200
        );
    }
}
