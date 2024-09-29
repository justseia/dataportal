<?php

namespace App\Http\Controllers\API\Client\Map;

use App\Http\Controllers\Controller;
use App\Http\Resources\API\Client\Map\QuestionsResource;
use App\Http\Resources\API\Client\Map\ResultResource;
use App\Http\Resources\API\Client\Map\ThemesResource;
use App\Models\Question\Question;
use App\Models\Question\Theme;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class MapController extends Controller
{
    public function themes(): JsonResponse
    {
        $themes = Theme::query();
        $themes = $themes->get();

        return response()->json([
            'success' => true,
            'data' => ThemesResource::collection($themes),
        ]);
    }

    public function questions(Theme $theme): JsonResponse
    {
        $questions = Question::query();
        $questions->where('theme_id', $theme->id);
        $questions = $questions->get();

        return response()->json([
            'success' => true,
            'data' => QuestionsResource::collection($questions),
        ]);
    }

    public function result(Question $question): JsonResponse
    {
        $result = $question->load(['variants']);

        $copies = array_fill(0, 20, $result);

        return response()->json([
            'success' => true,
            'data' => ResultResource::collection($copies),
        ]);
    }
}
