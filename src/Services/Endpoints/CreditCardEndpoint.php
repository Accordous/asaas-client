<?php

namespace Accordous\AsaasClient\Services\Endpoints;

class CreditCardEndpoint extends Endpoint
{
    private const BASE_URI = '/creditCard';

    public function tokenize(array $attributes)
    {
        $url = self::BASE_URI . '/tokenize';
        $attributes = $this->validate($attributes);

        return $this->client()->post($url, $attributes);
    }

    protected function rules(): array
    {
        return [
            'customer' => 'required',
            'creditCard.holderName' => 'required',
            'creditCard.number' => 'required',
            'creditCard.expiryMonth' => 'required',
            'creditCard.expiryYear' => 'required',
            'creditCard.ccv' => 'required',
            'creditCardHolderInfo.name' => 'required',
            'creditCardHolderInfo.email' => 'required|email',
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
            'customer.required' => 'O ID do cliente é obrigatório.',
            'creditCard.holderName.required' => 'Nome no cartão é obrigatório.',
            'creditCard.number.required' => 'Número do cartão é obrigatório.',
            'creditCard.expiryMonth.required' => 'Mês de expiração é obrigatório.',
            'creditCard.expiryYear.required' => 'Ano de expiração é obrigatório.',
            'creditCard.ccv.required' => 'CVV é obrigatório.',
            'creditCardHolderInfo.name.required' => 'Nome do titular é obrigatório.',
            'creditCardHolderInfo.email.required' => 'E-mail do titular é obrigatório.',
            'creditCardHolderInfo.cpfCnpj.required' => 'Documento do titular é obrigatório.',
            'creditCardHolderInfo.postalCode.required' => 'CEP do titular é obrigatório.',
            'creditCardHolderInfo.addressNumber.required' => 'Número do endereço do titular é obrigatório.',
            'creditCardHolderInfo.addressComplement.nullable' => 'Complemento do endereço do titular é opcional.',
            'creditCardHolderInfo.phone.required' => 'Telefone do titular é obrigatório.',
            'creditCardHolderInfo.mobilePhone.required' => 'Celular do titular é obrigatório.',
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
