<?php

namespace Accordous\AsaasClient\Services\Endpoints;

class CreditCardEndpoint extends Endpoint
{
    private const BASE_URI = '/creditCard';

    public function tokenize(array $attributes)
    {
        return $this->client()->post(self::BASE_URI . '/tokenize', $this->validate($attributes));
    }

    protected function rules(): array
    {
        return [
            'creditCard.holderName' => 'required',
            'creditCard.number' => 'required',
            'creditCard.expiryMonth' => 'required',
            'creditCard.expiryYear' => 'required',
            'creditCard.ccv' => 'required',
            'creditCardHolderInfo.name' => 'required',
            'creditCardHolderInfo.email' => 'required',
            'creditCardHolderInfo.cpfCnpj' => 'required',
            'creditCardHolderInfo.postalCode' => 'required',
            'creditCardHolderInfo.addressNumber' => 'required',
            'creditCardHolderInfo.addressComplement' => 'nullable',
            'creditCardHolderInfo.phone' => 'required',
            'creditCardHolderInfo.mobilePhone' => 'required',
        ];
    }

    protected function messages(): array
    {
        return [
            'creditCard.holderName' => 'Nome no cartão é obrigatório.',
            'creditCard.number' => 'Número do cartão é obrigatório.',
            'creditCard.expiryMonth' => 'Mês de expiração é obrigatório.',
            'creditCard.expiryYear' => 'Ano de expiração é obrigatório.',
            'creditCard.ccv' => 'CVV é obrigatório.',
            'creditCardHolderInfo.name' => 'Nome do titular é obrigatório.',
            'creditCardHolderInfo.email' => 'E-mail do titular é obrigatório.',
            'creditCardHolderInfo.cpfCnpj' => 'Documento do titular é obrigatório.',
            'creditCardHolderInfo.postalCode' => 'CEP do titular é obrigatório.',
            'creditCardHolderInfo.addressNumber' => 'Número do endereço do titular é obrigatório.',
            'creditCardHolderInfo.addressComplement' => 'Complemento do endereço do titular é opcional.',
            'creditCardHolderInfo.phone' => 'Telefone do titular é obrigatório.',
            'creditCardHolderInfo.mobilePhone' => 'Celular do titular é obrigatório.',
        ];
    }

    protected function attributes(): array
    {
        return [
            'creditCard.holderName',
            'creditCard.number',
            'creditCard.expiryMonth',
            'creditCard.expiryYear',
            'creditCard.ccv',
            'creditCardHolderInfo.name',
            'creditCardHolderInfo.email',
            'creditCardHolderInfo.cpfCnpj',
            'creditCardHolderInfo.postalCode',
            'creditCardHolderInfo.addressNumber',
            'creditCardHolderInfo.addressComplement',
            'creditCardHolderInfo.phone',
            'creditCardHolderInfo.mobilePhone',
        ];
    }
}
