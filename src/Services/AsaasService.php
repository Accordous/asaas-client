<?php

namespace Accordous\AsaasClient\Services;

use Accordous\AsaasClient\Services\Endpoints\AntecipationEndpoint;
use Accordous\AsaasClient\Services\Endpoints\BillEndpoint;
use Accordous\AsaasClient\Services\Endpoints\CreaditBureauReportEndpoint;
use Accordous\AsaasClient\Services\Endpoints\CustomerEndpoint;
use Accordous\AsaasClient\Services\Endpoints\InstallmentEndpoint;
use Accordous\AsaasClient\Services\Endpoints\PaymentDunningEndpoint;
use Accordous\AsaasClient\Services\Endpoints\PaymentEndpoint;
use Accordous\AsaasClient\Services\Endpoints\PaymentLinkEndpoint;
use Accordous\AsaasClient\Services\Endpoints\SubscriptionEndpoint;
use Accordous\AsaasClient\Services\Endpoints\SubscriptionInvoiceSettingEndpoint;
use Accordous\AsaasClient\Services\Endpoints\TransferEndpoint;
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
     * @var PaymentLinkEndpoint
     */
    private $paymentLinks;

    /**
     * @var TransferEndpoint
     */
    private $transfers;

    /**
     * @var AntecipationEndpoint
     */
    private $antecipations;

    /**
     * @var PaymentDunningEndpoint
     */
    private $paymentdunnings;

    /**
     * @var BillEndpoint
     */
    private $bills;

    /**
     * @var CreaditBureauReportEndpoint
     */
    private $creaditBureauReports;

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
        $this->paymentLinks = new PaymentLinkEndpoint($this->http);
        $this->transfers = new TransferEndpoint($this->http);
        $this->antecipations = new AntecipationEndpoint($this->http);
        $this->paymentdunnings = new PaymentDunningEndpoint($this->http);
        $this->bills = new BillEndpoint($this->http);
        $this->creaditBureauReports = new CreaditBureauReportEndpoint($this->http);
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

    /**
     * @return PaymentLinkEndpoint
     */
    public function paymentLinks()
    {
        return $this->paymentLinks;
    }

    /**
     * @return TransferEndpoint
     */
    public function transfers()
    {
        return $this->transfers;
    }

    /**
     * @return AntecipationEndpoint
     */
    public function antecipations()
    {
        return $this->antecipations;
    }

    /**
     * @return PaymentDunningEndpoint
     */
    public function paymentdunnings()
    {
        return $this->paymentdunnings;
    }

    /**
     * @return BillEndpoint
     */
    public function bills()
    {
        return $this->bills;
    }

    /**
     * @return CreaditBureauReportEndpoint
     */
    public function creaditBureauReports()
    {
        return $this->creaditBureauReports;
    }
}
