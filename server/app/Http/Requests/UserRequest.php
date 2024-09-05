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
            'password' => 'required|string|min:8|confirmed',
        ];

        if ($this->isMethod('patch')) {
            $rules['name'] = 'sometimes|required|string|max:255';
            $rules['username'] = 'sometimes|required|string|max:255|unique:users,username,' . $userId;
            $rules['email'] = 'sometimes|required|string|email|max:255|unique:users,email,' . $userId;
            $rules['password'] = 'sometimes|required|string|min:5|confirmed';
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
            'name.required' => 'The name field is required.',
            'username.required' => 'The username field is required.',
            'username.unique' => 'The username has already been taken.',
            'email.required' => 'The email field is required.',
            'email.email' => 'The email must be a valid email address.',
            'email.unique' => 'The email has already been taken.',
            'password.required' => 'The password field is required.',
            'password.min' => 'The password must be at least 5 characters.',
            'password.confirmed' => 'The password confirmation does not match.',
            'facebook.url' => 'The Facebook URL is not valid.',
            'instagram.url' => 'The Instagram URL is not valid.',
            'twitter.url' => 'The Twitter URL is not valid.',
            'linkedin.url' => 'The LinkedIn URL is not valid.',
        ];
    }
}
