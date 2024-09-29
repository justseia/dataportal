<?php

namespace App\Http\Resources\API\Client\Map;

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
            'result' => (double)number_format(rand(1, 20) . '.' . rand(1, 9), 1),
        ];
    }
}
