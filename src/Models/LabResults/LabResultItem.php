<?php

namespace VetScan\Models\LabResults;

use VetScan\Models\IModel;

class LabResultItem implements IModel
{
    public $analyteCode;
    public $analyteName;
    public $result;
    public $resultText;

    public function __construct($analyteCode, $analyteName, $result, $resultText)
    {
        $this->analyteCode = $analyteCode;
        $this->analyteName = $analyteName;
        $this->result = $result;
        $this->resultText = $resultText;
    }

}