<?php

namespace App\Http\Controllers;

use App\Http\Resources\CourseResourceCollection;
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

    public function addCourseToWishlist(Request $request) {}

    public function removeCourseFromWishlist(Request $request) {}
}
