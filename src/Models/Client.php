<?php

namespace VetScan\Models;

class Client implements IModel
{
    public $partnerID;
    public $clientID;
    public $description;

    public function __construct(string $partnerID, string $clientID, string $description)
    {
        $this->partnerID = $partnerID;
        $this->clientID = $clientID;
        $this->description = $description;
    }

    public function getPartnerID(): string
    {
        return $this->partnerID;
    }

    public function getClientID(): string
    {
        return $this->clientID;
    }

    public function getDescription(): string
    {
        return $this->description;
    }
}