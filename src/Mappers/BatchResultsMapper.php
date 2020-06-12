<?php

namespace VetScan\Mappers;

use VetScan\Errors\OderAlreadyInSystemError;
use VetScan\Models\IModel;
use VetScan\Models\LabResults\AnimalDetail;
use VetScan\Models\LabResults\Identification;
use VetScan\Models\LabResults\LabResultHeader;
use VetScan\Models\LabResults\LabResultItem;
use VetScan\Models\LabResults\LabResultItems;
use VetScan\Models\LabResults\LabResult;
use VetScan\Models\LabResults\LabResults;
use VetScan\Models\LabResults\TotalLabResult;

class BatchResultsMapper implements IMapper
{
    public function toObject(string $xml): IModel
    {
        $xml = simplexml_load_string($xml);

        if (!is_null($xml) and $xml->getName() == 'error') {
            throw new OderAlreadyInSystemError(strval($xml->message));
        }

        $xmlObj = $xml->LabReport;

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
        // TODO: Implement toXml() method.
    }
}
