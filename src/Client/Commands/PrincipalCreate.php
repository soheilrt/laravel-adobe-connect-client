<?php

namespace Soheilrt\AdobeConnectClient\Client\Commands;

use Soheilrt\AdobeConnectClient\Client\Abstracts\Command;
use Soheilrt\AdobeConnectClient\Client\Contracts\ArrayableInterface;
use Soheilrt\AdobeConnectClient\Client\Converter\Converter;
use Soheilrt\AdobeConnectClient\Client\Entities\Principal;
use Soheilrt\AdobeConnectClient\Client\Helpers\SetEntityAttributes as FillObject;
use Soheilrt\AdobeConnectClient\Client\Helpers\StatusValidate;

/**
 * Create a Principal.
 *
 * More info see {@link https://helpx.adobe.com/adobe-connect/webservices/principal-update.html}
 */
class PrincipalCreate extends Command
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
     * @param ArrayableInterface $principal
     */
    public function __construct(ArrayableInterface $principal)
    {
        $this->parameters = [
            'action' => 'principal-update',
        ];

        $this->parameters += $principal->toArray();
        $this->principal = $this->getEntity("principal");
    }

    /**
     * {@inheritdoc}
     *
     * @return Principal
     */
    protected function process()
    {
        if (isset($this->parameters['principal-id'])) {
            unset($this->parameters['principal-id']);
        }

        $response = Converter::convert(
            $this->client->doGet(
                $this->parameters + ['session' => $this->client->getSession()]
            )
        );

        StatusValidate::validate($response['status']);

        $principal = new $this->principal();
        FillObject::setAttributes($principal, $response['principal']);

        return $principal;
    }
}
