<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class EventIndexResource extends JsonResource
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
            'id' => $this->id,
            'summary' => $this->summary,
            'thumbnail' => $this->thumbnail,
            'user' => $this->whenLoaded('user'),
            'category' => $this->whenLoaded('category'),
        ];
    }
}
