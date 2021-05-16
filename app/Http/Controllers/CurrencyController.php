<?php

namespace App\Http\Controllers;

use App\Services\UpdateCurrencyExchangeService;
use Illuminate\Http\JsonResponse;

class CurrencyController extends Controller
{

    public function __invoke(): JsonResponse
    {
        $data = [
            'success' => true,
            'message' => "Values have not changed",
            'status' => 200
        ];

        $service = new UpdateCurrencyExchangeService();
        $hasChanged = $service->execute();

        if ($hasChanged)
            $data['message'] = "Values have changed";

        return response()->json($data, $data['status']);
    }
}
