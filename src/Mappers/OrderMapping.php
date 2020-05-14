<?php

namespace VetScan\Mappers;

use VetScan\Errors\OderAlreadyInSystemError;
use VetScan\Models\IModel;
use VetScan\Models\Order;

class OrderMapping implements IMapper
{
    public function toObject(string $xml): IModel
    {
        $obj = simplexml_load_string($xml);

        if (!is_null($obj) and $obj->getName() == 'error') {
            throw new OderAlreadyInSystemError(strval($obj->message));
        }

        pre($obj);
    }

    public function toXml(IModel $obj): string
    {
        // TODO: Implement toXml() method.
        $encoding = '<?xml version="1.0" encoding="UTF-8"?>';
//        $starReport = '<LabReport xmlns="http://vetxml.co.uk/schemas/LabReport" xmlns:xs="http://www.w3.org/2001/XMLSchema" version="1.4.0"/>';
        $starReport = '<LabReport/>';

        $xml = new \SimpleXMLElement($encoding . $starReport);

        $identification = $xml->addChild('Identification');

        $identification->addChild('ReportType', 'Request');
        $identification->addChild('PracticeID', 'Practice1');
        $identification->addChild('ClientId', 'rhapsodyclient'); // from config
        $identification->addChild('PracticeRef', 'rhapsody-1');
        $identification->addChild('LaboratoryRef', '46');
        $identification->addChild('OwnerName', 'FUSE, Ezyvet');
        $identification->addChild('OwnerID', '4');
        $identification->addChild('VetName', 'Corleone, Michael');
        $identification->addChild('VetID', 'provider-1');

        $animalDetails = $xml->addChild('AnimalDetails');

        $animalDetails->addChild('AnimalID', '100004');
        $animalDetails->addChild('AnimalName', 'Rover');
        $animalDetails->addChild('Species', 'DOG');
        $animalDetails->addChild('Breed', 'Labrador');
        $animalDetails->addChild('Gender', 'Male');
        $animalDetails->addChild('DateOfBirth', '2013-08-03');

        $labRequests = $xml->addChild('LabRequests');
            $labRequest = $labRequests->addChild('LabRequest');
                $labRequest->addChild('TestCode', 'HEM');

            $labRequest = $labRequests->addChild('LabRequest');
                $labRequest->addChild('TestCode', 'T4');


        //TODO: continue
        pre($xml->asXML());

        return $xml->asXML();

        /*
        $aa = '<?xml version="1.0" encoding="UTF-8"?>
            <LabReport>
                <Identification>
                    <ReportType>Request</ReportType>
                    <PracticeID>Practice1</PracticeID>
                    <ClientId>{{clientId}}</ClientId>
                    <PracticeRef>{{practiceRef}}</PracticeRef>
                    <LaboratoryRef>46</LaboratoryRef>
                    <OwnerName>FUSE, Ezyvet</OwnerName>
                    <OwnerID>4</OwnerID>
                    <VetName>Corleone, Michael</VetName>
                    <VetID>provider-1</VetID>
                </Identification>
                <AnimalDetails>
                    <AnimalID>100004</AnimalID>
                    <AnimalName>Rover</AnimalName>
                    <Species>DOG</Species>
                    <Breed>Labrador</Breed>
                    <Gender>Male</Gender>
                    <DateOfBirth>2013-08-03</DateOfBirth>
                </AnimalDetails>
                <LabRequests>
                    <LabRequest>
                        <TestCode>{{testCode}}</TestCode>
                    </LabRequest>
                    <LabRequest>
                        <TestCode>{{testCode2}}</TestCode>
                    </LabRequest>
                </LabRequests>
            </LabReport>';

        */
    }
}
