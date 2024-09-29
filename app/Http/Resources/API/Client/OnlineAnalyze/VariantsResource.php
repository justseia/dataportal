<?php

namespace App\Http\Resources\API\Client\OnlineAnalyze;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class VariantsResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'title' => $this->title,
            'count' => $this->variant_answers_count,
        ];
    }
}
