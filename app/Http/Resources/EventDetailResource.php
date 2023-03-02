<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class EventDetailResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        // return parent::toArray($request);
        return [
            'title' => $this->title,
            'body' => $this->body,
            'thumbnail' => $this->thumbnail,
            'status' => $this->status,
            'updated_at' => $this->updated_at,
            'user' => $this->whenLoaded('user'),
            'category' => $this->whenLoaded('category'),
        ];
    }
}
