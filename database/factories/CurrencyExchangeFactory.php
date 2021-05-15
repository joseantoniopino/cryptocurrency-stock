<?php

namespace Database\Factories;

use App\Models\CurrencyExchange;
use Illuminate\Database\Eloquent\Factories\Factory;

class CurrencyExchangeFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = CurrencyExchange::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'euro_bitcoin' => 0.00000,
            'euro_ethereum' => 0.00000
        ];
    }
}
