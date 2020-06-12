<?php

namespace VetScan\Models;

class OrderResult implements IModel
{
    public $links;
    public $orderId;
    public $clientOrderId;
    public $status;
    public $timestamp;
    public $clientId;

    public function __construct(
        string $orderId,
        string $clientOrderId,
        string $status,
        string $timestamp,
        string $clientId,
        array $links = []
    ) {
        $this->orderId = $orderId;
        $this->clientOrderId = $clientOrderId;
        $this->status = $status;
        $this->timestamp = $timestamp;
        $this->clientId = $clientId;
        $this->links = $links;
    }

    public function addLink(Link $link)
    {
        $this->links[] = $link;
    }
}