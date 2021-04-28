<?php

namespace Accordous\AsaasClient\Services\Endpoints;

class PaymentCheckoutConfigEndpoint extends Endpoint
{
    private const BASE_URI = '/myAccount/paymentCheckoutConfig';

    public function index()
    {
        return $this->client()->get(self::BASE_URI . '/paymentCheckoutConfig/');
    }

    public function store(array $attributes)
    {
        return $this->client()->post(self::BASE_URI . '/paymentCheckoutConfig/', $attributes);
    }

    protected function rules(): array
    {
        return [
            'logoBackgroundColor' => 'required',
            'infoBackgroundColor' => 'required',
            'fontColor' => 'required',
            'enabled' => 'required',
            'logoFile' => 'nullable',
        ];
    }

    protected function messages(): array
    {
        return [
            'logoBackgroundColor' => 'Cor de fundo do logo é obrigatório.',
            'infoBackgroundColor' => 'Cor de fundo das suas informações é obrigatório.',
            'fontColor' => 'Cor da fonte das suas informações é obrigatório.',
            'enabled' => 'True para habilitar a personalização é obrigatório.',
        ];
    }

    protected function attributes(): array
    {
        return [
            'logoBackgroundColor',
            'infoBackgroundColor',
            'fontColor',
            'enabled',
            'logoFile',
        ];
    }
}
