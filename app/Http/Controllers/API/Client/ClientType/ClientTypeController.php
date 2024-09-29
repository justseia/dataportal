<?php

namespace App\Http\Controllers\API\Client\ClientType;

use App\Http\Controllers\Controller;
use App\Models\Client\ClientType;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class ClientTypeController extends Controller
{
    public function index(): JsonResponse
    {
        $clientTypes = ClientType::query();
        $clientTypes = $clientTypes->get();

        return response()->json([
            'status' => true,
            'data' => $clientTypes,
        ]);
    }
}
