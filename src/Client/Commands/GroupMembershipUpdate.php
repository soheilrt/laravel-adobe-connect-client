<?php

namespace Soheilrt\AdobeConnectClient\Client\Commands;

use Soheilrt\AdobeConnectClient\Client\Abstracts\Command;
use Soheilrt\AdobeConnectClient\Client\Converter\Converter;
use Soheilrt\AdobeConnectClient\Client\Helpers\StatusValidate;
use Soheilrt\AdobeConnectClient\Client\Helpers\ValueTransform as VT;

/**
 * Adds one principal to a group, or removes one principal from a group.
 *
 * More info see {@link https://helpx.adobe.com/adobe-connect/webservices/group-membership-update.html}
 */
class GroupMembershipUpdate extends Command
{
    /**
     * @var array
     */
    protected $parameters;

    /**
     * @param int  $groupId
     * @param int  $principalId
     * @param bool $isMember
     */
    public function __construct($groupId, $principalId, $isMember)
    {
        $this->parameters = [
            'action'       => 'group-membership-update',
            'group-id'     => (int) $groupId,
            'principal-id' => (int) $principalId,
            'is-member'    => VT::toString($isMember),
        ];
    }

    /**
     * {@inheritdoc}
     *
     * @return bool
     */
    protected function process()
    {
        $response = Converter::convert(
            $this->client->doGet(
                $this->parameters + ['session' => $this->client->getSession()]
            )
        );
        StatusValidate::validate($response['status']);

        return true;
    }
}
