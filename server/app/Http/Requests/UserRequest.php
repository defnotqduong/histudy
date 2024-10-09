<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class UserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return Auth::check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        $userId = Auth::id();

        $rules = [
            'name' => 'required|string|max:255',
            'username' => 'required|string|max:255|unique:users,username',
            'email' => 'required|string|email|max:255|unique:users,email',
            'background_image' => 'nullable|string|max:255',
            'avatar' => 'nullable|string|max:255',
            'profession' => 'nullable|string|max:255',
            'bio' => 'nullable|string',
            'facebook' => 'nullable|string|url|max:255',
            'instagram' => 'nullable|string|url|max:255',
            'twitter' => 'nullable|string|url|max:255',
            'linkedin' => 'nullable|string|url|max:255',
            'password' => 'sometimes|required|string|min:5',
            'roles' => 'sometimes|array|exists:roles,name'
        ];

        if ($this->isMethod('patch')) {
            $rules['name'] = 'sometimes|required|string|max:255';
            $rules['username'] = 'sometimes|required|string|max:255|unique:users,username,' . $userId;
            $rules['email'] = 'sometimes|required|string|email|max:255|unique:users,email,' . $userId;
            $rules['password'] = 'sometimes|required|string|min:5';
        }

        return $rules;
    }
    /**
     * Custom error messages for validation rules.
     *
     * @return array<string, string>
     */

    public function messages(): array
    {
        return [
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
            'password.confirmed' => 'Password confirmation does not match.',
            'password.min' => 'Password must be at least 5 characters.',
            'password.max' => 'Password may not be greater than 100 characters.',
        ];
    }
}
