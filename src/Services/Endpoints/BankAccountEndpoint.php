<?php

namespace Accordous\AsaasClient\Services\Endpoints;


class BankAccountEndpoint extends Endpoint
{
    private const BASE_URI = '/bankAccounts/mainAccount';

    public function store(array $attributes)
    {
        return $this->client()->post(self::BASE_URI, $this->validate($attributes));
    }

    protected function rules(): array
    {
        return [
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
        ];
    }

    protected function messages(): array
    {
        return [
            'accountName' => 'Nome da conta é obrigatório.',
            'thirdPartyAccount' => 'Conta de terceiros é obrigatório.',
            'bank' => 'Banco é obrigatório.',
            'agency' => 'Agência é obrigatório.',
            'account' => 'Conta é obrigatório.',
            'accountDigit' => 'Digitos da conta é obrigatório.',
            'bankAccountType' => 'Tipo da conta bancária é obrigatório.',
            'name' => 'Nome é obrigatório.',
            'cpfCnpj' => 'Documento é obrigatório.',
        ];
    }

    protected function attributes(): array
    {
        return [
            'accountName',
            'thirdPartyAccount',
            'bank',
            'agency',
            'account',
            'accountDigit',
            'bankAccountType',
            'name',
            'cpfCnpj',
            'responsiblePhone',
            'responsibleEmail',
        ];
    }
}
