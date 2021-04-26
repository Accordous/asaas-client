<?php

namespace Accordous\AsaasClient\Services\Endpoints;

class TransferEndpoint extends Endpoint
{
    private const BASE_URI = '/tranfers';

    public function index(array $filters = [])
    {
        return $this->client()->get(self::BASE_URI, $filters);
    }

    public function store(array $attributes)
    {
        return $this->client()->post(self::BASE_URI, $this->validate($attributes));
    }

    protected function rules(): array
    {
        return [
            'value' => 'required',
            'bankAccount' => 'required_without:walletId',
            'walletId' => 'required_without:bankAccount',
        ];
    }

    protected function messages(): array
    {
        return [
            'value' => 'Valor é obrigatório.',
            'bankAccount' => 'Conta bancária é obrigatória.',
        ];
    }

    protected function attributes(): array
    {
        return [
            'value',
            'bankAccount',
        ];
    }

    protected function asaasAttributes(): array
    {
        return [
            'value',
            'walletId',
        ];
    }
}
