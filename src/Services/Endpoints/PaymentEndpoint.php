<?php

namespace Accordous\AsaasClient\Services\Endpoints;

use Illuminate\Support\Facades\Validator;

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
        return $this->client()->post(self::BASE_URI . '/' . $id, $attributes);
    }

    public function destroy(string $id)
    {
        return $this->client()->delete(self::BASE_URI . '/' . $id);
    }

    public function receiveInCash(string $id, array $attributes)
    {
        return $this->client()->post(self::BASE_URI . '/' . $id . '/receiveInCash', $attributes);
    }

    public function pixQrCode(string $id)
    {
        return $this->client()->get(self::BASE_URI . '/' . $id . '/pixQrCode');
    }

    protected function validate(array $attributes): array
    {
        $rules = $attributes['billingType'] === 'CREDIT_CARD' ? $this->creditCardRules() : $this->rules();

        return Validator::validate($attributes, $rules, $this->messages());
    }

    protected function creditCardRules(): array
    {
        return array_merge($this->rules(), [
            'creditCard' => 'required_without:creditCardToken',
            'creditCardHolderInfo' => 'required_without:creditCardToken',
            'creditCardToken' => 'required_without_all:creditCard,creditCardHolderInfo',
            'remoteIp' => 'required',
        ]);
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
            'description' => 'nullable',
            'externalReference' => 'nullable',
            'discount' => 'nullable',
            'interest' => 'nullable',
            'fine' => 'nullable',
            'postalService' => 'nullable',
            'status' => 'nullable',
            'creditCard' => 'nullable',
            'creditCardHolderInfo' => 'nullable',
            'creditCardToken' => 'nullable',
            'remoteIp' => 'nullable',
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
            'status',
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
