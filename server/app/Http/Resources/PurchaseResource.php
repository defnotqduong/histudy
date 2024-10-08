<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PurchaseResource extends JsonResource
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
            'customer_id' => $this->user_id,
            'customer' => $this->user->only(['username', 'name', 'email', 'avatar']),
            'course_id' => $this->course_id,
            'course' => $this->course->only(['slug', 'title', 'price']),
            'purchase_date' => $this->created_at->format('Y-m-d H:i:s'),
        ];
    }
}
