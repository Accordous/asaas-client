<?php

namespace Accordous\AsaasClient\Enums;

class EffectiveDatePeriod extends Enums
{
    public const ON_PAYMENT_CONFIRMATION = 'ON_PAYMENT_CONFIRMATION';
    public const ON_PAYMENT_DUE_DATE = 'ON_PAYMENT_DUE_DATE';
    public const BEFORE_PAYMENT_DUE_DATE = 'BEFORE_PAYMENT_DUE_DATE';
    public const ON_DUE_DATE_MONTH = 'ON_DUE_DATE_MONTH';
    public const ON_NEXT_MONTH = 'ON_NEXT_MONTH';
}
