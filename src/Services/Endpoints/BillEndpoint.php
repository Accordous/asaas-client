<?php

namespace Accordous\AsaasClient\Services\Endpoints;

class BillEndpoint extends Endpoint
{
    private const BASE_URI = '/bill';

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

    public function cancel(string $id)
    {
        return $this->client()->post(self::BASE_URI . '/' . $id);
    }

    public function simulate(string $id, array $attributes)
    {
        return $this->client()->post(self::BASE_URI . '/' . $id . '/simulate', $this->validate($attributes));
    }

    protected function rules(): array
    {
        return [
            'identificationField' => 'required_without:barCode',
            'barCode' => 'required_without:identificationField',
            'scheduleDate' => 'nullable',
            'description' => 'nullable',
            'discount' => 'nullable',
            'dueDate' => 'nullable',
            'value' => 'nullable',
        ];
    }

    protected function messages(): array
    {
        return [
            'identificationField' => 'Linha digitável do boleto é obrigatório.',
            'barCode' => 'Código de barras do boleto é obrigatório.',
        ];
    }

    protected function attributes(): array
    {
        return [
            'identificationField',
            'scheduleDate',
            'description',
            'discount',
            'dueDate',
            'value',
        ];
    }
}
