<?php

namespace Accordous\AsaasClient\Services\Endpoints;


class PixEndpoint extends Endpoint
{
    private const BASE_URI = '/pix/addressKeys';


    public function index()
    {
        return $this->client()->get(self::BASE_URI);
    }
    
    public function store(array $attributes)
    {
        return $this->client()->post(self::BASE_URI, $this->validate($attributes));
    }

    public function delete(string $id)
    {
        return $this->client()->delete(self::BASE_URI . '/' . $id);
    }

    protected function rules(): array
    {
        return [
            'type' => 'required',
        ];
    }

    protected function messages(): array
    {
        return [
            'type' => 'Tipo de chave é obrigatório',
        ];
    }

    protected function attributes(): array
    {
        return [
            'type',
        ];
    }
}
