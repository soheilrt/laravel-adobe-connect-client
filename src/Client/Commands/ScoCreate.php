<?php

namespace Soheilrt\AdobeConnectClient\Client\Commands;

use Soheilrt\AdobeConnectClient\Client\Abstracts\Command;
use Soheilrt\AdobeConnectClient\Client\Contracts\ArrayableInterface;
use Soheilrt\AdobeConnectClient\Client\Converter\Converter;
use Soheilrt\AdobeConnectClient\Client\Entities\SCO;
use Soheilrt\AdobeConnectClient\Client\Helpers\SetEntityAttributes as FillObject;
use Soheilrt\AdobeConnectClient\Client\Helpers\StatusValidate;

/**
 * Create a SCO.
 *
 * More info see {@link https://helpx.adobe.com/adobe-connect/webservices/sco-update.html}
 */
class ScoCreate extends Command
{
    /**
     * @var array
     */
    protected $parameters;

    /**
     * @var SCO|mixed
     */
    protected $sco;

    /**
     * @param ArrayableInterface $sco
     */
    public function __construct(ArrayableInterface $sco)
    {
        $this->parameters = [
            'action' => 'sco-update',
        ];

        $this->parameters += $sco->toArray();
        $this->sco = $this->getEntity('sco');
    }

    /**
     * {@inheritdoc}
     *
     * @return SCO
     */
    protected function process()
    {
        // Create a SCO only in a folder
        if (isset($this->parameters['sco-id'])) {
            unset($this->parameters['sco-id']);
        }

        $response = Converter::convert(
            $this->client->doGet(
                $this->parameters + ['session' => $this->client->getSession()]
            )
        );

        StatusValidate::validate($response['status']);

        $sco = new $this->sco();
        FillObject::setAttributes($sco, $response['sco']);

        return $sco;
    }
}
