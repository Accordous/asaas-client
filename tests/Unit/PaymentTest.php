<?php

namespace Accordous\AsaasClient\Tests\Unit;

use Accordous\AsaasClient\Services\AsaasService;
use Accordous\AsaasClient\Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Config;

class PaymentTest extends TestCase
{
    use WithFaker;

    /**
     * @test
     */
    public function canCreatePayment()
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
            'value' => 5,
            'dueDate' => now()
        ])->json();

        $service->customers()->destroy($customer['id']);
        $service->payments()->destroy($payment['id']);

        $this->assertEquals('payment', $payment['object']);
    }

    /**
     * @test
     */
    public function canDestroyPayment()
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
            'value' => 5,
            'dueDate' => now()
        ])->json();

        $service->customers()->destroy($customer['id']);
        $removed = $service->payments()->destroy($payment['id']);

        $this->assertEquals('200', $removed->getStatusCode());
    }

    /**
     * @test
     */
    public function canCreatePaymentWithCreditCardToken()
    {
        $service = new AsaasService(Config::get('asaas.token'));

        $creditCardNumber = '4444444444444444';
        $date = new \DateTime();
        $date->modify('+1 year');

        $customerId = $service->customers()->store([
            'name' => $this->faker->name,
            'cpfCnpj' => '711.168.120-70', // fake valid cpf
            'postalCode' => '01001001',
            'email' => $this->faker->email
        ])->json('id');

        $request = $service->creditCards()->tokenize([
            'customer' => $customerId,
            'creditCard' => [
                'holderName' => $this->faker->name,
                'number' => $creditCardNumber,
                'expiryMonth' => $date->format('m'),
                'expiryYear' => $date->format('Y'),
                'ccv' => $this->faker->numerify('###'),
            ],
            'creditCardHolderInfo' => [
                'name' => $this->faker->name,
                'email' => $this->faker->email,
                'cpfCnpj' => '711.168.120-70',
                'postalCode' => '01001-001',
                'addressNumber' => $this->faker->numerify('###'),
                'phone' => $this->faker->phoneNumber,
                'mobilePhone' => $this->faker->phoneNumber,
            ],
        ]);

        $token = $request->json()['creditCardToken'];

        $payment = $service->payments()->store([
            'customer' => $customerId,
            'billingType' => 'CREDIT_CARD',
            'value' => 5,
            'dueDate' => now(),
            'creditCardToken' => $token,
            'remoteIp' => '123.123.123.123'
        ]);

        $service->payments()->destroy($payment['id']);

        $this->assertEquals('payment', $payment['object']);
    }

    /**
     * @test
     */
    public function canCreatePaymentWithCreditCardInfo()
    {
        $service = new AsaasService(Config::get('asaas.token'));

        $creditCardNumber = '4444444444444444';
        $date = new \DateTime();
        $date->modify('+1 year');

        $customerId = $service->customers()->store([
            'name' => $this->faker->name,
            'cpfCnpj' => '711.168.120-70', // fake valid cpf
            'postalCode' => '01001001',
            'email' => $this->faker->email
        ])->json('id');

        $payment = $service->payments()->store([
            'customer' => $customerId,
            'billingType' => 'CREDIT_CARD',
            'value' => 5,
            'dueDate' => now(),
            'creditCard' => [
                'holderName' => $this->faker->name,
                'number' => $creditCardNumber,
                'expiryMonth' => $date->format('m'),
                'expiryYear' => $date->format('Y'),
                'ccv' => $this->faker->numerify('###'),
            ],
            'creditCardHolderInfo' => [
                'name' => $this->faker->name,
                'email' => $this->faker->email,
                'cpfCnpj' => '711.168.120-70',
                'postalCode' => '01001-001',
                'addressNumber' => $this->faker->numerify('###'),
                'phone' => $this->faker->phoneNumber,
                'mobilePhone' => $this->faker->phoneNumber,
            ],
            'remoteIp' => '123.123.123.123'
        ]);

        $service->payments()->destroy($payment['id']);

        $this->assertEquals('payment', $payment['object']);
    }
}
