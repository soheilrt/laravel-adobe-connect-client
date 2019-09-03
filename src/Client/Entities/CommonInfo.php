<?php

namespace Soheilrt\AdobeConnectClient\Client\Entities;

use DateTimeImmutable;
use DateTimeInterface;
use Exception;
use Soheilrt\AdobeConnectClient\Client\Helpers\ValueTransform as VT;
use Soheilrt\AdobeConnectClient\Client\Traits\PropertyCaller;

/**
 * Result for Common Info Action.
 *
 * @property string|mixed                   $local
 * @property int|string                     $timeZoneId Time Zone ID list in {@link https://helpx.adobe.com/adobe-connect/webservices/common-xml-elements-attributes.html#time_zone_id}
 * @property string|mixed                   $cookie
 * @property string|mixed                   $host
 * @property string|mixed                   $localHost
 * @property int|string|mixed               $accountId
 * @property string|mixed                   $version
 * @property string|mixed                   $url
 * @property DateTimeImmutable|string|mixed $date
 * @property string|mixed                   $adminHost
 */
class CommonInfo
{
    use PropertyCaller;

    /**
     * Set the Date.
     *
     * @param DateTimeInterface|string $date
     *
     * @throws Exception
     *
     * @return CommonInfo
     */
    public function setDate($date)
    {
        $this->attributes['date'] = VT::toDateTimeImmutable($date);

        return $this;
    }
}
