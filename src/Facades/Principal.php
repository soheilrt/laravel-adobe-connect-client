<?php


namespace Soheilrt\AdobeConnectClient\Facades;


use Illuminate\Support\Facades\Facade;
use \Soheilrt\AdobeConnectClient\Client\Entities;

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
 */
class Principal extends Facade
{
    /**
     * The built-in group Administrators, for Adobe Connect server Administrators.
     *
     * @var string
     */
    public const TYPE_ADMINS = Entities\Principal::TYPE_ADMINS;

    /**
     * The built-in group Administrators, for Adobe Connect server Administrators.
     *
     * @var string
     */
    public const TYPE_ADMINS_LIMITED = Entities\Principal::TYPE_ADMINS_LIMITED;

    /**
     * The built-in group Authors, for authors.
     *
     * @var string
     */
    public const TYPE_AUTHORS = Entities\Principal::TYPE_AUTHORS;

    /**
     * The built-in group Training Managers, for training managers.
     *
     * @var string
     */
    public const TYPE_COURSE_ADMINS = Entities\Principal::TYPE_COURSE_ADMINS;

    /**
     * The built-in group Event Managers, for anyone who can create an Adobe Connect meeting.
     *
     * @var string
     */
    public const TYPE_EVENT_ADMINS = Entities\Principal::TYPE_EVENT_ADMINS;

    /**
     * The Event Supper Admins
     *
     * @var string
     */
    public const TYPE_EVENT_SUPER_ADMINS = Entities\Principal::TYPE_EVENT_SUPER_ADMINS;

    /**
     * Virtual Classroom admins
     *
     * @var string
     */
    public const TYPE_NAMED_VIRTUAL_CLASSROM_ADMINS = Entities\Principal::TYPE_NAMED_VIRTUAL_CLASSROM_ADMINS;

    /**
     * The group of users invited to an event.
     *
     * @var string
     */
    public const TYPE_EVENT_GROUP = Entities\Principal::TYPE_EVENT_GROUP;

    /**
     * All Adobe Connect users.
     *
     * @var string
     */
    public const TYPE_EVERYONE = Entities\Principal::TYPE_EVERYONE;

    /**
     * A group authenticated from an external network.
     *
     * @var string
     */
    public const TYPE_EXTERNAL_GROUP = Entities\Principal::TYPE_EXTERNAL_GROUP;

    /**
     * A user authenticated from an external network.
     *
     * @var string
     */
    public const TYPE_EXTERNAL_USER = Entities\Principal::TYPE_EXTERNAL_USER;

    /**
     * A group that a user or Administrator creates.
     *
     * @var string
     */
    public const TYPE_GROUP = Entities\Principal::TYPE_GROUP;

    /**
     * A non-registered user who enters an Adobe Connect meeting room.
     *
     * @var string
     */
    public const TYPE_GUEST = Entities\Principal::TYPE_GUEST;

    /**
     * The built-in group learners, for users who take courses.
     *
     * @var string
     */
    public const TYPE_LEARNERS = Entities\Principal::TYPE_LEARNERS;

    /**
     * The built-in group Meeting Hosts, for Adobe Connect meeting hosts.
     *
     * @var string
     */
    public const TYPE_LIVE_ADMINS = Entities\Principal::TYPE_LIVE_ADMINS;

    /**
     * The built-in group Seminar Hosts, for seminar hosts.
     *
     * @var string
     */
    public const TYPE_SEMINAR_ADMINS = Entities\Principal::TYPE_SEMINAR_ADMINS;

    /**
     * A registered user on the server.
     *
     * @var string
     */
    public const TYPE_USER = Entities\Principal::TYPE_USER;

    protected static function getFacadeAccessor()
    {
        return 'adobe-connect.principal';
    }
}
