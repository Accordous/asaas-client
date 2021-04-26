<?php

namespace Accordous\AsaasClient\Tests\Unit;

use Accordous\AsaasClient\Services\AsaasService;
use Accordous\AsaasClient\Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Config;

class TransferTest extends TestCase
{
    use WithFaker;

    /**
     * @test
     */
    public function canCreateAsaasTransfer()
    {
        $this->markTestSkipped();

        $service = new AsaasService(Config::get('asaas.token'));

        $transfer = $service->transfers()->store([
            'value' => 1,
            'walletId' => $walletId = $this->faker->numerify('######'),
        ]);

        $this->assertEquals($walletId, $transfer['walletId']);
    }
}
