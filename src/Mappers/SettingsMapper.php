<?php

namespace VetScan\Mappers;

use VetScan\Models\IModel;
use VetScan\Models\Setting;

class SettingsMapper implements IMapper
{
    public function toObject(string $xml): IModel
    {
        $xmlObj = simplexml_load_string($xml);

        $embed = filter_var($xmlObj->EmbedPDF, FILTER_VALIDATE_BOOLEAN);
        $attempts = intval($xmlObj->PollAttempts);

        return new Setting($embed, $attempts);
    }

    public function toXml(IModel $obj): string
    {
        $xml = new \SimpleXMLElement("<?xml version='1.0' encoding='UTF-8'?><Settings></Settings>");

        $isEmbed = $obj->getEmbedPDF() ? "true" : "false";

        $xml->addChild('EmbedPDF', $isEmbed);
        $xml->addChild('PollAttempts', $obj->getPollAttempts());

        return $xml->asXML();
    }
}