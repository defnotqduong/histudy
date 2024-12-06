<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class UserAnswerResource extends JsonResource
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
            'user_id' => $this->user_id,
            'question_id' => $this->question_id,
            'question' => [
                'id' => $this->question->id,
                'content' => $this->question->content,
            ],
            'answer_id' => $this->answer_id,
            'answer' => [
                'id' => $this->answer->id,
                'content' => $this->answer->content,
            ],
            'is_correct' => $this->is_correct,
            'created_at' => $this->created_at->toDateTimeString(),
            'updated_at' => $this->updated_at->toDateTimeString(),
        ];
    }
}
