<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;

class CourseResourceCollection extends ResourceCollection
{
    protected $includeAll;

    public function __construct($resource, $includeAll = true)
    {
        parent::__construct($resource);
        $this->includeAll = $includeAll;
    }

    /**
     * Transform the resource collection into an array.
     *
     * @return array<int|string, mixed>
     */
    public function toArray(Request $request): array
    {
        $response = [
            'courses' => $this->collection->map(function ($resource) use ($request) {
                return (new CourseResource($resource, $this->includeAll))->toArray($request);
            })->all(),
        ];

        if ($this->resource instanceof \Illuminate\Pagination\LengthAwarePaginator) {
            $response['meta'] = [
                'from' => $this->resource->firstItem(),
                'to' => $this->resource->lastItem(),
                'total' => $this->resource->total(),
                'current_page' => $this->resource->currentPage(),
                'last_page' => $this->resource->lastPage(),
            ];
            $response['links'] = [
                'first_page_url' => $this->resource->url(1),
                'last_page_url' => $this->resource->url($this->resource->lastPage()),
                'prev_page_url' => $this->resource->previousPageUrl(),
                'next_page_url' => $this->resource->nextPageUrl(),
            ];
        }

        return $response;
    }
}
