<?php

namespace Soheilrt\AdobeConnectClient\Client\Commands;

use Soheilrt\AdobeConnectClient\Client\Abstracts\Command;
use Soheilrt\AdobeConnectClient\Client\Contracts\ArrayableInterface;
use Soheilrt\AdobeConnectClient\Client\Converter\Converter;
use Soheilrt\AdobeConnectClient\Client\Entities\SCO;
use Soheilrt\AdobeConnectClient\Client\Helpers\SetEntityAttributes as FillObject;
use Soheilrt\AdobeConnectClient\Client\Helpers\StatusValidate;

/**
 * Get the SCO Contents from a folder or from other SCO.
 *
 * Use the filter to reduce excessive data returns.
 *
 * More info see {@link https://helpx.adobe.com/content/help/en/adobe-connect/webservices/sco-contents.html}
 */
class ScoContents extends Command
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
     * @param int                     $scoId
     * @param ArrayableInterface|null $filter
     * @param ArrayableInterface|null $sorter
     */
    public function __construct($scoId, ArrayableInterface $filter = null, ArrayableInterface $sorter = null)
    {
        $this->parameters = [
            'action' => 'sco-contents',
            'sco-id' => (int) $scoId,
        ];

        if ($filter) {
            $this->parameters += $filter->toArray();
        }

        if ($sorter) {
            $this->parameters += $sorter->toArray();
        }
        $this->sco = $this->getEntity('sco');
    }

    /**
     * {@inheritdoc}
     *
     * @return SCO[]
     */
    protected function process()
    {
        $response = Converter::convert(
            $this->client->doGet($this->parameters + ['session' => $this->client->getSession()])
        );

        StatusValidate::validate($response['status']);

        $scos = [];

        foreach ($response['scos'] as $scoAttributes) {
            $sco = new $this->sco();
            FillObject::setAttributes($sco, $scoAttributes);
            $scos[] = $sco;
        }

        return $scos;
    }
}
