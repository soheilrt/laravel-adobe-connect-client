<?php

namespace Soheilrt\AdobeConnectClient\Client\Commands;

use Soheilrt\AdobeConnectClient\Client\Abstracts\Command;
use Soheilrt\AdobeConnectClient\Client\Contracts\ArrayableInterface;
use Soheilrt\AdobeConnectClient\Client\Converter\Converter;
use Soheilrt\AdobeConnectClient\Client\Entities\Principal;
use Soheilrt\AdobeConnectClient\Client\Helpers\SetEntityAttributes as FillObject;
use Soheilrt\AdobeConnectClient\Client\Helpers\StatusValidate;

/**
 * Provides a complete list of users and groups, including primary groups.
 *
 * More info see {@link https://helpx.adobe.com/adobe-connect/webservices/principal-list.html}
 */
class PrincipalList extends Command
{
    /**
     * @var array
     */
    protected $parameters;

    /**
     * @var Principal|mixed
     */
    protected $principal;

    /**
     * @param int                     $groupId The Principal ID of a group. If indicate will be possible filter by isMember.
     * @param ArrayableInterface|null $filter
     * @param ArrayableInterface|null $sorter
     */
    public function __construct($groupId = 0, ArrayableInterface $filter = null, ArrayableInterface $sorter = null)
    {
        $this->parameters = [
            'action' => 'principal-list',
        ];

        if ($groupId) {
            $this->parameters['group-id'] = $groupId;
        }

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

        foreach ($response['principalList'] as $principalAttributes) {
            $principal = new $this->principal();
            FillObject::setAttributes($principal, $principalAttributes);
            $principals[] = $principal;
        }

        return $principals;
    }
}
