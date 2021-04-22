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
    public function canListCustomers()
    {
        $data = AsaasClient::customers()->index()->json();

        $this->assertEquals('list', $data['object']);
    }

    /**
     * @test
     */
    public function nameIsRequired()
    {
        $data = AsaasClient::customers()->store([])->json();

        $this->assertEquals('invalid_name', $data['errors'][0]['code']);
    }

    /**
     * @test
     */
    public function documentIsRequired()
    {
        $data = AsaasClient::customers()->store([
            'cpfCnpj' => $this->faker->numerify('###########'),
        ])->json();

        $this->assertEquals('invalid_cpfCnpj', $data['errors'][0]['code']);
    }
}
