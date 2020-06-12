<?php

namespace VetScan\Mappers;

use VetScan\Models\Client;
use VetScan\Models\Clients;
use VetScan\Models\IModel;

class ClientsMapper implements IMapper
{
    public function toObject(string $xml): IModel
    {
        $xmlObj = simplexml_load_string($xml);

        $clients = new Clients();

        foreach ($xmlObj as $client) {
            $client = new Client(
                strval($client->PartnerID),
                strval($client->ClientID),
                strval($client->Description)
            );

            $clients->addClient($client);
        }

        return $clients;
    }

    public function toXml(IModel $obj): string
    {
        // TODO: Implement toXml() method.
    }
}