<?php

namespace Accordous\AsaasClient\Services;

use Accordous\AsaasClient\Services\Endpoints\CustomerEndpoint;
use Accordous\AsaasClient\Services\Endpoints\InstallmentEndpoint;
use Accordous\AsaasClient\Services\Endpoints\PaymentEndpoint;
use Accordous\AsaasClient\Services\Endpoints\SubscriptionEndpoint;
use Accordous\AsaasClient\Services\Endpoints\SubscriptionInvoiceSettingEndpoint;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Http;

class AsaasService
{
    /**
     * @var \Illuminate\Http\Client\PendingRequest
     */
    private $http;

    /**
     * @var CustomerEndpoint
     */
    private $customers;

    /**
     * @var PaymentEndpoint
     */
    private $payments;

    /**
     * @var InstallmentEndpoint
     */
    private $installments;

    /**
     * @var SubscriptionEndpoint
     */
    private $subscriptions;

    /**
     * @var SubscriptionInvoiceSettingEndpoint
     */
    private $subscriptionInvoiceSettings;

    /**
     * AssasService constructor.
     * @param string $token
     */
    public function __construct(string $token)
    {
        $this->http = Http::withOptions(['verify' => false]);
        $this->http->baseUrl(Config::get('asaas.host') .  '/' . Config::get('asaas.version'));
        $this->http->withHeaders(['access_token' => $token]);

        $this->customers =  new CustomerEndpoint($this->http);
        $this->payments =  new PaymentEndpoint($this->http);
        $this->installments =  new InstallmentEndpoint($this->http);
        $this->subscriptions =  new SubscriptionEndpoint($this->http);
        $this->subscriptionInvoiceSettings =  new SubscriptionInvoiceSettingEndpoint($this->http);
    }

    /**
     * @return CustomerEndpoint
     */
    public function customers()
    {
        return $this->customers;
    }

    /**
     * @return PaymentEndpoint
     */
    public function payments()
    {
        return $this->payments;
    }

    /**
     * @return InstallmentEndpoint
     */
    public function installments()
    {
        return $this->installments;
    }

    /**
     * @return SubscriptionEndpoint
     */
    public function subscriptions()
    {
        return $this->subscriptions;
    }

    /**
     * @return SubscriptionInvoiceSettingEndpoint
     */
    public function subscriptionInvoiceSetting()
    {
        return $this->subscriptionInvoiceSettings;
    }
}
