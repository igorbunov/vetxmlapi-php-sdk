<?php

namespace VetScan\Mappers;

use VetScan\Errors\OrderAlreadyCancelledError;
use VetScan\Models\EmptyModel;
use VetScan\Models\IModel;

class CancelOrderMapper implements IMapper
{
    public function toObject(string $xml): IModel
    {
        $xmlObj = simplexml_load_string($xml);

        if ($xmlObj === FALSE) {
            return new EmptyModel(true);
        }

        if (!is_null($xmlObj) and $xmlObj->getName() == 'error') {
            if (strval($xmlObj->message['context']) == "ORDER CANCEL") {
                throw new OrderAlreadyCancelledError(strval($xmlObj->message));
            } else {
                throw new \Exception('unhandled error');
            }
        }

        return new EmptyModel(false);
    }

    public function toXml(IModel $obj): string
    {
        // TODO: Implement toXml() method.
    }
}
