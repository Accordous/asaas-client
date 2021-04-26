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
        return $this->client()->post(self::BASE_URI . '/' . $id, $this->validate($attributes));
    }

    public function destroy(string $id)
    {
        return $this->client()->delete(self::BASE_URI . '/' . $id);
    }

    public function payments(string $id)
    {
        return $this->client()->post(self::BASE_URI . '/' . $id . '/payments');
    }

    public function invoices(int $id, array $filters = [])
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
        ];
    }

    protected function messages(): array
    {
        return [
            'customer' => 'Cliente é obrigatório.',
            'billingType' => 'Tipo da cobrança é obrigatório.', // BOLETO; CREDIT_CARD; UNDEFINED
            'value' => 'Valor é obrigatório.',
            'nextDueDate' => 'Venciomento é obrigatório.',
            'cycle' => 'Periodicidade é obrigatório.', // WEEKLY; BIWEEKLY; MONTHLY; QUARTERLY; SEMIANNUALLY; YEARLY
        ];
    }
}
