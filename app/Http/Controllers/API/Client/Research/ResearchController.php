<?php

namespace App\Http\Controllers\API\Client\Research;

use App\Http\Controllers\Controller;
use App\Http\Resources\API\Client\Research\ResearchAllResource;
use App\Http\Resources\API\Client\Research\ResearchShowResource;
use App\Models\Question\Theme;
use App\Models\Question\Year;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class ResearchController extends Controller
{
    public function index(): JsonResponse
    {
        $researches = Year::query();
        $researches->with(['themes']);
        $researches->orderBy('year', 'desc');
        $researches = $researches->get();

        return response()->json([
            'status' => true,
            'data' => ResearchAllResource::collection($researches),
        ]);
    }

    public function show(Theme $theme): JsonResponse
    {
        $theme->load(['questions.keyword']);

        return response()->json([
            'status' => true,
            'main' => $theme->title,
            'data' => ResearchShowResource::collection($theme->questions),
        ]);
    }
}
