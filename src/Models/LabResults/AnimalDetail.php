<?php

namespace VetScan\Models\LabResults;

use VetScan\Models\IModel;

class AnimalDetail implements IModel
{
    public $animalID;
    public $internalAnimalID;
    public $animalName;
    public $gender;
    public $species;
    public $breed;
    public $dateOfBirth;

    public function __construct($animalID, $internalAnimalID, $animalName, $gender, $species, $breed, $dateOfBirth)
    {
        $this->animalID = $animalID;
        $this->internalAnimalID = $internalAnimalID;
        $this->animalName = $animalName;
        $this->gender = $gender;
        $this->species = $species;
        $this->breed = $breed;
        $this->dateOfBirth = $dateOfBirth;
    }
}