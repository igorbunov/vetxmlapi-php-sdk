<?php

namespace VetScan\Mappers;

use VetScan\Models\IModel;
use VetScan\Models\Specie;
use VetScan\Models\Species;

class SpeciesMapper implements IMapper
{
    public function toObject(string $xml): IModel
    {
        $obj = simplexml_load_string($xml);
        $species = new Species();

        foreach ($obj->specie as $specie) {
            $species->add(new Specie(strval($specie)));
        }

        return $species;
    }

    public function toXml(IModel $obj): string
    {
        // TODO: Implement toXml() method.
    }
}