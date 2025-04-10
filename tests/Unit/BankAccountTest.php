<?php

namespace Accordous\AsaasClient\Tests\Unit;

use Accordous\AsaasClient\Enums\BankAccountType;
use Accordous\AsaasClient\Services\AsaasService;
use Accordous\AsaasClient\Tests\TestCase;
use Accordous\AsaasClient\ValueObject\Bank;
use Accordous\AsaasClient\ValueObject\BankAccount;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Config;

class BankAccountTest extends TestCase
{
    use WithFaker;

    /**
     * @test
     */
    public function canCreateAsaasBankAccounts()
    {
        $service = new AsaasService(Config::get('asaas.token'));

        $bank = new Bank(341);

        $bankAccount = new BankAccount(
            $bank,
            $this->faker->name,
            $this->faker->name,
            $this->faker->date,
            '590.437.980-37',
            '1',
            '2222',
            $this->faker->numerify('#'),
            BankAccountType::CONTA_CORRENTE,
        );

        $attributes = [
            'bank' => $bank->code,
            'accountName' => $bankAccount->accountName,
            'name' => $bankAccount->ownerName,
            'cpfCnpj' => $bankAccount->cpfCnpj,
            'agency' => $bankAccount->agency,
            'account' => $bankAccount->account,
            'accountDigit' => $bankAccount->accountDigit,
            'bankAccountType' => $bankAccount->bankAccountType,
            'thirdPartyAccount' => $this->faker->boolean,
        ];

        $response = $service->bankAccounts()->store($attributes);

        $this->assertEquals('200', $response->getStatusCode());
    }
}
