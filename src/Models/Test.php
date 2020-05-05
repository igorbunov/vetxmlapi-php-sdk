<?php

namespace VetScan\Models;

class Test implements IModel
{
    private $code;
    private $name;
    private $replicate;
    private $validFrom;
    private $includes;
    private $currency;
    private $nonDiscountable;

    public function __construct(
        $code,
        $name = '',
        $replicate = 0,
        $validFrom = '',
        $includes = '',
        $currency = 'None',
        $nonDiscountable = false
    ) {
        $this->code = $code;
        $this->name = $name;
        $this->replicate = $replicate;
        $this->validFrom = $validFrom;
        $this->includes = $includes;
        $this->currency = $currency;
        $this->nonDiscountable = $nonDiscountable;
    }

//        '<Test>
//            <Name>Mammalian Liver Profile</Name>
//            <Code>MLP</Code>
//            <Replicate>0</Replicate>
//            <ValidFrom>2016-06-30</ValidFrom>
//            <Includes>ALB, ALP, ALT, BA, BUN, CHOL, GGT, TBIL</Includes>
//            <Currency>None</Currency>
//            <NonDiscountable>false</NonDiscountable>
//        </Test>';
}
