<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\ImageRequest;
use App\Http\Requests\UserRequest;
use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Tymon\JWTAuth\Exceptions\JWTException;

class ProfileController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api', ['except' => []]);
    }

    public function profile()
    {
        try {
            $user = Auth::user();

            return response()->json(
                [
                    'success' => true,
                    'user' => new UserResource($user),
                ],
                200
            );
        } catch (JWTException $e) {
            return response()->json(['success' => false, 'error' => 'Unauthorized'], 401);
        }
    }

    public function updateProfile(UserRequest $request)
    {
        $userId = Auth::id();
        $user = User::find($userId);

        $user->updateUser($request->all());

        return response()->json(
            [
                'success' => true,
                'message' => 'Profile updated successfully',
                'user' => new UserResource($user),
            ],
            200
        );
    }

    public function changeAvatar(ImageRequest $request) {}

    public function changeBackgroundImage(ImageRequest $request) {}
}
