<?php

namespace VetScan\Models;

class PendingOrders implements IModel
{
    private $orders;

    public function __construct($orders = [])
    {
        $this->orders = $orders;
    }

    public function addOrder(OrderResult $order)
    {
        $this->orders[] = $order;
    }
}
