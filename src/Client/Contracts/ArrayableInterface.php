<?php

namespace Soheilrt\AdobeConnectClient\Client\Contracts;

/**
 * Grant the items in an array to use in Request.
 */
interface ArrayableInterface
{
    /**
     * Converts the attributes in an associative array.
     *
     * The keys need be in hash style: Ex: is-member
     * The values need be a string
     *
     * @return string[]
     */
    public function toArray(): array;
}
