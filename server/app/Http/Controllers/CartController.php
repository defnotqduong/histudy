<?php

namespace App\Http\Controllers;

use App\Http\Resources\CourseResourceCollection;
use App\Models\CartItem;
use App\Models\Course;
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

    public function addCourseToCart(Request $request)
    {
        $user = Auth::user();
        $cart = $user->cart;

        if (!$cart) {
            return response()->json(['success' => false, 'error' => 'Cart not found'], 404);
        }

        $course_id = $request->courseId;

        $course = Course::where('id', $course_id)
            ->first();

        if (!$course) {
            return response()->json(['success' => false, 'error' => 'Course not found'], 404);
        }

        $existingCartItem = CartItem::where('cart_id', $cart->id)
            ->where('course_id', $course_id)
            ->first();

        if ($existingCartItem) {
            return response()->json(['success' => false, 'message' => 'Course already in cart'], 400);
        }

        CartItem::create([
            'cart_id' => $cart->id,
            'course_id' => $course_id
        ]);

        return response()->json(
            [
                'success' => true,
                'message' => 'Course added to Cart successfully',
            ],
            200
        );
    }

    public function removeCourseFromCart(Request $request, $courseId)
    {
        $user = Auth::user();
        $cart = $user->cart;

        if (!$cart) {
            return response()->json(['success' => false, 'error' => 'Cart not found'], 404);
        }

        $cartItem = CartItem::where('cart_id', $cart->id)
            ->where('course_id', $courseId)
            ->first();

        if (!$cartItem) {
            return response()->json(['success' => false, 'error' => 'Course not found in cart'], 404);
        }

        $cartItem->delete();

        return response()->json(
            [
                'success' => true,
                'message' => 'Course removed from Cart successfully',
            ],
            200
        );
    }
}
