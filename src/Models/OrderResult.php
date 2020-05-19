<?php

namespace VetScan\Models;

class OrderResult implements IModel
{
    private $links;
    private $orderId;
    private $clientOrderId;
    private $status;
    private $timestamp;
    private $clientId;

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