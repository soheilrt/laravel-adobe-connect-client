<?php

namespace Soheilrt\AdobeConnectClient\Client\Commands;

use Soheilrt\AdobeConnectClient\Client\Abstracts\Command;
use Soheilrt\AdobeConnectClient\Client\Converter\Converter;
use Soheilrt\AdobeConnectClient\Client\Entities\Principal;
use Soheilrt\AdobeConnectClient\Client\Helpers\SetEntityAttributes as FillObject;
use Soheilrt\AdobeConnectClient\Client\Helpers\StatusValidate;

/**
 * Provides information about one principal, either a user or a group.
 *
 * More info see {@link https://helpx.adobe.com/adobe-connect/webservices/principal-info.html}
 */
class PrincipalInfo extends Command
{
    /**
     * @var int
     */
    protected $principalId;

    /**
     * @var Principal|mixed
     */
    protected $principal;

    /**
     * @param int $principalId
     */
    public function __construct($principalId)
    {
        $this->principalId = (int) $principalId;
        $this->principal = $this->getEntity("principal");
    }

    /**
     * {@inheritdoc}
     *
     * @return Principal
     */
    protected function process()
    {
        $response = Converter::convert(
            $this->client->doGet([
                'action'       => 'principal-info',
                'principal-id' => $this->principalId,
                'session'      => $this->client->getSession(),
            ])
        );

        StatusValidate::validate($response['status']);

        $principal = new $this->principal();
        FillObject::setAttributes($principal, $response['principal']);

        return $principal;
    }
}
