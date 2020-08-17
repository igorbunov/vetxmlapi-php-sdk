<?php

namespace VetScan\Models;

class BatchOrder implements IModel
{
    public $clientOrderId;

    public function __construct(string $clientOrderId)
    {
        $this->clientOrderId = $clientOrderId;
    }
}
