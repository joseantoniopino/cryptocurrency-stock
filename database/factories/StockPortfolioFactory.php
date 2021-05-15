<?php

namespace Database\Factories;

use App\Models\StockPortfolio;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class StockPortfolioFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = StockPortfolio::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {

        return [
            'user_id' => $this->faker->unique()->numberBetween(1, User::count()),
            'bitcoin' => $this->faker->randomFloat(5, 50.00000, 9999.99999),
            'ethereum' => $this->faker->randomFloat(5, 50.00000, 9999.99999)
        ];
    }
}
