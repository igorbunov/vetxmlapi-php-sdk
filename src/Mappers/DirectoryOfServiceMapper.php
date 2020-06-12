<?php

namespace VetScan\Mappers;

use VetScan\Models\DirectoryOfService;
use VetScan\Models\IModel;
use VetScan\Models\Section;
use VetScan\Models\Test;

class DirectoryOfServiceMapper implements IMapper
{
    public function toObject(string $xml): IModel
    {
        $obj = simplexml_load_string($xml);
        $result = new DirectoryOfService();

        foreach ($obj->Section as $section) {
            $sectionName = strval($section['Name']);
            $sect = new Section($sectionName);

            foreach ($section->Test as $test) {
                $sect->addTest(new Test(
                    strval($test->Code),
                    strval($test->Name),
                    strval($test->Replicate),
                    strval($test->ValidFrom),
                    strval($test->Includes),
                    strval($test->Currency),
                    strval($test->NonDiscountable)
                ));
            }

            $result->addSection($sect);
        }

        return $result;
    }

    public function toXml(IModel $obj): string
    {
        // TODO: Implement toXml() method.
    }
}