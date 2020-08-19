<?php

namespace VetScan\Models;

class Test implements IModel
{
    public $code;
    public $name;
    public $replicate;
    public $validFrom;
    public $includes;
    public $currency;
    public $nonDiscountable;

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
}
