<?php

namespace Soheilrt\AdobeConnectClient\Client;

use BadMethodCallException;
use DomainException;
use ReflectionClass;
use ReflectionException;
use Soheilrt\AdobeConnectClient\Client\Abstracts\Command;
use Soheilrt\AdobeConnectClient\Client\Connection\ConnectionInterface;
use Soheilrt\AdobeConnectClient\Client\Connection\ResponseInterface;
use Soheilrt\AdobeConnectClient\Client\Contracts\ArrayableInterface as Arrayable;
use Soheilrt\AdobeConnectClient\Client\Entities\CommonInfo;
use Soheilrt\AdobeConnectClient\Client\Entities\Permission;
use Soheilrt\AdobeConnectClient\Client\Entities\Principal;
use Soheilrt\AdobeConnectClient\Client\Entities\SCO;
use Soheilrt\AdobeConnectClient\Client\Entities\SCORecord;
use Soheilrt\AdobeConnectClient\Client\Exceptions\CommandClassNotFoundException;
use Soheilrt\AdobeConnectClient\Client\Helpers\StringCaseTransform as SCT;
use SplFileInfo;
use UnexpectedValueException;

/**
 * The Client to Adobe Connect API.
 *
 * @method bool login(string $login, string $password) Login in the Service.
 * @method bool logout() Ends the service session
 * @method CommonInfo commonInfo(string $domain = '') Gets the Common Info
 * @method SCO scoInfo(int $scoId) Gets the info about a SCO
 * @method SCO scoCreate(Arrayable $sco) Create a SCO
 * @method bool scoUpdate(Arrayable $sco) Update a SCO
 * @method bool scoDelete(int $scoId) Delete a SCO or a Folder
 * @method SCO[] scoShortcuts(Arrayable $filter = null, Arrayable $sorter = null) Get SCO Shurcuts to SCO diffrent types.
 * @method bool scoMove(int $scoId, int $folderId) Move the SCO to other Folder
 * @method SCO[] scoContents(int $scoId, Arrayable $filter = null, Arrayable $sorter = null) Get the SCO Contents from a folder or from other SCO
 * @method SCORecord[] listRecordings(int $folderId) Provides a list of recordings for a specified folder or SCO
 * @method Principal principalInfo(int $principalId) Gets the info about an user or group
 * @method Principal principalCreate(Arrayable $principal) Create a Principal.
 * @method bool principalUpdate(Arrayable $principal) Update a Principal.
 * @method bool principalDelete(int $principalId) Remove one principal, either user or group
 * @method Principal[] principalList(int $groupId = 0, Arrayable $filter = null, Arrayable $sorter = null) Provides a complete list of users and groups, including primary groups.
 * @method bool userUpdatePassword(int $userId, string $newPassword, string $oldPassword = '') Changes user’s password
 * @method bool groupMembershipUpdate(int $groupId, int $principalId, bool $isMember) Add or remove a principal from a group
 * @method bool permissionUpdate(Arrayable $permission) Updates the principal's permissions to access a SCO or the access mode if the acl-id is a Meeting
 * @method Principal[] permissionsInfo(int $aclId, Arrayable $filter, Arrayable $sorter) Get a list of principals who have permissions to act on a SCO, Principal or Account
 * @method Permission permissionInfoFromPrincipal(int $aclId, int $principalId) Get the Principal's permission in a SCO, Principal or Account
 * @method bool meetingFeatureUpdate(int $accountId, string $featureId, bool $enable) Set a feature
 * @method bool aclFieldUpdate(int $aclId, string $fieldId, mixed $value, Arrayable $extraParams = null) Updates the passed in Field for the specified ACL
 * @method bool recordingPasscode(int $scoId, string $passcode) Set the passcode on a Recording and turned into public
 * @method int|null scoUpload(int $folderId, string $resourceName, resource|SplFileInfo $file) Uploads a file and then builds the file
 */
class Client
{
    /**
     * @var ConnectionInterface
     */
    protected $connection;

    /**
     * @var string The Session Cookie
     */
    protected $sessionCookie = '';

    /**
     * @param ConnectionInterface $connection The Connection handler
     * @param string              $session    The Session Cookie
     */
    public function __construct(ConnectionInterface $connection, string $session = '')
    {
        $this->connection = $connection;
        $this->sessionCookie = $session;
    }

    /**
     * @return string
     */
    public function getSession()
    {
        return $this->sessionCookie;
    }

    /**
     * @param string $session
     */
    public function setSession($session = '')
    {
        $this->sessionCookie = $session;
    }

    /**
     * Instantiates the Command and execute it.
     *
     * @param string $commandName
     * @param array  $arguments
     *
     * @throws ReflectionException
     *
     * @throws CommandClassNotFoundException
     * @return mixed
     */
    public function __call($commandName, array $arguments = [])
    {
        $commandClassName = $this->getCommandClassName($commandName);

        if (!class_exists($commandClassName)) {
            throw new CommandClassNotFoundException("{$commandClassName} Not Found!");
        }

        $reflection = new ReflectionClass($commandClassName);

        if (!$reflection->isSubclassOf(Command::class)) {
            throw new DomainException(sprintf('"%s" is not a valid command', $commandName));
        }

        return $reflection->newInstanceArgs($arguments)
            ->setClient($this)
            ->execute();
    }

    /**
     * get command class name
     *
     * @param string $commandName
     *
     * @throws BadMethodCallException
     *
     * @return string
     */
    protected final function getCommandClassName($commandName)
    {
        $qualifiedCommandName = SCT::toUpperCamelCase($commandName);
        $command = "Soheilrt\\AdobeConnectClient\\Client\\Commands\\{$qualifiedCommandName}";

        if (!class_exists($command)) {
            throw new BadMethodCallException("Command {$commandName} Does Not Exists!");
        }
        return $command;
    }


    /**
     * @param array $parameters
     *
     * @throws UnexpectedValueException
     *
     * @return ResponseInterface
     */
    public function doGet(array $parameters)
    {
        return $this->connection->get($parameters);
    }

    /**
     * @param array $postParams
     * @param array $queryParams
     *
     * @throws UnexpectedValueException
     *
     * @return ResponseInterface
     */
    public function doPost(array $postParams, array $queryParams = [])
    {
        return $this->connection->post($postParams, $queryParams);
    }
}
