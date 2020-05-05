<?php

namespace VetScan\Mappers;

use VetScan\Models\Device;
use VetScan\Models\IModel;
use VetScan\Models\Test;
use VetScan\Models\Tests;

class DeviceMapper implements IMapper
{
    public function toObject(string $xml): IModel
    {
        $obj = simplexml_load_string($xml);
        $tests = new Tests();

        foreach ($obj->Tests->Test as $test) {
            $tests->add(new Test(strval($test->Test)));
        }

        $result = new Device(
            strval($obj->Id),
            strval($obj->Type),
            strval($obj->DisplayName),
            strval($obj->SoftwareRevision),
            strval($obj->SerialNumber),
            strval($obj->Group),
            strval($obj->CurrentStatus),
            strval($obj->DirectoryOfServiceSections->DirectoryOfServiceSection),
            $tests
        );

        return $result;
    }

    public function toXml(IModel $obj): string
    {
        // TODO: Implement toXml() method.
    }

}