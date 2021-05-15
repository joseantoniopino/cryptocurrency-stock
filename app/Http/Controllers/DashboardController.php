<?php

namespace App\Http\Controllers;

use App\Models\CurrencyExchange;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function __invoke(): View
    {
        $currency = CurrencyExchange::first();
        $user = Auth::user();
        return view('dashboard', [
            'user' => $user,
            'currency' => $currency
        ]);
    }
}
