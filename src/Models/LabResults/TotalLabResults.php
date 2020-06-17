<?php

namespace VetScan\Models\LabResults;

use VetScan\Models\IModel;

class TotalLabResults implements IModel
{
    public $totalLabResults = [];

    public function __construct(array $results)
    {
        $this->totalLabResults = $results;
    }

    public function addTotalResult(TotalLabResult $totalLabResult)
    {
        $this->totalLabResults[] = $totalLabResult;
    }
}