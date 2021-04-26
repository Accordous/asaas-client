<?php

namespace Accordous\AsaasClient\Tests\Unit;

use Accordous\AsaasClient\Services\AsaasService;
use Accordous\AsaasClient\Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Config;

class InstallmentTest extends TestCase
{
    use WithFaker;

    /**
     * @test
     */
    public function canListInstallment()
    {
        $service = new AsaasService(Config::get('asaas.token'));

        $customer = $service->customers()->store([
            'name' => $this->faker->name,
            'cpfCnpj' => $this->faker->numerify('538.861.930-39'), // fake valid cpf
            'postalCode' => $this->faker->numerify('########'),
            'email' => $this->faker->email
        ])->json();

        $payment = $service->payments()->store([
            'customer' => $customer['id'],
            'billingType' => 'BOLETO',
            'dueDate' => now(),
            'installmentCount' => 2,
            'installmentValue' => 10,
        ])->json();


        $installments = $service->installments()->index()->json();

        $service->customers()->destroy($customer['id']);
        $service->payments()->destroy($payment['id']);

        $this->assertEquals('list', $installments['object']);
    }
}
