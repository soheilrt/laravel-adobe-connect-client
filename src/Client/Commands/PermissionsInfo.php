<?php

namespace Soheilrt\AdobeConnectClient\Client\Commands;

use Soheilrt\AdobeConnectClient\Client\Abstracts\Command;
use Soheilrt\AdobeConnectClient\Client\Contracts\ArrayableInterface;
use Soheilrt\AdobeConnectClient\Client\Converter\Converter;
use Soheilrt\AdobeConnectClient\Client\Entities\Principal;
use Soheilrt\AdobeConnectClient\Client\Helpers\SetEntityAttributes as FillObject;
use Soheilrt\AdobeConnectClient\Client\Helpers\StatusValidate;

/**
 * Get a list of principals who have permissions to act on a SCO, Principal or Account.
 *
 * More info see {@link https://helpx.adobe.com/adobe-connect/webservices/permissions-info.html}
 */
class PermissionsInfo extends Command
{
    /**
     * @var array
     */
    protected $parameters;

    /**
     * @var Principal
     */
    protected $principal;

    /**
     * @param int                     $aclId SCO ID, Principal ID or Account ID
     * @param ArrayableInterface|null $filter
     * @param ArrayableInterface|null $sorter
     */
    public function __construct($aclId, ArrayableInterface $filter = null, ArrayableInterface $sorter = null)
    {
        $this->parameters = [
            'action' => 'permissions-info',
            'acl-id' => (int) $aclId,
        ];

        if ($filter) {
            $this->parameters += $filter->toArray();
        }

        if ($sorter) {
            $this->parameters += $sorter->toArray();
        }

        $this->principal = $this->getEntity('principal');
    }

    /**
     * {@inheritdoc}
     *
     * @return Principal[]
     */
    protected function process()
    {
        $response = Converter::convert(
            $this->client->doGet(
                $this->parameters + ['session' => $this->client->getSession()]
            )
        );
        StatusValidate::validate($response['status']);

        $principals = [];

        foreach ($response['permissions'] as $principalAttributes) {
            $principal = new $this->principal();
            FillObject::setAttributes($principal, $principalAttributes);
            $principals[] = $principal;
        }

        return $principals;
    }
}
