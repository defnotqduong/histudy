<?php

namespace App\Http\Controllers\Permission;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use App\Http\Resources\UserResource;
use App\Models\Cart;
use App\Models\User;
use App\Models\Wishlist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api', ['except' => ['']]);
    }

    public function getAllUser()
    {
        $users = User::orderBy('created_at', 'asc')->get();

        return response()->json([
            'success' => true,
            'users' => UserResource::collection($users)
        ], 200);
    }

    public function getUser($id)
    {
        $user = User::find($id);

        if (!$user) {
            return response()->json([
                'success' => false,
                'message' => 'User not found',
            ], 404);
        }

        return response()->json([
            'success' => true,
            'user' => new UserResource($user)
        ], 200);
    }

    public function createUser(Request $request)
    {

        $messages = [
            'name.required' => 'Name is required.',
            'name.string' => 'Name must be a string.',
            'username.required' => 'Name is required.',
            'username.string' => 'Name must be a string.',
            'username.unique' => 'This username already exists.',
            'email.required' => 'Email is required.',
            'email.email' => 'Email format is invalid.',
            'email.max' => 'Email may not be greater than 100 characters.',
            'email.unique' => 'This email is already registered.',
            'password.required' => 'Password is required.',
            'password.string' => 'Password must be a string.',
            'password.min' => 'Password must be at least 5 characters.',
            'password.max' => 'Password may not be greater than 100 characters.',
        ];

        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'username' => 'required|string|max:255|unique:users,username',
            'email' => 'required|email|max:100|unique:users,email',
            'password' => 'required|string|min:5|max:100',
        ], $messages);

        if ($validator->fails()) {
            return response()->json(['success' => false, 'errors' => $validator->errors()], 422);
        }

        $user = User::create([
            'name' => $request->name,
            'username' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        Cart::createCart($user->id);
        Wishlist::createWishlist($user->id);

        if ($request->has('roles')) {
            $user->syncRoles($request->roles);
        }

        return response()->json([
            'success' => true,
            'message' => 'User created successfully',
            'users' => new UserResource($user)
        ], 201);
    }

    public function updateUser(Request $request, $id)
    {
        $messages = [
            'name.required' => 'Name is required.',
            'name.string' => 'Name must be a string.',
            'username.required' => 'Name is required.',
            'username.string' => 'Name must be a string.',
            'username.unique' => 'This username already exists.',
            'email.required' => 'Email is required.',
            'email.email' => 'Email format is invalid.',
            'email.max' => 'Email may not be greater than 100 characters.',
            'email.unique' => 'This email is already registered.',
        ];

        $validator = Validator::make($request->all(), [
            'name' => 'sometimes|string|max:255',
            'username' => 'sometimes|string|max:255|unique:users,username,' . $id,
            'email' => 'sometimes|email|max:100|unique:users,email,' . $id,
        ], $messages);

        if ($validator->fails()) {
            return response()->json(['success' => false, 'errors' => $validator->errors()], 422);
        }

        $user = User::find($id);

        if (!$user) {
            return response()->json([
                'success' => false,
                'message' => 'User not found',
            ], 404);
        }

        $user->update($request->only(['name', 'username', 'email']));

        if ($request->has('roles')) {
            $user->syncRoles($request->roles);
        }

        return response()->json([
            'success' => true,
            'message' => 'User updated successfully!',
        ], 200);
    }

    public function deleteUser($id)
    {
        $user = User::find($id);

        if (!$user) {
            return response()->json([
                'success' => false,
                'message' => 'User not found',
            ], 404);
        }

        $user->delete();

        return response()->json([
            'success' => true,
            'message' => 'User deleted successfully!',
        ], 200);
    }
}
