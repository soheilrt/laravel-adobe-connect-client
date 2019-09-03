<?php

namespace Soheilrt\AdobeConnectClient\Client\Commands;

use Soheilrt\AdobeConnectClient\Client\Abstracts\Command;
use Soheilrt\AdobeConnectClient\Client\Converter\Converter;
use Soheilrt\AdobeConnectClient\Client\Helpers\StatusValidate;
use Soheilrt\AdobeConnectClient\Client\Helpers\StringCaseTransform as SCT;
use Soheilrt\AdobeConnectClient\Client\Helpers\ValueTransform as VT;

/**
 * Set a feature.
 *
 * More info see {@link https://helpx.adobe.com/adobe-connect/webservices/meeting-feature-update.html}
 */
class MeetingFeatureUpdate extends Command
{
    /**
     * @var array
     */
    protected $parameters;

    /**
     * @param int    $accountId
     * @param string $featureId
     * @param bool   $enable
     */
    public function __construct($accountId, $featureId, $enable)
    {
        $this->parameters = [
            'action'     => 'meeting-feature-update',
            'account-id' => (int) $accountId,
            'enable'     => VT::toString($enable),
        ];

        $featureId = SCT::toHyphen($featureId);

        if (mb_strpos($featureId, 'fid-') === false) {
            $featureId = 'fid-' . $featureId;
        }

        $this->parameters['feature-id'] = $featureId;
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
