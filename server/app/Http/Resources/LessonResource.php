<?php

namespace App\Http\Resources;

use App\Http\Requests\AttachmentRequest;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Auth;

class LessonResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {

        $userId = Auth::id();
        $userProgress = $this->progress()->where('user_id', $userId)->first();

        return [
            'id' => $this->id,
            'title' => $this->title,
            'description' => $this->description,
            'video_url' => $this->video_url,
            'video_duration' => $this->video_duration,
            'is_published' => $this->is_published,
            'is_free' => $this->is_free,
            'position' => $this->position,
            'chapter_id' => $this->chapter_id,
            'is_completed' => $userProgress ? $userProgress->is_completed : null,
            'created_at' => $this->created_at->toDateTimeString(),
            'updated_at' => $this->updated_at->toDateTimeString(),
        ];
    }
}
