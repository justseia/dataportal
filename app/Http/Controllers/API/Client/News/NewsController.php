<?php

namespace App\Http\Controllers\API\Client\News;

use App\Http\Controllers\Controller;
use App\Http\Resources\API\Client\News\NewsAllResource;
use App\Http\Resources\API\Client\News\NewsShowResource;
use App\Models\News\News;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function index(Request $request): JsonResponse
    {
        $news = News::query();
        $news = $news->get();

        return response()->json([
            'status' => true,
            'data' => NewsAllResource::collection($news),
        ]);
    }

    public function show(News $news): JsonResponse
    {
        return response()->json([
            'status' => true,
            'data' => NewsShowResource::make($news),
        ]);
    }

    public function limit(): JsonResponse
    {
        $news = News::query();
        $news = $news->get()->take(5);

        return response()->json([
            'status' => true,
            'data' => NewsAllResource::collection($news),
        ]);
    }
}
