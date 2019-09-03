<?php

namespace Soheilrt\AdobeConnectClient\Client\Commands;

use Soheilrt\AdobeConnectClient\Client\Abstracts\Command;
use Soheilrt\AdobeConnectClient\Client\Converter\Converter;
use Soheilrt\AdobeConnectClient\Client\Entities\Permission;
use Soheilrt\AdobeConnectClient\Client\Helpers\SetEntityAttributes as FillObject;
use Soheilrt\AdobeConnectClient\Client\Helpers\StatusValidate;

/**
 * Get the Principal's permission in a SCO, Principal or Account.
 *
 * More info see {@link https://helpx.adobe.com/adobe-connect/webservices/permissions-info.html}
 */
class PermissionInfoFromPrincipal extends Command
{
    /**
     * @var int
     */
    protected $aclId;

    /**
     * @var int
     */
    protected $principalId;

    /**
     * @var Permission|mixed
     */
    protected $permission;

    /**
     * @param int $aclId
     * @param int $principalId
     */
    public function __construct($aclId, $principalId)
    {
        $this->aclId = (int) $aclId;
        $this->principalId = (int) $principalId;
        $this->permission = $this->getEntity('permission');
    }

    /**
     * {@inheritdoc}
     *
     * @return Permission
     */
    protected function process()
    {
        $response = Converter::convert(
            $this->client->doGet([
                'action'       => 'permissions-info',
                'acl-id'       => $this->aclId,
                'principal-id' => $this->principalId,
                'session'      => $this->client->getSession(),
            ])
        );
        StatusValidate::validate($response['status']);
        $permission = new $this->permission();
        FillObject::setAttributes($permission, $response['permission']);

        return $permission;
    }
}
