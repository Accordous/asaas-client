<?php

namespace Accordous\AsaasClient\Services\Endpoints;

class WebhookInvoiceEndpoint extends Endpoint
{
    private const BASE_URI = '/webhook/invoice';

    public function index()
    {
        return $this->client()->get(self::BASE_URI);
    }

    public function store(array $attributes)
    {
        return $this->client()->post(self::BASE_URI, $this->validate($attributes));
    }

    protected function rules(): array
    {
        return [
            'url' => 'required',
            'email' => 'required',
            'apiVersion' => 'required',
            'enabled' => 'required',
            'interrupted' => 'required',
            'authToken' => 'nullable',
        ];
    }

    protected function messages(): array
    {
        return [
            'url' => 'URL é obrigatória.',
            'email' => 'Email é obrigatória.',
            'apiVersion' => 'Versão utilizada da API. Utilize "3" para a versão v3.',
            'enabled' => 'Habilitar ou não o webhook.',
            'interrupted' => 'Situação da fila de sincronização é obrigatória.',
        ];
    }

    protected function attributes(): array
    {
        return [
            'url',
            'email',
            'apiVersion',
            'enabled',
            'interrupted',
            'authToken',
        ];
    }
}
