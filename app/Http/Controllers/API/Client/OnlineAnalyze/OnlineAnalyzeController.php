<?php

namespace App\Http\Controllers\API\Client\OnlineAnalyze;

use App\Http\Controllers\Controller;
use App\Http\Resources\API\Client\OnlineAnalyze\CrossResource;
use App\Http\Resources\API\Client\OnlineAnalyze\QuestionResource;
use App\Http\Resources\API\Client\OnlineAnalyze\QuestionsResource;
use App\Http\Resources\API\Client\OnlineAnalyze\ThemesResource;
use App\Models\Question\Answer;
use App\Models\Question\Question;
use App\Models\Question\Theme;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class OnlineAnalyzeController extends Controller
{
    public function themes($yearId): JsonResponse
    {
        $themes = Theme::query();
        $themes->where('year_id', $yearId);
        $themes = $themes->get();

        return response()->json([
            'status' => true,
            'data' => ThemesResource::collection($themes),
        ]);
    }

    public function questions($id, Request $request): JsonResponse
    {
        $questions = Question::query();
        $questions->with(['keyword']);

        if ($request->input('searchType') == 'key') {
            $questions->where('keyword_id', $id);
        } else {
            $questions->where('theme_id', $id);
        }
        $questions->where('is_visible', true);
        $questions = $questions->get();

        return response()->json([
            'status' => true,
            'data' => QuestionsResource::collection($questions),
        ]);
    }

    public function result($questionId): JsonResponse
    {
        $question = Question::query();
        $question->where('id', $questionId);
        $question->with(['theme.year', 'variants' => function ($query) {
            $query->withCount('answers as variant_answers_count');
        }]);
        $question->withCount(['answers as question_answers_count']);

        $question = $question->first();

        $crossQuestions = Question::query();
        $crossQuestions->where('theme_id', $question->theme_id);
        $crossQuestions->whereNot('id', $question->id);
        $crossQuestions = $crossQuestions->get();

        return response()->json([
            'status' => true,
            'data' => QuestionResource::make($question, $crossQuestions),
        ]);
    }

    public function cross($firstQuestionId, $secondQuestionId): JsonResponse
    {
        $firstQuestion = Question::query()->with(['variants'])->where('id', $firstQuestionId)->first();
        $secondQuestion = Question::query()->with(['variants'])->where('id', $secondQuestionId)->first();
        $secondQuestionVariantIds = Question::query()->where('id', $secondQuestionId)->first()->variants()->pluck('id');

        $firstVariantUserDataIds = Answer::query()
            ->whereIn('variant_id', $firstQuestion->variants->pluck('id'))
            ->get()
            ->groupBy('variant_id');

        $secondVariantAnswerCounts = Answer::query()
            ->whereIn('variant_id', $secondQuestionVariantIds)
            ->whereIn('user_data_id', $firstVariantUserDataIds->flatten()->pluck('user_data_id'))
            ->get()
            ->groupBy('variant_id');

        $sumOfAnswerCountsPerVariant = array_fill(0, count($secondQuestionVariantIds), 0);

        foreach ($firstQuestion->variants as $firstVariant) {
            $answerCountsForSecondVariants = [];

            foreach ($secondQuestionVariantIds as $index => $secondVariantId) {
                $answerCount = $secondVariantAnswerCounts[$secondVariantId]
                    ->whereIn('user_data_id', $firstVariantUserDataIds[$firstVariant->id]->pluck('user_data_id'))
                    ->count();

                $answerCountsForSecondVariants[] = $answerCount;
                $sumOfAnswerCountsPerVariant[$index] += $answerCount;
            }

            $firstVariant->resultsCross = $answerCountsForSecondVariants;
        }

        foreach ($firstQuestion->variants as $firstVariant) {
            $percentageResults = [];

            foreach ($firstVariant->resultsCross as $index => $result) {
                $percentageResults[] = $sumOfAnswerCountsPerVariant[$index] > 0
                    ? (float)number_format(($result / $sumOfAnswerCountsPerVariant[$index]) * 100, 1)
                    : 0;
            }

            $firstVariant->resultsCross = $percentageResults;
        }

        return response()->json([
            'status' => true,
            'data' => CrossResource::make($firstQuestion->variants, $secondQuestion->variants->pluck('title')),
        ]);
    }
}
