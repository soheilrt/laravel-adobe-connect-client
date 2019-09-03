<?php

namespace Soheilrt\AdobeConnectClient\Tests\CustomEntities;

use Exception;
use Soheilrt\AdobeConnectClient\Client\Entities\Permission;

class CustomPermission extends Permission
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

    /**
     * @throws
     */
    public function getSkipParseOnGet($value)
    {
        throw new Exception("this method should not class on getting value");
    }
}
