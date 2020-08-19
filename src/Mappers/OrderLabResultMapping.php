<?php

namespace VetScan\Mappers;

use VetScan\Errors\OrderAlreadyInSystemError;
use VetScan\Models\IModel;
use VetScan\Models\LabResults\AnimalDetail;
use VetScan\Models\LabResults\Identification;
use VetScan\Models\LabResults\LabResultHeader;
use VetScan\Models\LabResults\LabResultItem;
use VetScan\Models\LabResults\LabResultItems;
use VetScan\Models\LabResults\LabResult;
use VetScan\Models\LabResults\LabResults;
use VetScan\Models\LabResults\TotalLabResult;

class OrderLabResultMapping implements IMapper
{
    public function toObject(string $xml): IModel
    {
        $xmlObj = simplexml_load_string($xml);

        if (!is_null($xmlObj) and $xmlObj->getName() == 'error') {
            throw new OrderAlreadyInSystemError(strval($xmlObj->message));
        }

        $identification = new Identification(
            strval($xmlObj->Identification->ReportType),
            strval($xmlObj->Identification->PracticeID),
            strval($xmlObj->Identification->ClientId),
            strval($xmlObj->Identification->PracticeRef),
            strval($xmlObj->Identification->LaboratoryRef),
            strval($xmlObj->Identification->OwnerName),
            strval($xmlObj->Identification->OwnerID),
            strval($xmlObj->Identification->VetName),
            strval($xmlObj->Identification->VetID),
            strval($xmlObj->Identification->ReportNotes)
        );

        $animalDetail = new AnimalDetail(
            strval($xmlObj->AnimalDetails->AnimalID),
            strval($xmlObj->AnimalDetails->InternalAnimalID),
            strval($xmlObj->AnimalDetails->AnimalName),
            strval($xmlObj->AnimalDetails->Gender),
            strval($xmlObj->AnimalDetails->Species),
            strval($xmlObj->AnimalDetails->Breed),
            strval($xmlObj->AnimalDetails->DateOfBirth)
        );


        $labResults = new LabResults();

        foreach ($xmlObj->LabResults->LabResult as $labResult) {
            $labRes = new LabResult();

            $labRes->addHeader(new LabResultHeader(
                strval($labResult->LabResultHeader->TestCode),
                strval($labResult->LabResultHeader->TestName),
                strval($labResult->LabResultHeader->TestType),
                strval($labResult->LabResultHeader->ResultDate),
                strval($labResult->LabResultHeader->ResultStatus)
            ));

            $resultItems = new LabResultItems();

            foreach ($labResult->LabResultItems->LabResultItem as $resultItem) {
                $resultItems->addItem(new LabResultItem(
                    strval($resultItem->AnalyteCode),
                    strval($resultItem->AnalyteName),
                    strval($resultItem->Result),
                    strval($resultItem->ResultText)
                ));
            }

            $labRes->addResultItems($resultItems);

            $labResults->addResult($labRes);
        }

        return new TotalLabResult(
            $identification,
            $animalDetail,
            $labResults
        );
    }

    public function toXml(IModel $obj): string
    {
        $encoding = '<?xml version="1.0" encoding="UTF-8"?>';
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

        return $xml->asXML();
    }
}
