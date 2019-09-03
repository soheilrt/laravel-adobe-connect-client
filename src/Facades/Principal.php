<?php


namespace Soheilrt\AdobeConnectClient\Facades;


use Illuminate\Support\Facades\Facade;

/**
 * @method  static \Soheilrt\AdobeConnectClient\Client\Entities\Principal setDisplayId($value)
 * @method  static \Soheilrt\AdobeConnectClient\Client\Entities\Principal setPrincipalId($value)
 * @method  static \Soheilrt\AdobeConnectClient\Client\Entities\Principal setTrainingGroupId($value)
 * @method  static \Soheilrt\AdobeConnectClient\Client\Entities\Principal setAccountId($value)
 * @method  static \Soheilrt\AdobeConnectClient\Client\Entities\Principal setLogin($value)
 * @method  static \Soheilrt\AdobeConnectClient\Client\Entities\Principal setPermissionId($value) @see
 *          Permission::PRINCIPAL_* constants
 * @method  static \Soheilrt\AdobeConnectClient\Client\Entities\Principal setDescription($value)  The new group’s
 *          description. Use only when creating a new group.
 * @method  static \Soheilrt\AdobeConnectClient\Client\Entities\Principal setEmail($value) Only for user
 * @method  static \Soheilrt\AdobeConnectClient\Client\Entities\Principal setPassword($value) Only on create a user
 * @method  static \Soheilrt\AdobeConnectClient\Client\Entities\Principal setIsEcommerece($value)
 * @method  static \Soheilrt\AdobeConnectClient\Client\Entities\Principal setName($value)
 * @method  static \Soheilrt\AdobeConnectClient\Client\Entities\Principal setIsPrimary($value)
 * @method  static \Soheilrt\AdobeConnectClient\Client\Entities\Principal setType($value)
 * @method  static \Soheilrt\AdobeConnectClient\Client\Entities\Principal setHasChildren($value)
 * @method  static \Soheilrt\AdobeConnectClient\Client\Entities\Principal setIsEcommerce($value)
 * @method  static \Soheilrt\AdobeConnectClient\Client\Entities\Principal setIsHidden($value)
 * @method  static \Soheilrt\AdobeConnectClient\Client\Entities\Principal setDisabled($value)
 * @method  static \Soheilrt\AdobeConnectClient\Client\Entities\Principal setFirstName($value)
 * @method  static \Soheilrt\AdobeConnectClient\Client\Entities\Principal setLastName($value)
 * @method  static \Soheilrt\AdobeConnectClient\Client\Entities\Principal setSendEmail($value)
 * @method  static \Soheilrt\AdobeConnectClient\Client\Entities\Principal setIsMember($value)
 *
 * @mixin \Soheilrt\AdobeConnectClient\Client\Entities\Principal
 */
class Principal extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'Principal';
    }
}
