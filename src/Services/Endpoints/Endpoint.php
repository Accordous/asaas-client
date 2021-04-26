<?php

namespace Accordous\AsaasClient\Services\Endpoints;

use Illuminate\Http\Client\PendingRequest;
use Illuminate\Support\Facades\Validator;

abstract class Endpoint
{
    protected $http;

    public function __construct(PendingRequest $http)
    {
        $this->http = $http;
    }

    protected function client(): PendingRequest
    {
        return $this->http;
    }

    protected function validate(array $attributes): array
    {
        return Validator::validate($attributes, $this->rules(), $this->messages());
    }

    protected function rules(): array
    {
        return [];
    }

    protected function messages(): array
    {
        return [];
    }

    protected function attributes(): array
    {
        return [];
    }
}
