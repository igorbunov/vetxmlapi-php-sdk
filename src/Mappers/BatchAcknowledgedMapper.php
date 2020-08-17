<?php

namespace VetScan\Mappers;

use VetScan\Errors\OrderNotFoundError;
use VetScan\Models\BatchOrder;
use VetScan\Models\IModel;

class BatchAcknowledgedMapper implements IMapper
{
    public function toObject(string $xml): IModel
    {
        $xml = simplexml_load_string($xml);

        if (empty($xml)) {
            return new BatchOrder('acknowledge completed');
        }

        if (!is_null($xml) and $xml->getName() == 'error') {
            throw new OrderNotFoundError(strval($xml->message));
        }
    }

    public function toXml(IModel $obj): string
    {
        $encoding = '<?xml version="1.0" encoding="UTF-8"?>';
        $starReport = '<orders/>';

        $xml = new \SimpleXMLElement($encoding . $starReport);

        $order = $xml->addChild('order');
        $order->addAttribute('client_order_id', $obj->batchOrders[0]->clientOrderId);

        return $xml->asXML();
    }
}
