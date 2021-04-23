<?php

namespace Accordous\AsaasClient\Tests\Unit;

use Accordous\AsaasClient\Facades\AsaasClient;
use Accordous\AsaasClient\Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;

class CustomerTest extends TestCase
{
    use WithFaker;

    /**
     * @test
     */
    public function canDestroyCustomer()
    {
        $customer = AsaasClient::customers()->store([
            'name' => $this->faker->name,
            'cpfCnpj' => $this->faker->numerify('538.861.930-39'), // fake valid cpf
            'postalCode' => $this->faker->numerify('########'),
            'email' => $this->faker->email
        ])->json();

        $removed = AsaasClient::customers()->destroy($customer['id']);

        $this->assertEquals('200', $removed->getStatusCode());
    }

    /**
     * @test
     */
    public function canFilterListCustomers()
    {
        $data = AsaasClient::customers()->index([
            'email' => $this->faker->email
        ])->json();

        $this->assertEquals('list', $data['object']);
    }

    /**
     * @test
     */
    public function canListCustomers()
    {
        $data = AsaasClient::customers()->index()->json();

        $this->assertEquals('list', $data['object']);
    }

    /**
     * @test
     */
    public function customerNameIsRequired()
    {
        $data = AsaasClient::customers()->store([])->json();

        $this->assertEquals('invalid_name', $data['errors'][0]['code']);
    }

    /**
     * @test
     */
    public function customerDocumentIsRequired()
    {
        $data = AsaasClient::customers()->store([
            'cpfCnpj' => $this->faker->numerify('###########'),
        ])->json();

        $this->assertEquals('invalid_cpfCnpj', $data['errors'][0]['code']);
    }
}
