<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WishlistController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api', ['except' => []]);
    }

    public function addCourseToWishlist(Request $request) {}

    public function removeCourseFromWishlist(Request $request) {}
}
