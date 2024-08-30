<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;

class ChapterResourceCollection extends ResourceCollection
{
    protected $includeAll;

    public function __construct($resource, $includeAll = true)
    {
        parent::__construct($resource);
        $this->includeAll = $includeAll;
    }

    public function toArray($request)
    {
        return $this->collection->map(function ($resource) use ($request) {
            return (new ChapterResource($resource, $this->includeAll))->toArray($request);
        })->all();
    }
}
