<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\ImageRequest;
use App\Http\Requests\UserRequest;
use App\Http\Resources\UserResource;
use App\Models\User;
use App\Services\UploadService;
use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Tymon\JWTAuth\Exceptions\JWTException;

class ProfileController extends Controller
{

    protected $uploadService;

    public function __construct(UploadService $uploadService)
    {
        $this->middleware('auth:api', ['except' => []]);

        $this->uploadService = $uploadService;
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

            $file = $request->file('image');

            $uploadResult = $this->uploadService->multipartUploaderToS3('images', $file);

            if ($uploadResult['status']) {

                if ($user->avatar && !$this->isGoogleAvatar($user->avatar)) {
                    $this->uploadService->deleteObjectS3($user->avatar);
                }

                $user->updateUser([
                    'avatar' => $uploadResult['filePath'],
                ]);

                return response()->json([
                    'success' => true,
                    'message' => 'Avatar updated successfully',
                    'user' => new UserResource($user),
                    'uploadResult' => $uploadResult
                ], 200);
            }

            return response()->json([
                'success' => false,
                'message' => 'Failed to upload image.',
            ], 500);
        }

        return response()->json([
            'success' => false,
            'message' => 'No file uploaded.',
        ], 400);
    }

    public function changeBackgroundImage(ImageRequest $request) {}

    private function isGoogleAvatar($avatarUrl)
    {
        return strpos($avatarUrl, 'googleusercontent.com') !== false;
    }
}
