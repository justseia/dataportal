<?php

namespace App\Http\Resources\API\Client\OnlineAnalyze;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class QuestionResource extends JsonResource
{
    protected $crossQuestions;

    public function __construct($resource, $crossQuestions = null)
    {
        parent::__construct($resource);
        $this->crossQuestions = $crossQuestions;
    }

    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'header' => [
                'theme' => $this->theme->title,
                'year' => $this->theme->year->year,
                'question' => $this->title,
                'count' => $this->question_answers_count,
            ],
            'variants' => VariantsResource::collection($this->variants),
            'cross' => QuestionsResource::collection($this->crossQuestions),
        ];
    }
}
