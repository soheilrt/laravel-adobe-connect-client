<?php

namespace Soheilrt\AdobeConnectClient\Client\Traits;

use Soheilrt\AdobeConnectClient\Client\Helpers\StringCaseTransform as SCT;
use Soheilrt\AdobeConnectClient\Client\Helpers\ValueTransform as VT;

/**
 * Override the methods to turn into a valid ArrayableInterface.
 */
trait Arrayable
{
    /**
     * Retrieves all not null attributes in an associative array.
     *
     * The keys in hash style: Ex: is-member
     * The values as string
     *
     * @param bool $trimNull remove null values from array
     *
     * @return string[][]
     */
    public function toArray($trimNull = true)
    {
        if (isset($this->attributes) && is_array($this->attributes)) {
            return $this->toArrayHyphen($this->attributes, $trimNull);
        }

        return $this->toArrayHyphen($this, $trimNull);
    }

    private function toArrayHyphen($array, $trimNull)
    {
        $hyphen_array = [];
        foreach ($array as $key => $value) {
            if ($trimNull && !isset($value)) {
                continue;
            } elseif (is_array($value)) {
                $hyphen_array[SCT::toHyphen($key)] = $this->toArrayHyphen($value, $trimNull);
            } else {
                $hyphen_array[SCT::toHyphen($key)] = VT::toString($value);
            }
        }

        return $hyphen_array;
    }
}
