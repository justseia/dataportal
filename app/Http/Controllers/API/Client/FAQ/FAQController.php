<?php

namespace App\Http\Controllers\API\Client\FAQ;

use App\Http\Controllers\Controller;
use App\Http\Resources\API\Client\FAQ\FAQResource;
use App\Models\Faq\Faq;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class FAQController extends Controller
{
    public function index(): JsonResponse
    {
        $faqs = FAQ::query();
        $faqs = $faqs->get();

        return response()->json([
            'status' => true,
            'data' => FAQResource::collection($faqs)
        ]);
    }
}
