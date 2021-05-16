<?php

namespace Tests\Feature;

use App\Services\UpdateCurrencyExchangeTestCase;
use Tests\TestCase;

class ExternalApiConnectionTest extends TestCase
{

    public function test_api_return_status_200()
    {
        $service = new UpdateCurrencyExchangeTestCase();
        $response = $service->ping();

        $this->assertEquals(200, $response);
    }

    public function test_api_return_bitcoin_euro_exchange()
    {
        $service = new UpdateCurrencyExchangeTestCase();
        $response = $service->getCurrencyChangeValue('/bitcoin');

        $this->assertIsFloat($response);
    }

    public function test_api_return_ethereum_euro_exchange()
    {
        $service = new UpdateCurrencyExchangeTestCase();
        $response = $service->getCurrencyChangeValue('/ethereum');

        $this->assertIsFloat($response);
    }
}
