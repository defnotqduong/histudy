<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;

class QuestionResourceCollection extends ResourceCollection
{
    private $isInstructor;

    public function __construct($resource, $isInstructor = true)
    {
        parent::__construct($resource);

        $this->isInstructor = $isInstructor;
    }


    public function toArray(Request $request): array
    {
        return $this->collection->map(function ($question) use ($request) {
            return (new QuestionResource($question, $this->isInstructor))->toArray($request);
        })->all();
    }
}
