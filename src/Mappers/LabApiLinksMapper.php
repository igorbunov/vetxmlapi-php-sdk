<?php

namespace VetScan\Mappers;

use VetScan\Models\IModel;
use VetScan\Models\LabApi;
use VetScan\Models\Link;

class LabApiLinksMapper implements IMapper
{
    public function toObject(string $xml): IModel
    {
        $xmlObj = simplexml_load_string($xml);

        $labapi = new LabApi();

        foreach ($xmlObj as $obj) {
            $labapi->addLink(
                new Link(
                    strval($obj['href']),
                    strval($obj['method']),
                    strval($obj['rel']),
                    strval($obj['type'])
                )
            );
        }

        return $labapi;
    }

    public function toXml(IModel $obj): string
    {
//        pre($obj);
    }
}