<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\PasswordResetToken;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Str;

class PasswordController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:api', ['except' => ['forgotPassword', 'checkPasswordResetToken', 'resetPassword']]);
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

    public function forgotPassword(Request $request)
    {

        $request->validate([
            'email' => 'required|email',
        ]);

        $user = User::findByEmail($request->email);

        if (!$user) {
            return response()->json(['success' => false, 'message' => 'User not found'], 404);
        }

        $token = Str::random(40);
        $frontendUrl = env('FRONTEND_URL', 'http://localhost:5173');
        $url = $frontendUrl . '/auth/reset-password?token=' . $token;

        $data['url'] = $url;
        $data['email'] = $request->email;
        $data['title'] = 'Password reset instructions';

        Mail::send('forgotPasswordMail', ['data' => $data], function ($message) use ($data) {
            $message->to($data['email'])->subject($data['title']);
        });

        PasswordResetToken::updateOrCreate(
            [
                'email' => $request->email,
            ],
            [
                'email' => $request->email,
                'token' => $token,
                'created_at' => Carbon::now()
            ]
        );

        return response()->json([
            'success' => true,
            'message' => 'Please check your mail to reset your password',
        ], 200);
    }

    public function checkPasswordResetToken(Request $request)
    {
        $request->validate([
            'token' => 'required|string',
        ]);

        $token = $request->token;

        $passwordResetToken = PasswordResetToken::where('token', $token)->first();

        if (!$passwordResetToken) {
            return response()->json(['success' => false, 'message' => 'Invalid token'], 400);
        }

        $createdAt = Carbon::parse($passwordResetToken->created_at);
        $now = Carbon::now();

        $diffInMinutes = $now->diffInMinutes($createdAt);
        if ($diffInMinutes > 60) {
            return response()->json(['success' => false, 'message' => 'Token has expired'], 400);
        }

        return response()->json([
            'success' => true,
            'message' => 'Token is valid',
        ], 200);
    }

    public function resetPassword(Request $request)
    {

        $messages = [
            'password.required' => 'Password is required.',
        ];

        $request->validate([
            'token' => 'required|string',
            'password' => 'required|string|min:5',
        ], $messages);

        $token = $request->input('token');
        $password = $request->input('password');

        $passwordResetToken = PasswordResetToken::where('token', $token)->first();

        if (!$passwordResetToken) {
            return response()->json(['success' => false, 'message' => 'Invalid token'], 400);
        }

        $createdAt = Carbon::parse($passwordResetToken->created_at);
        $now = Carbon::now();

        $diffInMinutes = $now->diffInMinutes($createdAt);
        if ($diffInMinutes > 60) {
            return response()->json(['success' => false, 'message' => 'Token has expired'], 400);
        }

        $user = User::where('email', $passwordResetToken->email)->first();

        if (!$user) {
            return response()->json(['success' => false, 'message' => 'User not found'], 404);
        }

        $user->updateUser([
            'password' => Hash::make($password)
        ]);

        $passwordResetToken->delete();

        return response()->json([
            'success' => true,
            'message' => 'Your password has been reset successfully!'
        ], 200);
    }
}
