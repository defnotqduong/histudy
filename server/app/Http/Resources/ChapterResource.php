<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Auth;

class ChapterResource extends JsonResource
{

    protected $includeAll;

    public function __construct($resource, $includeAll = true)
    {
        parent::__construct($resource);
        $this->includeAll = $includeAll;
    }
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {

        $userId = Auth::id();

        return [
            'id' => $this->id,
            'title' => $this->title,
            'description' => $this->description,
            'position' => $this->position,
            'is_published' => $this->is_published,
            'course_id' => $this->course_id,
            'lessons' => $this->when(
                $this->includeAll,
                $this->lessons->map(fn($lesson) => [
                    'id' => $lesson->id,
                    'title' => $lesson->title,
                    'video_duration' => $lesson->video_duration,
                    'is_published' => $lesson->is_published,
                    'is_free' => $lesson->is_free,
                    'position' => $lesson->position,
                    'chapter_id' => $lesson->chapter_id,
                    'is_completed' => $lesson->progress()->where('user_id', $userId)->first()?->is_completed,
                ]),
                $this->publishedLessons->map(fn($lesson) => [
                    'id' => $lesson->id,
                    'title' => $lesson->title,
                    'video_duration' => $lesson->video_duration,
                    'is_published' => $lesson->is_published,
                    'is_free' => $lesson->is_free,
                    'position' => $lesson->position,
                    'chapter_id' => $lesson->chapter_id,
                    'is_completed' => $lesson->progress()->where('user_id', $userId)->first()?->is_completed,
                ])
            ),

            'lesson_count' => $this->when(
                $this->includeAll,
                $this->lessons->count(),
                $this->publishedLessons->count()
            ),
            'created_at' => $this->created_at->toDateTimeString(),
            'updated_at' => $this->updated_at->toDateTimeString(),
        ];
    }
}
