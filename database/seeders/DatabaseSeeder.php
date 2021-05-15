<?php

namespace Database\Seeders;

use App\Models\CurrencyExchange;
use App\Models\StockPortfolio;
use App\Models\User;
use App\Services\UpdateCurrencyExchangeService;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::factory()->create([
            'name' => 'Jose',
            'email' => 'josanpino@gmail.com',
            'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
            'remember_token' => Str::random(10),
        ]);

        User::factory(9)->create();
        StockPortfolio::factory(10)->create();
        CurrencyExchange::factory(1)->create();
        (new UpdateCurrencyExchangeService())->execute();
    }
}
