<?php

namespace Accordous\AsaasClient\Services\Endpoints;

class CustomerEndpoint extends Endpoint
{
    private const BASE_URI = '/customers';

    public function index(array $filters = [])
    {
        return $this->client()->get(self::BASE_URI, $filters);
    }

    public function store(array $attributes)
    {
        return $this->client()->post(self::BASE_URI, $attributes);
    }

    public function show(int $id)
    {
        return $this->client()->get(self::BASE_URI . '/' . $id);
    }

    public function update(int $id, array $attributes)
    {
        return $this->client()->post(self::BASE_URI . '/' . $id, $attributes);
    }

    public function destroy(int $id)
    {
        return $this->client()->delete(self::BASE_URI . '/' . $id);
    }

    public function restore(int $id)
    {
        return $this->client()->post(self::BASE_URI . '/' . $id . '/restore');
    }
}
