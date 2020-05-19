<?php

namespace VetScan\Models\LabResults;

use VetScan\Models\IModel;

class LabResult implements IModel
{
    private $header;
    private $resultItems;

    public function __construct(
        LabResultHeader $header = null,
        LabResultItems $resultItems = null
    ) {
        $this->header = $header;
        $this->resultItems = $resultItems;
    }

    public function addHeader(LabResultHeader $header)
    {
        $this->header = $header;
    }

    public function addResultItems(LabResultItems $resultItems)
    {
        $this->resultItems = $resultItems;
    }
}