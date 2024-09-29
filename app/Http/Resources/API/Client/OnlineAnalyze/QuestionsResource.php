<?php

namespace App\Http\Resources\API\Client\OnlineAnalyze;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class QuestionsResource extends JsonResource
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
            'title' => $this->title,
            'is_map_support' => $this->is_map_support,
            'key' => $this->keyword->key,
        ];
    }
}
