<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class LessonRequest extends FormRequest
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
        $rules = [
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'video_url' => 'nullable|url',
            'video_public_id' => 'nullable|string',
            'video_duration' => 'nullable|integer',
            'is_published' => 'nullable|boolean',
            'is_free' => 'nullable|boolean',
            'position' => 'nullable|integer',
        ];

        if ($this->isMethod('patch')) {
            $rules['title'] = 'sometimes|required|string|max:255';
        }

        return $rules;
    }

    /**
     * Get custom messages for validator errors.
     *
     * @return array<string, string>
     */
    public function messages(): array
    {
        return [
            'title.required' => 'The lesson title is required.',
            'title.string' => 'The lesson title must be a string.',
            'title.max' => 'The lesson title may not be greater than 255 characters.',
            'video_url.url' => 'The video URL must be a valid URL.',
            'video_public_id.string' => 'The video public ID must be a string.',
            'video_duration.integer' => 'The video duration must be an integer.',
            'is_published.boolean' => 'The is published field must be true or false.',
            'is_free.boolean' => 'The is free field must be true or false.',
            'position.integer' => 'The position must be an integer.',
        ];
    }
}
