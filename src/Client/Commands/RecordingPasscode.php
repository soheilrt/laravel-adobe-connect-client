<?php

namespace Soheilrt\AdobeConnectClient\Client\Commands;

use Soheilrt\AdobeConnectClient\Client\Abstracts\Command;
use Soheilrt\AdobeConnectClient\Client\Entities\Permission;
use Soheilrt\AdobeConnectClient\Client\Parameter;

/**
 * Set the passcode on a Recording and turned into public.
 *
 * Obs: to set the passcode on a Meeting use the aclFieldUpdate method with the
 * meeting-passcode as the fieldId and the passcode as the value.
 */
class RecordingPasscode extends Command
{
    /**
     * @var int
     */
    protected $scoId;

    /**
     * @var string
     */
    protected $passcode;

    /**
     * @var Permission|mixed
     */
    protected $permission;

    /**
     * @param int    $scoId
     * @param string $passcode
     */
    public function __construct($scoId, $passcode)
    {
        $this->scoId = (int) $scoId;
        $this->passcode = (string) $passcode;
        $this->permission = $this->getEntity('permission');
    }

    /**
     * {@inheritdoc}
     *
     * @return bool
     */
    protected function process()
    {
        $permission = new $this->permission();
        $permission->setAclId($this->scoId);
        $permission->setPrincipalId(Permission::RECORDING_PUBLIC);
        $permission->setPermissionId(Permission::MEETING_PRINCIPAL_PUBLIC_ACCESS);
        $this->client->permissionUpdate($permission);

        $parameters = Parameter::instance()
            ->set('isMtgPasscodeReq', true)
            ->set('permissionId', Permission::RECORDING_PUBLIC)
            ->set('principalId', Permission::MEETING_PRINCIPAL_PUBLIC_ACCESS);

        return $this->client->aclFieldUpdate(
            $this->scoId,
            'meetingPasscode',
            $this->passcode,
            $parameters
        );
    }
}
