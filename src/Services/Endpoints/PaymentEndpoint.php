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

    protected function rules(): array
    {
        return [
            'customer' => 'required',
            'billingType' => 'required',
            'value' => 'required',
            'dueDate' => 'required',
        ];
    }

    protected function messages(): array
    {
        return [
            'customer' => 'Cliente é obrigatório.',
            'billingType' => 'Tipo da cobrança é obrigatório.', // BOLETO; CREDIT_CART
            'value' => 'Valor é obrigatório.',
            'dueDate' => 'Venciomento é obrigatório.',
        ];
    }
}
