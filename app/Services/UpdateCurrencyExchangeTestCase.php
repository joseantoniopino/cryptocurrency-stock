<?php


namespace App\Services;


use Illuminate\Support\Facades\Http;

class UpdateCurrencyExchangeTestCase extends UpdateCurrencyExchangeService
{

    public function ping(): int
    {
        return Http::get('https://api.coingecko.com/api/v3/ping')->status();
    }

    public function getCurrencyChangeValue(string $endpoint): float
    {
        return parent::getCurrencyChangeValue($endpoint);
    }
}
