<?php

namespace Accordous\AsaasClient\Tests\Unit;

use Accordous\AsaasClient\Facades\AsaasClient;
use Accordous\AsaasClient\Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;

class InstallmentTest extends TestCase
{
    use WithFaker;

    /**
     * @test
     */
    public function canListInstallment()
    {
        $customer = AsaasClient::customers()->store([
            'name' => $this->faker->name,
            'cpfCnpj' => $this->faker->numerify('538.861.930-39'), // fake valid cpf
            'postalCode' => $this->faker->numerify('########'),
            'email' => $this->faker->email
        ])->json();

        $payment = AsaasClient::payments()->store([
            'customer' => $customer['id'],
            'billingType' => 'BOLETO',
            'dueDate' => now(),
            'installmentCount' => 2,
            'installmentValue' => 10,
        ])->json();


        $installments = AsaasClient::installments()->index()->json();

        AsaasClient::customers()->destroy($customer['id']);
        AsaasClient::payments()->destroy($payment['id']);

        $this->assertEquals('list', $installments['object']);
    }
}
