<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class QuestionResource extends JsonResource
{

    private $isInstructor;

    public function __construct($resource, $isInstructor = true)
    {
        parent::__construct($resource);

        $this->isInstructor = $isInstructor;
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
            'assessment_id' => $this->assessment_id,
            'content' => $this->content,
            'position' => $this->position,
            'answers' => $this->isInstructor
                ? AnswerResource::collection($this->answers)
                : HiddenAnswerResource::collection($this->answers),
            'created_at' => $this->created_at->toDateTimeString(),
            'updated_at' => $this->updated_at->toDateTimeString(),
        ];
    }
}
