<?php

namespace Accordous\AsaasClient\Tests\Unit;

use Accordous\AsaasClient\Enums\BillingType;
use Accordous\AsaasClient\Enums\ChargeType;
use Accordous\AsaasClient\Services\AsaasService;
use Accordous\AsaasClient\Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Config;

class PaymentLinksTest extends TestCase
{
    use WithFaker;

    /**
     * @test
     */
    public function canCreatePaymentLinks()
    {
        $service = new AsaasService(Config::get('asaas.token'));

        $paymentLink = $service->paymentLinks()->store([
            'name' => $name = $this->faker->name,
            'billingType' => BillingType::CREDIT_CARD,
            'chargeType' => ChargeType::RECURRENT,
        ])->json();

        $service->paymentLinks()->destroy($paymentLink['id']);

        $this->assertEquals($name, $paymentLink['name']);
    }

    /**
     * @test
     */
    public function canRestorePaymentLinks()
    {
        $service = new AsaasService(Config::get('asaas.token'));

        $paymentLink = $service->paymentLinks()->store([
            'name' => $name = $this->faker->name,
            'billingType' => BillingType::CREDIT_CARD,
            'chargeType' => ChargeType::RECURRENT,
        ])->json();

        $service->paymentLinks()->destroy($paymentLink['id'])->json();

        $restored = $service->paymentLinks()->restore($paymentLink['id'])->json();

        $this->assertEquals(false, $restored['deleted']);
    }
}
