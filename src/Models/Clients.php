<?php

namespace VetScan\Models;

class Clients implements IModel
{
    private $clients;

    public function __construct($clients = [])
    {
        $this->clients = $clients;
    }

    public function addClient(Client $client)
    {
        $this->clients = $client;
    }
}