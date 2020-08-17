<?php

namespace VetScan\Models;

class BatchOrders implements IModel
{
    public $batchOrders;

    public function __construct(BatchOrder $batchOrder)
    {
        $this->batchOrders = [$batchOrder];
    }
}
