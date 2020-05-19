<?php

namespace VetScan\Models\LabResults;

use VetScan\Models\IModel;

class TotalLabResult implements IModel
{
    private $identification;
    private $animalDetails;
    private $labResults;

    public function __construct(
        Identification $identification,
        AnimalDetail $animalDetails,
        LabResults $labResults
    ) {
        $this->identification = $identification;
        $this->animalDetails = $animalDetails;
        $this->labResults = $labResults;
    }
}