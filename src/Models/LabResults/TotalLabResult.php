<?php

namespace VetScan\Models\LabResults;

use VetScan\Models\IModel;

class TotalLabResult implements IModel
{
    public $identification;
    public $animalDetails;
    public $labResults;

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