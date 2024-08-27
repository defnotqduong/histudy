<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ReviewResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'review' => $this->review,
            'star' => $this->star,
            'course_id' => $this->course_id,
            'user' => $this->user->only(['name', 'avatar']),
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
