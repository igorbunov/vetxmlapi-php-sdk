<?php

namespace VetScan\Mappers;

use VetScan\Models\IModel;
use VetScan\Models\Order;

class OrderMapping implements IMapper
{
    public function toObject(string $xml): IModel
    {
        // TODO: Implement toObject() method.
    }

    public function toXml(IModel $obj): string
    {
        // TODO: Implement toXml() method.
        $encoding = '<?xml version="1.0" encoding="UTF-8"?>';
        $starReport = '<LabReport xmlns="http://vetxml.co.uk/schemas/LabReport" xmlns:xs="http://www.w3.org/2001/XMLSchema" version="1.4.0"/>';

        $xml = new \SimpleXMLElement($encoding . $starReport);

        $identification = $xml->addChild('Identification');

        $identification->addChild('ReportType', 'Request');
        $identification->addChild('PracticeID', 'site-1');
        $identification->addChild('PracticeRef', 'requisition-2');
        $identification->addChild('LaboratoryRef', '46');
        $identification->addChild('OwnerName', 'Smith, John');
        $identification->addChild('OwnerID', 'client-1');
        $identification->addChild('VetName', 'Corleone, Michael');
        $identification->addChild('VetID', 'provider-1');

        //TODO: continue
//        pre($xml);

        return $xml->asXML();
    }
}

//<?xml version="1.0" encoding="UTF-8"?>
<!--<LabReport xmlns="http://vetxml.co.uk/schemas/LabReport" xmlns:xs="http://www.w3.org/2001/XMLSchema" version="1.4.0">-->
<!--    <Identification>-->
<!--        <ReportType>Request</ReportType>-->
<!--        <PracticeID>site-1</PracticeID>-->
<!--        <PracticeRef>requisition-2</PracticeRef>-->
<!--        <LaboratoryRef>46</LaboratoryRef>-->
<!--        <OwnerName>Smith, John</OwnerName>-->
<!--        <OwnerID>client-1</OwnerID>-->
<!--        <VetName>Corleone, Michael</VetName>-->
<!--        <VetID>provider-1</VetID>-->
<!--    </Identification>-->
<!--    <AnimalDetails>-->
<!--        <AnimalID>patient-2</AnimalID>-->
<!--        <AnimalName>Dog</AnimalName>-->
<!--        <Species>DOG</Species>-->
<!--        <Breed>patient-breed</Breed>-->
<!--        <Gender>Male</Gender>-->
<!--        <DateOfBirth>0001-12-31</DateOfBirth>-->
<!--    </AnimalDetails>-->
<!--    <LabRequests>-->
<!--        <LabRequest>-->
<!--            <TestCode>CWP</TestCode>-->
<!--            <DeviceID>0000V99311</DeviceID>-->
<!--        </LabRequest>-->
<!--    </LabRequests>-->
<!--</LabReport>-->