<?php


namespace App\Services;


use App\Exceptions\ApiConnectionException;
use App\Models\CurrencyExchange;
use Illuminate\Http\Client\RequestException;
use Illuminate\Support\Facades\Http;

class UpdateCurrencyExchangeService
{

    const URI = 'https://api.coingecko.com/api/v3/coins';
    const BTC = '/bitcoin';
    const ETH = '/ethereum';

    public function execute(): bool
    {
        $hasChanged = false;
        $bitcoin = self::getCurrencyChangeValue(self::BTC);
        $ethereum = self::getCurrencyChangeValue(self::ETH);

        $currencyExchange = CurrencyExchange::first()->fill([
            'euro_bitcoin' => $bitcoin,
            'euro_ethereum' => $ethereum
        ]);

        if ($currencyExchange->isDirty()){
            $currencyExchange->save();
            $hasChanged = true;
        }

        return $hasChanged;

    }

    /**
     * Return change value in €
     */
    private function getCurrencyChangeValue(string $endpoint): float
    {
        try {
            $currency = Http::get(self::URI . $endpoint)
                ->throw()
                ->json();
        } catch (RequestException $e) {
            throw new ApiConnectionException($e->getMessage(), $e->getCode());
        }

        return $currency['market_data']['current_price']['eur'];
    }
}
