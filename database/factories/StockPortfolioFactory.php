<?php

namespace Database\Factories;

use App\Models\StockPortfolio;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class StockPortfolioFactory extends Factory
{
    protected $model = StockPortfolio::class;

    public function definition(): array
    {
        return [
            'user_id' => $this->faker->unique()->numberBetween(1, User::count()),
            'bitcoin' => $this->faker->randomFloat(5, 50.00000, 9999.99999),
            'ethereum' => $this->faker->randomFloat(5, 50.00000, 9999.99999)
        ];
    }
}
