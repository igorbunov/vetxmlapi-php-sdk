<?php

namespace VetScan\Mappers;

use VetScan\Models\IModel;

class MultipleOrdersMapping implements IMapper
{
    public function toObject(string $xml): IModel
    {
        return (new OrdersMapping())->toObject($xml);
    }

    public function toXml(IModel $obj): string
    {
        $encoding = '<?xml version="1.0" encoding="UTF-8"?>';

        $starReports = '<LabReports/>';
        $xml = new \SimpleXMLElement($encoding . $starReports);

        foreach ($obj->totalLabResults as $labObj) {
            $labReport = $xml->addChild('LabReport');
            $identification = $labReport->addChild('Identification');

            $identification->addChild('ReportType', $labObj->identification->reportType);
            $identification->addChild('PracticeID', $labObj->identification->practiceID);
            $identification->addChild('ClientId', $labObj->identification->clientId); // from config
            $identification->addChild('PracticeRef', $labObj->identification->practiceRef);
            $identification->addChild('LaboratoryRef', $labObj->identification->laboratoryRef);
            $identification->addChild('OwnerName', $labObj->identification->ownerName);
            $identification->addChild('OwnerID', $labObj->identification->ownerID);
            $identification->addChild('VetName', $labObj->identification->vetName);
            $identification->addChild('VetID', $labObj->identification->vetID);
            $identification->addChild('reportNotes', $labObj->identification->reportNotes);

            $animalDetails = $labReport->addChild('AnimalDetails');

            $animalDetails->addChild('AnimalID', $labObj->animalDetails->animalID);
            $animalDetails->addChild('InternalAnimalID', $labObj->animalDetails->internalAnimalID);
            $animalDetails->addChild('AnimalName', $labObj->animalDetails->animalName);
            $animalDetails->addChild('Gender', $labObj->animalDetails->gender);
            $animalDetails->addChild('Species', $labObj->animalDetails->species);
            $animalDetails->addChild('Breed', $labObj->animalDetails->breed);
            $animalDetails->addChild('DateOfBirth', $labObj->animalDetails->dateOfBirth);

            $labRequests = $labReport->addChild('LabRequests');

            foreach ($labObj->labResults->results as $row) {
                $labRequest = $labRequests->addChild('LabRequest');
                $labRequest->addChild('TestCode', $row->header->testCode);
            }
        }

        return $xml->asXML();
    }
}
