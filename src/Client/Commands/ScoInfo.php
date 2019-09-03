<?php

namespace Soheilrt\AdobeConnectClient\Client\Commands;

use Soheilrt\AdobeConnectClient\Client\Abstracts\Command;
use Soheilrt\AdobeConnectClient\Client\Converter\Converter;
use Soheilrt\AdobeConnectClient\Client\Entities\SCO;
use Soheilrt\AdobeConnectClient\Client\Helpers\SetEntityAttributes as FillObject;
use Soheilrt\AdobeConnectClient\Client\Helpers\StatusValidate;

/**
 * Gets the Sco info.
 *
 * More info see {@link https://helpx.adobe.com/adobe-connect/webservices/sco-info.html}
 */
class ScoInfo extends Command
{
    /**
     * @var int
     */
    protected $scoId;

    /**
     * @var SCO|mixed
     */
    protected $sco;

    /**
     * @param int $scoId
     */
    public function __construct($scoId)
    {
        $this->scoId = intval($scoId);
        $this->sco = $this->getEntity('sco');

    }

    /**
     * {@inheritdoc}
     *
     * @return SCO
     */
    protected function process()
    {
        $response = Converter::convert(
            $this->client->doGet([
                'action'  => 'sco-info',
                'sco-id'  => $this->scoId,
                'session' => $this->client->getSession(),
            ])
        );
        StatusValidate::validate($response['status']);
        $sco = new $this->sco();
        FillObject::setAttributes($sco, $response['sco']);

        return $sco;
    }
}
