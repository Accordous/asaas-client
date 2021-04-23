<?php

namespace Accordous\AsaasClient\Tests\Unit;

use Accordous\AsaasClient\Facades\AsaasClient;
use Accordous\AsaasClient\Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;

class PaymentTest extends TestCase
{
    use WithFaker;

    /**
     * @test
     */
    public function canCreatePayment()
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
            'value' => 5,
            'dueDate' => now()
        ])->json();

        AsaasClient::customers()->destroy($customer['id']);
        AsaasClient::payments()->destroy($payment['id']);

        $this->assertEquals('payment', $payment['object']);
    }

    /**
     * @test
     */
    public function canDestroyPayment()
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
            'value' => 5,
            'dueDate' => now()
        ])->json();

        AsaasClient::customers()->destroy($customer['id']);
        $removed = AsaasClient::payments()->destroy($payment['id']);

        $this->assertEquals('200', $removed->getStatusCode());
    }
}
