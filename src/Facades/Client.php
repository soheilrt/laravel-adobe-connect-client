<?php


namespace Soheilrt\AdobeConnectClient\Facades;


use Illuminate\Support\Facades\Facade;
use Soheilrt\AdobeConnectClient\Client\Contracts\ArrayableInterface as Arrayable;
use SplFileInfo;
use \Soheilrt\AdobeConnectClient\Client\Entities\SCO;

/**
 * @method static bool login(string $login, string $password) Login in the Service.
 * @method static bool logout() Ends the service session
 * @method static CommonInfo commonInfo(string $domain = '') Gets the Common Info
 * @method static SCO scoInfo(int $scoId) Gets the info about a SCO
 * @method static SCO scoCreate(Arrayable $sco) Create a SCO
 * @method static bool scoUpdate(Arrayable $sco) Update a SCO
 * @method static bool scoDelete(int $scoId) Delete a SCO or a Folder
 * @method static SCO[] scoShortcuts(Arrayable $filter = null, Arrayable $sorter = null) Get SCO Shortcuts to SCO
 *         different types.
 * @method static bool scoMove(int $scoId, int $folderId) Move the SCO to other Folder
 * @method static SCO[] scoContents(int $scoId, Arrayable $filter = null, Arrayable $sorter = null) Get the SCO
 *         Contents from a folder or from other SCO
 * @method static SCORecord[] listRecordings(int $folderId) Provides a list of recordings for a specified folder or SCO
 * @method static Principal principalInfo(int $principalId) Gets the info about an user or group
 * @method static Principal principalCreate(Arrayable $principal) Create a Principal.
 * @method static bool principalUpdate(Arrayable $principal) Update a Principal.
 * @method static bool principalDelete(int $principalId) Remove one principal, either user or group
 * @method static Principal[] principalList(int $groupId = 0, Arrayable $filter = null, Arrayable $sorter = null)
 *         Provides a complete list of users and groups, including primary groups.
 * @method static bool userUpdatePassword(int $userId, string $newPassword, string $oldPassword = '') Changes user’s
 *         password
 * @method static bool groupMembershipUpdate(int $groupId, int $principalId, bool $isMember) Add or remove a principal
 *         from a group
 * @method static bool permissionUpdate(Arrayable $permission) Updates the principal's permissions to access a SCO or
 *         the access mode if the acl-id is a Meeting
 * @method static Principal[] permissionsInfo(int $aclId, Arrayable $filter = null, Arrayable $sorter = null) Get a list of
 *         principals who have permissions to act on a SCO, Principal or Account
 * @method static Permission permissionInfoFromPrincipal(int $aclId, int $principalId) Get the Principal's permission
 *         in a SCO, Principal or Account
 * @method static bool meetingFeatureUpdate(int $accountId, string $featureId, bool $enable) Set a feature
 * @method static bool aclFieldUpdate(int $aclId, string $fieldId, mixed $value, Arrayable $extraParams = null) Updates
 *         the passed in Field for the specified ACL
 * @method static bool recordingPasscode(int $scoId, string $passcode) Set the passcode on a Recording and turned into
 *         public
 * @method static int|null scoUpload(int $folderId, string $resourceName, resource|SplFileInfo $file) Uploads a file
 *         and then builds the file
 * @method static getSession() get current session
 * @method static setSession($session) set session
 */
class Client extends Facade
{
    protected static function getFacadeAccessor()
    {
        return \Soheilrt\AdobeConnectClient\Client\Client::class;
    }
}
