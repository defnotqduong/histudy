<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class NotificationResource extends JsonResource
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
            'noti_type' => $this->noti_type,
            'sender' => [
                'id' => $this->sender_id,
                'name' => $this->sender->name,
                'avatar' => $this->sender->avatar,
            ],
            'receiver' => [
                'id' => $this->receiver_id,
                'name' => $this->receiver->name,
                'avatar' => $this->sender->avatar,
            ],
            'content' => $this->content,
            'link' => $this->link,
            'created_at' => $this->created_at->toDateTimeString(),
            'updated_at' => $this->updated_at->toDateTimeString(),
        ];
    }
}
