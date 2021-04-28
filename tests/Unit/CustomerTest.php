<?php

namespace Accordous\AsaasClient\Tests\Unit;

use Accordous\AsaasClient\Services\AsaasService;
use Accordous\AsaasClient\Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Config;
use Illuminate\Validation\ValidationException;

class CustomerTest extends TestCase
{
    use WithFaker;

    /**
     * @test
     */
    public function canDestroyCustomer()
    {
        $service = new AsaasService(Config::get('asaas.token'));

        $customer = $service->customers()->store([
            'name' => $this->faker->name,
            'cpfCnpj' => $this->faker->numerify('538.861.930-39'), // fake valid cpf
            'postalCode' => $this->faker->numerify('########'),
            'email' => $this->faker->email
        ])->json();

        $removed = $service->customers()->destroy($customer['id']);

        $this->assertEquals('200', $removed->getStatusCode());
    }

    /**
     * @test
     */
    public function canFilterListCustomers()
    {
        $service = new AsaasService(Config::get('asaas.token'));

        $data = $service->customers()->index([
            'email' => $this->faker->email
        ])->json();

        $this->assertEquals('list', $data['object']);
    }

    /**
     * @test
     */
    public function canListCustomers()
    {
        $service = new AsaasService(Config::get('asaas.token'));

        $data = $service->customers()->index()->json();

        $this->assertEquals('list', $data['object']);
    }

    /**
     * @test
     */
    public function checkValidationCustomer()
    {
        $this->expectException(ValidationException::class);

        $service = new AsaasService(Config::get('asaas.token'));

        $service->customers()->store([]);
    }

    /**
     * @test
     */
    public function canGetCustomerByCPF()
    {
        $service = new AsaasService(Config::get('asaas.token'));

        $customer = $service->customers()->store([
            'name' => $this->faker->name,
            'cpfCnpj' => $this->faker->numerify('503.327.400-72'), // fake valid cpf
            'postalCode' => $this->faker->numerify('########'),
            'email' => $this->faker->email
        ])->json();

        $data = $service->customers()->index([
            'cpfCnpj' => $customer['cpfCnpj']
        ])->json()['data'];

        $service->customers()->destroy($customer['id']);

        $this->assertEquals('50332740072', $data[0]['cpfCnpj']);
    }
}
