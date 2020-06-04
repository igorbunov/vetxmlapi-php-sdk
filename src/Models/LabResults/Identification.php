<?php

namespace VetScan\Models\LabResults;

use VetScan\Models\IModel;

class Identification implements IModel
{
    private $reportType;
    private $practiceID;
    private $clientId;
    private $practiceRef;
    private $laboratoryRef;
    private $ownerName;
    private $ownerID;
    private $vetName;
    private $vetID;
    private $reportNotes;

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