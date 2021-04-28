<?php

namespace Accordous\AsaasClient\Services\Endpoints;

class PaymentLinkEndpoint extends Endpoint
{
    private const BASE_URI = '/paymentLinks';

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

    public function restore(string $id)
    {
        return $this->client()->post(self::BASE_URI . '/' . $id . '/restore');
    }

    public function images(string $id)
    {
        return $this->client()->post(self::BASE_URI . '/' . $id . '/images');
    }

    protected function rules(): array
    {
        return [
            'name' => 'required',
            'billingType' => 'required',
            'chargeType' => 'required',
            'description' => 'nullable',
            'endDate' => 'nullable',
            'value' => 'nullable',
            'dueDateLimitDays' => 'nullable',
            'subscriptionCycle' => 'nullable',
            'maxInstallmentCount' => 'nullable',
        ];
    }

    protected function messages(): array
    {
        return [
            'name' => 'Nome é obrigatório.',
            'billingType' => 'Tipo da cobrança é obrigatório.',
            'chargeType' => 'Forma de cobrança é obrigatório.',
        ];
    }

    protected function attributes(): array
    {
        return [
            'name',
            'description',
            'endDate',
            'value',
            'billingType',
            'chargeType',
            'dueDateLimitDays',
            'subscriptionCycle',
            'maxInstallmentCount',
        ];
    }
}
