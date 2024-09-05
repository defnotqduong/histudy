<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class PasswordController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:api', ['except' => []]);
    }

    public function changePassword(Request $request)
    {

        $messages = [
            'password.required' => 'Current password is required.',
            'new_password.required' => 'New password is required.',
            'new_password.min' => 'New password must be at least :min characters.',
            'new_password.confirmed' => 'New password confirmation does not match.',
        ];

        $request->validate([
            'password' => 'required',
            'new_password' => 'required|string|min:5|confirmed',
        ], $messages);


        $userId = Auth::id();
        $user = User::find($userId);

        if (!Hash::check($request->password, $user->password)) {
            return response()->json([
                'success' => false,
                'errors' => [
                    'password' => ['Wrong password']
                ]
            ], 422);
        }

        $user->updateUser([
            'password' => Hash::make($request->new_password)
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Password changed successfully!',
        ], 200);
    }

    public function forgotPassword(Request $request) {}
}
