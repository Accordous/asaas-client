<?php

namespace Accordous\AsaasClient\Services\Endpoints;

class SubscriptionEndpoint extends Endpoint
{
    private const BASE_URI = '/subscriptions';

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
        return $this->client()->post(self::BASE_URI . '/' . $id, $attributes);
    }

    public function destroy(string $id)
    {
        return $this->client()->delete(self::BASE_URI . '/' . $id);
    }

    public function payments(string $id)
    {
        return $this->client()->post(self::BASE_URI . '/' . $id . '/payments');
    }

    public function invoices(string $id, array $filters = [])
    {
        return $this->client()->get(self::BASE_URI . '/' . $id . '/invoices', $filters);
    }

    protected function rules(): array
    {
        return [
            'customer' => 'required',
            'billingType' => 'required',
            'value' => 'required',
            'nextDueDate' => 'required',
            'cycle' => 'required',
            'creditCard' => 'required_if:billingType,CREDIT_CARD',
            'creditCardHolderInfo' => 'required_if:billingType,CREDIT_CARD',
            'remoteIp' => 'required_if:billingType,CREDIT_CARD',
            'discount' => 'nullable',
            'interest' => 'nullable',
            'fine' => 'nullable',
            'description' => 'nullable',
            'endDate' => 'nullable',
            'maxPayments' => 'nullable',
            'externalReference' => 'nullable',
            'dueDate' => 'nullable',
            'installmentCount' => 'nullable',
            'installmentValue' => 'nullable',
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
            'nextDueDate' => 'Venciomento é obrigatório.',
            'cycle' => 'Periodicidade é obrigatório.',
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
            'nextDueDate',
            'discount',
            'interest',
            'fine',
            'cycle',
            'description',
            'endDate',
            'maxPayments',
            'externalReference',
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
