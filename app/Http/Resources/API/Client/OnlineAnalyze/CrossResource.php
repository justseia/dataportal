<?php

namespace App\Http\Resources\API\Client\OnlineAnalyze;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CrossResource extends JsonResource
{
    protected $secondQuestionVariants;

    public function __construct($resource, $secondQuestionVariants = null)
    {
        parent::__construct($resource);
        $this->secondQuestionVariants = $secondQuestionVariants;
    }

    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'title' => $this->secondQuestionVariants,
            'resultsCross' => $this->resource->map(fn($variant) => $variant->resultsCross),
        ];
    }
}

