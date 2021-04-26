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

    public function show(int $id)
    {
        return $this->client()->get(self::BASE_URI . '/' . $id);
    }

    public function update(int $id, array $attributes)
    {
        return $this->client()->post(self::BASE_URI . '/' . $id, $this->validate($attributes));
    }

    public function delete(int $id)
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
        ];
    }

    protected function messages(): array
    {
        return [
            'name' => 'Nome é obrigatório.',
            'billingType' => 'Tipo da cobrança é obrigatório.', // BOLETO; CREDIT_CARD
            'chargeType' => 'Forma de cobrança é obrigatório.', // DETACHED; RECURRENT; INSTALLMENT
        ];
    }
}
