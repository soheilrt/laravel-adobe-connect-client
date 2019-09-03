<?php

namespace Soheilrt\AdobeConnectClient\Client\Helpers;

use DateTime;
use DateTimeImmutable;
use DateTimeInterface;
use Exception;

/**
 * Converts the value into a type.
 */
abstract class ValueTransform
{
    /**
     * Converts arbitrary value into string.
     *
     * @param mixed $value
     *
     * @return string
     */
    public static function toString($value)
    {
        if (is_string($value)) {
            return $value;
        }

        if (is_bool($value)) {
            return $value ? 'true' : 'false';
        }

        if ($value instanceof DateTimeInterface) {
            return $value->format(DateTime::W3C);
        }

        return (string) $value;
    }

    /**
     * Converts arbitrary value into DateTimeImmutable.
     *
     * @param mixed $value
     *
     * @throws Exception
     *
     * @return DateTimeImmutable
     */
    public static function toDateTimeImmutable($value)
    {
        if ($value instanceof DateTimeImmutable) {
            return $value;
        }

        if ($value instanceof DateTime) {
            return DateTimeImmutable::createFromMutable($value);
        }

        return new DateTimeImmutable((string) $value);
    }

    /**
     * Transform the value into a boolean type.
     *
     * @param mixed $value The value to transform
     *
     * @return bool
     */
    public static function toBool($value)
    {
        if (!is_string($value)) {
            return boolval($value);
        }

        $value = mb_strtolower($value);

        if ($value === 'false' or $value === 'off') {
            return false;
        } elseif ($value === 'true' or $value === 'on') {
            return true;
        }

        return boolval($value);
    }
}
