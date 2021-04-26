<?php

namespace Accordous\AsaasClient\Services\Endpoints;

class CreaditBureauReportEndpoint extends Endpoint
{
    private const BASE_URI = '/creditBureauReport';

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

    protected function rules(): array
    {
        return [
            'state' => 'required',
        ];
    }

    protected function messages(): array
    {
        return [
            'state' => 'Estado é obrigatório.',
        ];
    }

    protected function attributes(): array
    {
        return [
            'customer',
            'cpfCnpj',
            'state',
        ];
    }
}
