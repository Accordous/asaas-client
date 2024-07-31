<?php

namespace Accordous\AsaasClient\Services\Endpoints;

class WebhookEndpoint extends Endpoint
{
    private const BASE_URI = '/webhook';

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
			'name' => 'required',
            'url' => 'required',
            'email' => 'required',
	        'sendType' => [
				'required',
		        'in:SEQUENTIALLY,NON_SEQUENTIALLY'
	        ],
            'enabled' => 'required',
            'interrupted' => 'required',
	        'events' => [
		        'required',
		        'array',
	        ],
	        'apiVersion' => 'nullable',
			'authToken' => 'nullable',
        ];
    }

    protected function messages(): array
    {
        return [
			'name' => 'Nome é obrigatório.',
            'url' => 'URL é obrigatória.',
            'email' => 'Email é obrigatória.',
            'enabled' => 'Habilitar ou não o webhook.',
            'interrupted' => 'Situação da fila de sincronização é obrigatória.',
	        'sendType' => 'Tipo de envio do webhook. Utilize "SEQUENTIALLY" para envio sequencial e "NON_SEQUENTIALLY" para envio não sequencial.'
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
	        'sendType',
	        'events',
        ];
    }
}
