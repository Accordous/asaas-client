<?php

namespace Accordous\AsaasClient\ValueObject;

class Taxes extends ValueObject
{
    private $retainIss;
    private $iss;
    private $cofins;
    private $csll;
    private $inss;
    private $ir;
    private $pis;

    public function __construct(bool $retainIss, float $iss, float $cofins, float $csll, float $inss, float $ir, float $pis)
    {
        $this->retainIss = $retainIss;
        $this->iss = $iss;
        $this->cofins = $cofins;
        $this->csll = $csll;
        $this->inss = $inss;
        $this->ir = $ir;
        $this->pis = $pis;
    }


}
