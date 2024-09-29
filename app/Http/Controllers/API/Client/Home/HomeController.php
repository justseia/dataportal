<?php

namespace App\Http\Controllers\API\Client\Home;

use App\Http\Controllers\Controller;
use App\Http\Resources\API\Client\Home\SearchResource;
use App\Models\Question\Keyword;
use App\Models\Question\Year;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function search(Request $request): JsonResponse
    {
        $result = null;

        if ($request->input('searchType') == 'key') {
            $result = Keyword::query();
            $result->where('key', 'ILIKE', '%' . $request->input('search') . '%');
        } else if ($request->input('searchType') == 'year') {
            $result = Year::query();
            $result->orderBy('year', 'desc');
            $result->where('year', 'ILIKE', '%' . $request->input('search') . '%');
        }

        $result = $result->get();

        return response()->json([
            'status' => true,
            'data' => SearchResource::collection($result),
        ]);
    }
}
