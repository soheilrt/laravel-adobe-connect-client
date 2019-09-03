<?php

namespace Soheilrt\AdobeConnectClient\Tests\CustomEntities;

use Soheilrt\AdobeConnectClient\Client\Entities\SCORecord;

class CustomSCORecord extends SCORecord
{
    public function setCustomAttribute($value)
    {
        $this->attributes['customAttribute'] = $value;

        return $this;
    }


    public function setTestParseValue($value)
    {
        $this->attributes["testParseValue"] = (int) $value;

        return $this;
    }

    public function getParseOnGet()
    {
        return (string) $this->attributes["parseOnGet"];
    }
}
