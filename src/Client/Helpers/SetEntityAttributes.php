<?php

namespace Soheilrt\AdobeConnectClient\Client\Helpers;

/**
 * Set object attributes.
 */
abstract class SetEntityAttributes
{
    /**
     * Iterate attributes and call the set method from object.
     *
     * @param mixed $object
     * @param mixed $attributes
     */
    public static function setAttributes(&$object, $attributes)
    {
        foreach ($attributes as $attr => $value) {
            if (is_array($value)) {
                static::setAttributes($object, $value);
                continue;
            }

            $object->$attr = $value;
        }
    }
}
