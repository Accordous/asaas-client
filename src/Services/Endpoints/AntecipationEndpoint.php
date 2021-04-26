<?php

namespace Accordous\AsaasClient\Services\Endpoints;

class AntecipationEndpoint extends Endpoint
{
    private const BASE_URI = '/anticipations';

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

    public function simulate(array $attributes)
    {
        return $this->client()->post(self::BASE_URI . '/simulate', $this->validate($attributes));
    }

    public function attributes(): array
    {
        return [
            'agreementSignature',
            'installment',
            'payment',
            'documents',
        ];
    }
}
