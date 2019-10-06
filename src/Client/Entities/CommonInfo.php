<?php

namespace Soheilrt\AdobeConnectClient\Client\Entities;

use DateTimeImmutable;
use DateTimeInterface;
use Exception;
use Soheilrt\AdobeConnectClient\Client\Helpers\ValueTransform as VT;
use Soheilrt\AdobeConnectClient\Client\Traits\Fillable;
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
 *
 * @method string|mixed getLocal()
 * @method int|string getTimeZoneId() Time Zone ID list in {
 * @link https://helpx.adobe.com/adobe-connect/webservices/common-xml-elements-attributes.html#time_zone_id}
 * @method string|mixed getCookie()
 * @method string|mixed getHost()
 * @method string|mixed getLocalHost()
 * @method int|string|mixed getAccountId()
 * @method string|mixed getVersion()
 * @method string|mixed getUrl()
 * @method DateTimeImmutable|string|mixed getDate()
 * @method string|mixed getAdminHost()
 *
 * @method string|mixed setLocal($value)
 * @method int|string setTimeZoneId($value) Time Zone ID list in {
 * @link https://helpx.adobe.com/adobe-connect/webservices/common-xml-elements-attributes.html#time_zone_id}
 * @method string|mixed setCookie($value)
 * @method string|mixed setHost($value)
 * @method string|mixed setLocalHost($value)
 * @method int|string|mixed setAccountId($value)
 * @method string|mixed setVersion($value)
 * @method string|mixed setUrl($value)
 * @method string|mixed setAdminHost($value)
 */
class CommonInfo
{
    use PropertyCaller,Fillable;

    /**
     * Set the Date.
     *
     * @param DateTimeInterface|string $date
     *
     * @throws Exception
     *
     * @return CommonInfo
     */
    public function setDate($date): CommonInfo
    {
        $this->attributes['date'] = VT::toDateTimeImmutable($date);

        return $this;
    }
}
