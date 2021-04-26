<?php

namespace Accordous\AsaasClient\Services;

use Accordous\AsaasClient\Services\Endpoints\CustomerEndpoint;
use Accordous\AsaasClient\Services\Endpoints\InstallmentEndpoint;
use Accordous\AsaasClient\Services\Endpoints\PaymentEndpoint;
use Exception;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Http;

class AssasService
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
     * AsaasClientService constructor.
     * @throws Exception
     */
    public function __construct()
    {
        $this->http = Http::withOptions(['verify' => false]);
        $this->http->baseUrl(Config::get('asaas.host') .  '/' . Config::get('asaas.version'));
        $this->http->withHeaders(['access_token' => Config::get('asaas.token')]);

        $this->customers =  new CustomerEndpoint($this->http);
        $this->payments =  new PaymentEndpoint($this->http);
        $this->installments =  new InstallmentEndpoint($this->http);
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
}
