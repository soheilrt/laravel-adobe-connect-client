<?php


namespace Soheilrt\AdobeConnectClient\Facades;


use Illuminate\Support\Facades\Facade;

/**
 * @method static \Soheilrt\AdobeConnectClient\Client\Entities\Permission setAclId()
 * @method static \Soheilrt\AdobeConnectClient\Client\Entities\Permission setPermissionId()
 * @method static \Soheilrt\AdobeConnectClient\Client\Entities\Permission setPrincipalId()
 *
 */
class Permission extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'adobe-connect.permission';
    }
}
