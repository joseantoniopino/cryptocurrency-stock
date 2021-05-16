<?php

namespace Database\Factories;

use App\Models\CurrencyExchange;
use Illuminate\Database\Eloquent\Factories\Factory;
use JetBrains\PhpStorm\ArrayShape;

class CurrencyExchangeFactory extends Factory
{
    protected $model = CurrencyExchange::class;

    public function definition(): array
    {
        return [
            'euro_bitcoin' => 0.00000,
            'euro_ethereum' => 0.00000
        ];
    }
}
