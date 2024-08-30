<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CourseResource extends JsonResource
{
    protected $includeAll;

    public function __construct($resource, $includeAll = true)
    {
        parent::__construct($resource);
        $this->includeAll = $includeAll;
    }

    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'instructor' => $this->instructor->only(['name', 'username', 'avatar']),
            'title' => $this->title,
            'slug' => $this->slug,
            'summary' => $this->summary,
            'description' => $this->description,
            'thumbnail_url' => $this->thumbnail_url,
            'price' => $this->price,
            'is_published' => $this->is_published,
            'customer_count' => $this->customers->count(),
            'review_count' => $this->reviews->count(),
            'average_star' => $this->averageStar(),
            'category_id' => $this->category_id,
            'category' => $this->category ? $this->category->only(['id', 'name']) : null,
            'chapter_count' => $this->when(
                $this->includeAll,
                $this->chapters->count(),
                $this->publishedChapters->count()
            ),
            'lesson_count' => $this->when(
                $this->includeAll,
                $this->chapters->flatMap->lessons->count(),
                $this->publishedChapters->flatMap->publishedLessons->count()
            ),
            'created_at' => $this->created_at->toDateTimeString(),
            'updated_at' => $this->updated_at->toDateTimeString(),
        ];
    }
}
