<?php


namespace Soheilrt\AdobeConnectClient\Facades;


use Illuminate\Support\Facades\Facade;

/**
 * @method static \Soheilrt\AdobeConnectClient\Client\Entities\CommonInfo setLocal($local)
 * @method static \Soheilrt\AdobeConnectClient\Client\Entities\CommonInfo setTimeZoneId($id)
 * @method static \Soheilrt\AdobeConnectClient\Client\Entities\CommonInfo setCookie($cookie)
 * @method static \Soheilrt\AdobeConnectClient\Client\Entities\CommonInfo setHost($host)
 * @method static \Soheilrt\AdobeConnectClient\Client\Entities\CommonInfo setLocalHost($host)
 * @method static \Soheilrt\AdobeConnectClient\Client\Entities\CommonInfo setAccountId($id)
 * @method static \Soheilrt\AdobeConnectClient\Client\Entities\CommonInfo setVersion($version)
 * @method static \Soheilrt\AdobeConnectClient\Client\Entities\CommonInfo setUrl($url)
 * @method static \Soheilrt\AdobeConnectClient\Client\Entities\CommonInfo setDate($date)
 * @method static \Soheilrt\AdobeConnectClient\Client\Entities\CommonInfo setAdminHost($host)
 */
class CommonInfo extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'CommonInfo';
    }
}
