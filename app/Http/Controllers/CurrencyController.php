<?php

namespace App\Http\Controllers;

use App\Services\UpdateCurrencyExchangeService;

class CurrencyController extends Controller
{

    public function __invoke()
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
