<?php

namespace VetScan\Models\LabResults;

use VetScan\Models\IModel;

class Identification implements IModel
{
    public $reportType;
    public $practiceID;
    public $clientId;
    public $practiceRef;
    public $laboratoryRef;
    public $ownerName;
    public $ownerID;
    public $vetName;
    public $vetID;
    public $reportNotes;

    public function __construct(
        $reportType,
        $practiceID,
        $clientId,
        $practiceRef,
        $laboratoryRef,
        $ownerName,
        $ownerID,
        $vetName,
        $vetID,
        $reportNotes = ''
    ) {
        $this->reportType = $reportType;
        $this->practiceID = $practiceID;
        $this->clientId = $clientId;
        $this->practiceRef = $practiceRef;
        $this->laboratoryRef = $laboratoryRef;
        $this->ownerName = $ownerName;
        $this->ownerID = $ownerID;
        $this->vetName = $vetName;
        $this->vetID = $vetID;
        $this->reportNotes = $reportNotes;
    }
}