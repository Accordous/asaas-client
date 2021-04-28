<?php

namespace Accordous\AsaasClient\Services\Endpoints;

class PaymentEndpoint extends Endpoint
{
    private const BASE_URI = '/payments';

    public function index(array $filters = [])
    {
        return $this->client()->get(self::BASE_URI, $filters);
    }

    public function store(array $attributes)
    {
        return $this->client()->post(self::BASE_URI, $this->validate($attributes));
    }

    public function show(string $id)
    {
        return $this->client()->get(self::BASE_URI . '/' . $id);
    }

    public function update(string $id, array $attributes)
    {
        return $this->client()->post(self::BASE_URI . '/' . $id, $this->validate($attributes));
    }

    public function destroy(string $id)
    {
        return $this->client()->delete(self::BASE_URI . '/' . $id);
    }

    public function receiveInCash(string $id)
    {
        return $this->client()->delete(self::BASE_URI . '/' . $id . '/receiveInCash');
    }

    protected function rules(): array
    {
        return [
            'customer' => 'required',
            'billingType' => 'required',
            'value' => 'required_without:installmentCount',
            'dueDate' => 'required',
            'installmentCount' => 'required_with:installmentValue',
            'installmentValue' => 'required_with:installmentCount',
            'creditCard' => 'required_if:billingType,CREDIT_CARD',
            'creditCardHolderInfo' => 'required_if:billingType,CREDIT_CARD',
            'remoteIp' => 'required_if:billingType,CREDIT_CARD',
            'description' => 'nullable',
            'externalReference' => 'nullable',
            'discount' => 'nullable',
            'interest' => 'nullable',
            'fine' => 'nullable',
            'postalService' => 'nullable',
            'creditCardToken' => 'nullable',
        ];
    }

    protected function messages(): array
    {
        return [
            'customer' => 'Cliente é obrigatório.',
            'billingType' => 'Tipo da cobrança é obrigatório.',
            'value' => 'Valor é obrigatório.',
            'dueDate' => 'Venciomento é obrigatório.',
            'creditCard' => 'Cartão de crédito é obrigatório.',
            'creditCardHolderInfo' => 'Titular do cartão de crédito é obrigatório.',
            'remoteIp' => 'IP de onde o cliente está fazendo a compra é obrigatório.',
        ];
    }

    protected function attributes(): array
    {
        return [
            'customer',
            'billingType',
            'value',
            'dueDate',
            'description',
            'externalReference',
            'installmentCount',
            'installmentValue',
            'discount',
            'interest',
            'fine',
            'postalService',
        ];
    }

    protected function creditCardAttributes(): array
    {
        return [
            'customer',
            'billingType',
            'value',
            'dueDate',
            'description',
            'externalReference',
            'installmentCount',
            'installmentValue',
            'discount',
            'interest',
            'fine',
            'postalService',
            'creditCard',
            'creditCardHolderInfo',
            'creditCardToken',
            'remoteIp',
        ];
    }
}
