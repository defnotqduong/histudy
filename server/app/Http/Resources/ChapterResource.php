<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

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

        return [
            'id' => $this->id,
            'title' => $this->title,
            'description' => $this->description,
            'position' => $this->position,
            'is_published' => $this->is_published,
            'course_id' => $this->course_id,
            'lessons' => $this->when(
                $this->includeAll,
                LessonResource::collection($this->lessons),
                LessonResource::collection($this->publishedLessons)
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
