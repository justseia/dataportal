<?php

namespace App\Http\Controllers\API\Client\Profile;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Symfony\Component\HttpKernel\Profiler\Profile;

class ProfileController extends Controller
{
    public function index(): JsonResponse
    {
        $profile = auth()->user();
        $profile = $profile->load(['clientType']);

        return response()->json([
            'success' => true,
            'data' => $profile,
        ]);
    }
}
