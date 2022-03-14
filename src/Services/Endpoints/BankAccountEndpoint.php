<?php

namespace Accordous\AsaasClient\Services\Endpoints;


class BankAccountEndpoint extends Endpoint
{
    private const BASE_URI = '/bankAccounts/mainAccount';

    public function store(array $attributes)
    {
        return $this->client()->post(self::BASE_URI, $this->validate($attributes));
    }

    public function show()
    {
        return $this->client()->get(self::BASE_URI);
    }
    
    public function update(array $attributes)
    {
        return $this->client()->put(self::BASE_URI, $this->validate($attributes));
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
            'accountName.required' => 'Nome da conta é obrigatório.',
            'thirdPartyAccount.required' => 'Conta de terceiros é obrigatório.',
            'bank.required' => 'Banco é obrigatório.',
            'agency.required' => 'Agência é obrigatório.',
            'account.required' => 'Conta é obrigatório.',
            'accountDigit.required' => 'Digitos da conta é obrigatório.',
            'bankAccountType.required' => 'Tipo da conta bancária é obrigatório.',
            'name.required' => 'Nome é obrigatório.',
            'cpfCnpj.required' => 'Documento é obrigatório.',
        ];
    }

    protected function attributes(): array
    {
        return [
            'accountName' => 'Nome da Conta',
            'thirdPartyAccount' => 'Conta de terceiro',
            'bank' => 'Banco',
            'agency' => 'Agência',
            'account' => 'Conta',
            'accountDigit' => 'Dígito da Conta',
            'bankAccountType' => 'Tipo da Conta',
            'name' => 'Nome',
            'cpfCnpj' => 'Documento',
            'responsiblePhone' => 'Telefone do responsável',
            'responsibleEmail' => 'E-mail do responsável',
        ];
    }
}
