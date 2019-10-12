<?php


namespace Soheilrt\AdobeConnectClient\Facades;


use Illuminate\Support\Facades\Facade;

/**
 * @method static \Soheilrt\AdobeConnectClient\Client\Entities\Permission setAclId($value)
 * @method static \Soheilrt\AdobeConnectClient\Client\Entities\Permission setPermissionId($value)
 * @method static \Soheilrt\AdobeConnectClient\Client\Entities\Permission setPrincipalId($value)
 *
 */
class Permission extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'adobe-connect.permission';
    }
}
