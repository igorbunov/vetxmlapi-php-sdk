<?php

namespace VetScan\Models\LabResults;

use VetScan\Models\IModel;

class LabResultHeader implements IModel
{
    public $testCode;
    public $testName;
    public $testType;
    public $resultDate;
    public $resultStatus;

    public function __construct($testCode, $testName = '', $testType = '', $resultDate = '', $resultStatus = '')
    {
        $this->testCode = $testCode;
        $this->testName = $testName;
        $this->testType = $testType;
        $this->resultDate = $resultDate;
        $this->resultStatus = $resultStatus;
    }
}