<?php

namespace VetScan\Mappers;

use VetScan\Errors\OderAlreadyInSystemError;
use VetScan\Models\IModel;
use VetScan\Models\Link;
use VetScan\Models\OrderResult;
use VetScan\Models\PendingOrders;

class OrderMapping implements IMapper
{
    public function toObject(string $xml): IModel
    {
        $order = simplexml_load_string($xml);

        if (!is_null($order) and $order->getName() == 'error') {
            throw new OderAlreadyInSystemError(strval($order->message));
        }

        $orderObj = new OrderResult(
            strval($order['id']),
            strval($order['client_order_id']),
            strval($order->status),
            strval($order->timestamp),
            strval($order->clientId)
        );

        foreach ($order->link as $lnk) {
            $orderObj->addLink(new Link(
                strval($lnk['href']),
                strval($lnk['method']),
                strval($lnk['rel']),
                strval($lnk['type'])
            ));
        }

        return $orderObj;
    }

    public function toXml(IModel $obj): string
    {
        // TODO: Implement toXml() method.
        $encoding = '<?xml version="1.0" encoding="UTF-8"?>';
        $starReport = '<LabReport/>';

        $xml = new \SimpleXMLElement($encoding . $starReport);

        $identification = $xml->addChild('Identification');

        $identification->addChild('ReportType', $obj->identification->reportType);
        $identification->addChild('PracticeID', $obj->identification->practiceID);
        $identification->addChild('ClientId', $obj->identification->clientId); // from config
        $identification->addChild('PracticeRef', $obj->identification->practiceRef);
        $identification->addChild('LaboratoryRef', $obj->identification->laboratoryRef);
        $identification->addChild('OwnerName', $obj->identification->ownerName);
        $identification->addChild('OwnerID', $obj->identification->ownerID);
        $identification->addChild('VetName', $obj->identification->vetName);
        $identification->addChild('VetID', $obj->identification->vetID);
        $identification->addChild('reportNotes', $obj->identification->reportNotes);

        $animalDetails = $xml->addChild('AnimalDetails');

        $animalDetails->addChild('AnimalID', $obj->animalDetails->animalID);
        $animalDetails->addChild('InternalAnimalID', $obj->animalDetails->internalAnimalID);
        $animalDetails->addChild('AnimalName', $obj->animalDetails->animalName);
        $animalDetails->addChild('Gender', $obj->animalDetails->gender);
        $animalDetails->addChild('Species', $obj->animalDetails->species);
        $animalDetails->addChild('Breed', $obj->animalDetails->breed);
        $animalDetails->addChild('DateOfBirth', $obj->animalDetails->dateOfBirth);

        $labRequests = $xml->addChild('LabRequests');

        foreach ($obj->labResults->results as $row) {
            $labRequest = $labRequests->addChild('LabRequest');
            $labRequest->addChild('TestCode', $row->header->testCode);
        }

        //TODO: continue
//        pre($xml->asXML());

        return $xml->asXML();
    }
}
