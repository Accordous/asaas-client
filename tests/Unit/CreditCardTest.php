<?php

namespace Accordous\AsaasClient\Tests\Unit;

use Accordous\AsaasClient\Services\AsaasService;
use Accordous\AsaasClient\Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Config;

class CreditCardTest extends TestCase
{
    use WithFaker;

    /**
     * @test
     */
    public function canTokenizeCreditCard()
    {
        $service = new AsaasService(Config::get('asaas.token'));

        $creditCardNumber = '4444444444444444';
        $date = new \DateTime();
        $date->modify('+1 year');

        $token = $service->creditCards()->tokenize([
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
                'cpfCnpj' => $this->faker->cpf(),
                'postalCode' => $this->faker->numerify('########'),
                'addressNumber' => $this->faker->numerify('###'),
                'phone' => $this->faker->phoneNumber,
                'mobilePhone' => $this->faker->phoneNumber,
            ],
        ])->json();

        $this->assertEquals('200', $token->getStatusCode());
    }
}
