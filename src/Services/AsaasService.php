<?php

namespace Accordous\AsaasClient\Services;

use Accordous\AsaasClient\Services\Endpoints\AntecipationEndpoint;
use Accordous\AsaasClient\Services\Endpoints\BillEndpoint;
use Accordous\AsaasClient\Services\Endpoints\CreditBureauReportEndpoint;
use Accordous\AsaasClient\Services\Endpoints\CustomerEndpoint;
use Accordous\AsaasClient\Services\Endpoints\FinancialTransactionsEndpoint;
use Accordous\AsaasClient\Services\Endpoints\InstallmentEndpoint;
use Accordous\AsaasClient\Services\Endpoints\InvoiceEndpoint;
use Accordous\AsaasClient\Services\Endpoints\MyAccountEndpoint;
use Accordous\AsaasClient\Services\Endpoints\PaymentCheckoutConfigEndpoint;
use Accordous\AsaasClient\Services\Endpoints\PaymentDunningEndpoint;
use Accordous\AsaasClient\Services\Endpoints\PaymentEndpoint;
use Accordous\AsaasClient\Services\Endpoints\PaymentLinkEndpoint;
use Accordous\AsaasClient\Services\Endpoints\SubscriptionEndpoint;
use Accordous\AsaasClient\Services\Endpoints\SubscriptionInvoiceSettingEndpoint;
use Accordous\AsaasClient\Services\Endpoints\TransferEndpoint;
use Accordous\AsaasClient\Services\Endpoints\WebhookEndpoint;
use Accordous\AsaasClient\Services\Endpoints\WebhookInvoiceEndpoint;
use Accordous\AsaasClient\Services\Endpoints\BankAccountEndpoint;
use Accordous\AsaasClient\Services\Endpoints\AccountEndpoint;
use Accordous\AsaasClient\Services\Endpoints\DocumentEndpoint;
use Accordous\AsaasClient\Services\Endpoints\FinanceEndpoint;
use Accordous\AsaasClient\Services\Endpoints\PixEndpoint;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Http;
use Accordous\AsaasClient\Services\Endpoints\CreditCardEndpoint;

class AsaasService
{
    /**
     * @var \Illuminate\Http\Client\PendingRequest
     */
    private $http;

    /**
     * @var PixEndpoint
     */
    private $pix;

    /**
     * @var FinanceEndpoint
     */
    private $finance;

    /**
     * @var DocumentEndpoint
     */
    private $document;

    /**
     * @var AccountEndpoint
     */
    private $account;

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
     * @var BankAccountEndpoint
     */
    private $bankAccounts;

    /**
     * @var PaymentDunningEndpoint
     */
    private $paymentdunnings;

    /**
     * @var BillEndpoint
     */
    private $bills;

    /**
     * @var CreditBureauReportEndpoint
     */
    private $creditBureauReports;

    /**
     * @var FinancialTransactionsEndpoint
     */
    private $financialTransactions;

    /**
     * @var MyAccountEndpoint
     */
    private $myAccount;


    /**
     * @var PaymentCheckoutConfigEndpoint
     */
    private $paymentCheckoutConfigs;

    /**
     * @var InvoiceEndpoint
     */
    private $invoices;

    /**
     * @var WebhookEndpoint
     */
    private $webhook;

    /**
     * @var WebhookInvoiceEndpoint
     */
    private $webhookInvoices;

    /**
     * @var CreditCardEndpoint
     */
    private $creditCards;

    /**
     * AssasService constructor.
     * @param string $token
     */
    public function __construct(string $token)
    {
        $this->http = Http::withOptions(['verify' => false]);
        $this->http->baseUrl(Config::get('asaas.host') .  Config::get('asaas.api'));
        $this->http->withHeaders(['access_token' => $token]);

        $this->myAccount = new MyAccountEndpoint($this->http);
        $this->pix = new PixEndpoint($this->http);
        $this->finance = new FinanceEndpoint($this->http);
        $this->document = new DocumentEndpoint($this->http);
        $this->account = new AccountEndpoint($this->http);
        $this->customers =  new CustomerEndpoint($this->http);
        $this->payments =  new PaymentEndpoint($this->http);
        $this->installments =  new InstallmentEndpoint($this->http);
        $this->subscriptions =  new SubscriptionEndpoint($this->http);
        $this->subscriptionInvoiceSettings =  new SubscriptionInvoiceSettingEndpoint($this->http);
        $this->paymentLinks = new PaymentLinkEndpoint($this->http);
        $this->transfers = new TransferEndpoint($this->http);
        $this->antecipations = new AntecipationEndpoint($this->http);
        $this->bankAccounts = new BankAccountEndpoint($this->http);
        $this->paymentdunnings = new PaymentDunningEndpoint($this->http);
        $this->bills = new BillEndpoint($this->http);
        $this->creditBureauReports = new CreditBureauReportEndpoint($this->http);
        $this->financialTransactions = new FinancialTransactionsEndpoint($this->http);
        $this->paymentCheckoutConfigs = new PaymentCheckoutConfigEndpoint($this->http);
        $this->invoices = new InvoiceEndpoint($this->http);
        $this->webhook = new WebhookEndpoint($this->http);
        $this->webhookInvoices = new WebhookInvoiceEndpoint($this->http);
        $this->creditCards = new CreditCardEndpoint($this->http);
    }

    /**
     * @return PixEndpoint
     */
    public function pix(): PixEndpoint
    {
        return $this->pix;
    }

    /**
     * @return FinanceEndpoint
     */
    public function finance(): FinanceEndpoint
    {
        return $this->finance;
    }

    /**
     * @return AccountEndpoint
     */
    public function document(): DocumentEndpoint
    {
        return $this->document;
    }

    /**
     * @return AccountEndpoint
     */
    public function account(): AccountEndpoint
    {
        return $this->account;
    }

    /**
     * @return CustomerEndpoint
     */
    public function customers(): CustomerEndpoint
    {
        return $this->customers;
    }

    /**
     * @return PaymentEndpoint
     */
    public function payments(): PaymentEndpoint
    {
        return $this->payments;
    }

    /**
     * @return InstallmentEndpoint
     */
    public function installments(): InstallmentEndpoint
    {
        return $this->installments;
    }

    /**
     * @return SubscriptionEndpoint
     */
    public function subscriptions(): SubscriptionEndpoint
    {
        return $this->subscriptions;
    }

    /**
     * @return SubscriptionInvoiceSettingEndpoint
     */
    public function subscriptionInvoiceSetting(): SubscriptionInvoiceSettingEndpoint
    {
        return $this->subscriptionInvoiceSettings;
    }

    /**
     * @return PaymentLinkEndpoint
     */
    public function paymentLinks(): PaymentLinkEndpoint
    {
        return $this->paymentLinks;
    }

    /**
     * @return TransferEndpoint
     */
    public function transfers(): TransferEndpoint
    {
        return $this->transfers;
    }

    /**
     * @return AntecipationEndpoint
     */
    public function antecipations(): AntecipationEndpoint
    {
        return $this->antecipations;
    }

    /**
     * @return BankAccountEndpoint
     */
    public function bankAccounts(): BankAccountEndpoint
    {
        return $this->bankAccounts;
    }

    /**
     * @return PaymentDunningEndpoint
     */
    public function paymentdunnings(): PaymentDunningEndpoint
    {
        return $this->paymentdunnings;
    }

    /**
     * @return BillEndpoint
     */
    public function bills(): BillEndpoint
    {
        return $this->bills;
    }

    /**
     * @return CreditBureauReportEndpoint
     */
    public function creditBureauReports(): CreditBureauReportEndpoint
    {
        return $this->creditBureauReports;
    }

    /**
     * @return FinancialTransactionsEndpoint
     */
    public function financialTransactions(): FinancialTransactionsEndpoint
    {
        return $this->financialTransactions;
    }

    /**
     * @return MyAccountEndpoint
     */
    public function myAccount(): MyAccountEndpoint
    {
        return $this->myAccount;
    }


    /**
     * @return PaymentCheckoutConfigEndpoint
     */
    public function paymentCheckoutConfigs(): PaymentCheckoutConfigEndpoint
    {
        return $this->paymentCheckoutConfigs;
    }

    /**
     * @return InvoiceEndpoint
     */
    public function invoices(): InvoiceEndpoint
    {
        return $this->invoices;
    }

    /**
     * @return WebhookEndpoint
     */
    public function webhook(): WebhookEndpoint
    {
        return $this->webhook;
    }

    /**
     * @return WebhookInvoiceEndpoint
     */
    public function webhookInvoices(): WebhookInvoiceEndpoint
    {
        return $this->webhookInvoices;
    }

    /**
     * @return CreditCardEndpoint
     */
    public function creditCards(): CreditCardEndpoint
    {
        return $this->creditCards;
    }
}
