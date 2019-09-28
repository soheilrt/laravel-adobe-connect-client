<?php


namespace Soheilrt\AdobeConnectClient\Facades;


use Illuminate\Support\Facades\Facade;

/**
 * @method static \Soheilrt\AdobeConnectClient\Client\Entities\Permission setAclId()
 * @method static \Soheilrt\AdobeConnectClient\Client\Entities\Permission setPermissionId()
 * @method static \Soheilrt\AdobeConnectClient\Client\Entities\Permission setPrincipalId()
 *
 * @mixin \Soheilrt\AdobeConnectClient\Client\Entities\Permission
 */
class Permission extends Facade
{
    protected static function getFacadeAccessor()
    {
        return __CLASS__;
    }
}
