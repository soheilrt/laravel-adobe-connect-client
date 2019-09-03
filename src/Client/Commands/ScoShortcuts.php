<?php

namespace Soheilrt\AdobeConnectClient\Client\Commands;

use Soheilrt\AdobeConnectClient\Client\Abstracts\Command;
use Soheilrt\AdobeConnectClient\Client\Converter\Converter;
use Soheilrt\AdobeConnectClient\Client\Entities\SCO;
use Soheilrt\AdobeConnectClient\Client\Exceptions\InvalidException;
use Soheilrt\AdobeConnectClient\Client\Exceptions\NoAccessException;
use Soheilrt\AdobeConnectClient\Client\Exceptions\NoDataException;
use Soheilrt\AdobeConnectClient\Client\Exceptions\TooMuchDataException;
use Soheilrt\AdobeConnectClient\Client\Helpers\SetEntityAttributes as FillObject;
use Soheilrt\AdobeConnectClient\Client\Helpers\StatusValidate;

class ScoShortcuts extends Command
{
    /**
     * Request Parameters.
     *
     * @var array
     */
    protected $parameters = ['action' => 'sco-shortcuts'];

    /**
     * @var SCO|mixed
     */
    protected $sco;


    public function __construct()
    {
        $this->sco = $this->getEntity('sco');
    }

    /**
     * Process the command and return a value.
     *
     * @throws InvalidException
     * @throws NoAccessException
     * @throws NoDataException
     * @throws TooMuchDataException
     *
     * @return SCO[]
     */
    protected function process()
    {
        $response = Converter::convert(
            $this->client->doGet(
                $this->parameters + ['session' => $this->client->getSession()]
            )
        );

        StatusValidate::validate($response['status']);

        $shorcuts = [];
        foreach ($response['shortcuts'] as $shortcut) {
            $sco = new $this->sco();
            FillObject::setAttributes($sco, $shortcut);
            $shorcuts[$sco->type] = $sco;
        }

        return $shorcuts;
    }
}
