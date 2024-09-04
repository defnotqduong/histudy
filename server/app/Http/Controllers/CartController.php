<?php

namespace App\Http\Controllers;

use App\Http\Resources\CourseResourceCollection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use PhpParser\Node\Expr\FuncCall;

class CartController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api', ['except' => []]);
    }

    public function getCart()
    {
        $user = Auth::user();
        $cart = $user->cart;

        return response()->json(
            [
                'success' => true,
                'cart' => new CourseResourceCollection($cart->courses, false),
            ],
            200
        );
    }

    public function addCourseToCart() {}

    public function removeCourseFromCart() {}
}
