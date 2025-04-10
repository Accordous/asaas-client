<?php

namespace Accordous\AsaasClient\Tests\Unit;

use Accordous\AsaasClient\Services\AsaasService;
use Accordous\AsaasClient\Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Config;
use Faker\Factory as Faker;

class CreditCardTest extends TestCase
{
    use WithFaker;

    protected function setUp(): void
    {
        parent::setUp();

        $this->faker = Faker::create('pt_BR');
    }

    /**
     * @test
     */
    public function canTokenizeCreditCard()
    {
        $service = new AsaasService(Config::get('asaas.token'));

        $creditCardNumber = '4444444444444444';
        $date = new \DateTime();
        $date->modify('+1 year');


        $customer = $service->customers()->store([
            'name' => $this->faker->name,
            'cpfCnpj' => $this->faker->numerify('711.168.120-70'), // fake valid cpf
            'postalCode' => '01001001',
            'email' => $this->faker->email
        ])->json('id');

        $request = $service->creditCards()->tokenize([
            'customer' => $customer,
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
                'postalCode' => $this->faker->randomElement([
                    '79015-000',
                    '88330-206'
                ]),
                'addressNumber' => $this->faker->numerify('###'),
                'phone' => $this->faker->phoneNumber,
                'mobilePhone' => $this->faker->phoneNumber,
            ],
        ]);

        $data = $request->json();

        $this->assertEquals(200, $request->status());
        $this->assertArrayHasKey('creditCardNumber', $data);
        $this->assertArrayHasKey('creditCardToken', $data);
        $this->assertArrayHasKey('creditCardBrand', $data);
    }
}
