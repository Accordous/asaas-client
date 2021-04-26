<?php

namespace Accordous\AsaasClient\Enums;

class PaymentStatus extends Enums
{
    public const PENDING = 'PENDING';
    public const RECEIVED = 'RECEIVED';
    public const CONFIRMED = 'CONFIRMED';
    public const OVERDUE = 'OVERDUE';
    public const REFUNDED = 'REFUNDED';
    public const RECEIVED_IN_CASH = 'RECEIVED_IN_CASH';
    public const REFUND_REQUESTED = 'REFUND_REQUESTED';
    public const CHARGEBACK_REQUESTED = 'CHARGEBACK_REQUESTED';
    public const CHARGEBACK_DISPUTE = 'CHARGEBACK_DISPUTE';
    public const AWAITING_CHARGEBACK_REVERSAL = 'AWAITING_CHARGEBACK_REVERSAL';
    public const DUNNING_REQUESTED = 'DUNNING_REQUESTED';
    public const DUNNING_RECEIVED = 'DUNNING_RECEIVED';
    public const AWAITING_RISK_ANALYSIS = 'AWAITING_RISK_ANALYSIS';
}
