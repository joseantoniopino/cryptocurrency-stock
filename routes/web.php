<?php

use App\Http\Controllers\CurrencyController;
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;


Route::redirect('/', 'dashboard');

Route::get('/dashboard', DashboardController::class)->middleware(['auth'])->name('dashboard');
Route::get('/update-currency', [CurrencyController::class, 'updateCurrencyExchange'] )->name('currency.update');

require __DIR__.'/auth.php';
