<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Auth;

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
        $user = Auth::user();
        $progress = null;

        if ($user && $user->purchasedCourses->contains($this->id)) {
            $completedLessons = $this->chapters->flatMap->lessons->filter(function ($lesson) use ($user) {
                return $lesson->progress()->where('user_id', $user->id)->where('is_completed', true)->exists();
            })->count();

            $totalLessons = $this->chapters->flatMap->lessons->count();

            if ($totalLessons > 0) {
                $progress = floor(($completedLessons / $totalLessons) * 100);
            }
        }

        return [
            'id' => $this->id,
            'instructor' => $this->instructor->only(['name', 'username', 'avatar', 'profession']),
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
            'progress_percentage' => $progress,
            'created_at' => $this->created_at->toDateTimeString(),
            'updated_at' => $this->updated_at->toDateTimeString(),
        ];
    }
}
