<?php

namespace App\Http\Resources;


use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Auth;

class AssessmentResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        $user = Auth::user();

        $userAssessment = $user ? $this->userAssessments()->where('user_id', $user->id)->first() : null;

        return [
            'id' => $this->id,
            'course_id' => $this->course_id,
            'course_slug' => $this->course->slug,
            'title' => $this->title,
            'description' => $this->description,
            'question_count' => $this->questions()->count(),
            'score' => $userAssessment?->score,
            'created_at' => $this->created_at->toDateTimeString(),
            'updated_at' => $this->updated_at->toDateTimeString(),
        ];
    }
}
