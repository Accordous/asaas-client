<?php

namespace Accordous\AsaasClient\Tests\Unit;

use Accordous\AsaasClient\Enums\BankAccountType;
use Accordous\AsaasClient\Services\AsaasService;
use Accordous\AsaasClient\Tests\TestCase;
use Accordous\AsaasClient\ValueObject\Bank;
use Accordous\AsaasClient\ValueObject\BankAccount;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Config;

class BanksTest extends TestCase
{
    use WithFaker;

    /**
     * @test
     */
    public function canCreateAsaasBankAccounts()
    {
        $service = new AsaasService(Config::get('asaas.token'));

        $bank = new Bank($this->faker->numerify('###'));

        $bankAccount = new BankAccount($bank,
            $this->faker->name,
            $this->faker->name,
            $this->faker->date,
            $this->faker->numerify('###########'),
            $this->faker->numerify('###'),
            $this->faker->numerify('######'),
            $this->faker->numerify('#'),
            $this->faker->randomElement([BankAccountType::CONTA_CORRENTE, BankAccountType::CONTA_POUPANCA])
        );

        dd($bankAccount->toArray());

        $response = $service->bankAccounts()->store([
            'accountName' => 'required',
            'thirdPartyAccount' => 'required',
            'bank' => 'required',
            'agency' => 'required',
            'account' => 'required',
            'accountDigit' => 'required',
            'bankAccountType' => 'required',
            'name' => 'required',
            'cpfCnpj' => 'required',
            'responsiblePhone' => 'nullable',
            'responsibleEmail' => 'nullable',
        ]);

        dd($response);
//        $this->assertEquals($walletId, $response['walletId']);
    }
}
