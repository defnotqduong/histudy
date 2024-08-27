<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CourseResource extends JsonResource
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
            'instructor' => new UserResource($this->user),
            'title' => $this->title,
            'slug' => $this->slug,
            'summary' => $this->summary,
            'description' => $this->description,
            'thumb_url' => $this->thumb_url,
            'price' => $this->price,
            'is_published' => $this->is_published,
            'customer_count' => $this->customers->count(),
            'reviews' => ReviewResource::collection($this->reviews),
            'review_count' => $this->reviews->count(),
            'average_star' => $this->averageStar(),
            'category_id' => $this->category_id,
            'category' => $this->category ? new CategoryResource($this->category) : null,
            'chapters' => $this->chapters->map->only(['id', 'title', 'is_published', 'is_free', 'course_id', 'video_url']),
            'chapter_count' => $this->chapters()->count(),
            'attachments' => AttachmentResource::collection($this->attachments),
            'created_at' => $this->created_at->toDateTimeString(),
            'updated_at' => $this->updated_at->toDateTimeString(),
        ];
    }
}
