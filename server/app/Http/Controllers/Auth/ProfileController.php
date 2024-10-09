<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\ImageRequest;
use App\Http\Requests\UserRequest;
use App\Http\Resources\UserResource;
use App\Models\User;
use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;
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
        $user = Auth::user();

        return response()->json(
            [
                'success' => true,
                'user' => new UserResource($user),
            ],
            200
        );
    }

    public function updateProfile(UserRequest $request)
    {
        $userId = Auth::id();
        $user = User::find($userId);

        if ($user->provider === 'google')
            $user->updateUser($request->except('email'));


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


    public function updateAvatar(ImageRequest $request)
    {

        $userId = Auth::id();
        $user = User::find($userId);

        if ($request->hasFile('image')) {

            $cloudinaryImage = Cloudinary::upload($request->file('image')->getRealPath(), [
                'folder' => 'images'
            ]);

            $url = $cloudinaryImage->getSecurePath();
            $publicId  = $cloudinaryImage->getPublicId();

            if ($user->avatar_public_id) {
                Cloudinary::destroy($user->avatar_public_id);
            }

            $user->updateUser([
                'avatar' => $url,
                'avatar_public_id' => $publicId
            ]);
        }

        return response()->json([
            'success' => true,
            'message' => 'Avatar updated successfully',
            'user' => new UserResource($user),
        ], 200);
    }

    public function changeBackgroundImage(ImageRequest $request) {}
}
