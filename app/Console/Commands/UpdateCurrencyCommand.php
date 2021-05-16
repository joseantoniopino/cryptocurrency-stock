<?php

namespace App\Console\Commands;

use App\Services\UpdateCurrencyExchangeService;
use Illuminate\Console\Command;

class UpdateCurrencyCommand extends Command
{
    protected $signature = 'update:currency';

    protected $description = 'Update the currency exchange values';

    public function __construct()
    {
        parent::__construct();
    }


    public function handle(): void
    {
        $service = new UpdateCurrencyExchangeService();
        $service->execute();
    }
}
