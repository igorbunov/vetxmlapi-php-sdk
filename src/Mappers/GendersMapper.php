<?php

namespace VetScan\Mappers;

use VetScan\Models\Gender;
use VetScan\Models\Genders;
use VetScan\Models\IModel;

class GendersMapper implements IMapper
{
    public function toObject(string $xml): IModel
    {
        $obj = simplexml_load_string($xml);
        $genders = new Genders();

        foreach ($obj->gender as $gender) {
            $genders->add(new Gender(strval($gender)));
        }

        return $genders;
    }

    public function toXml(IModel $obj): string
    {
        // TODO: Implement toXml() method.
    }
}