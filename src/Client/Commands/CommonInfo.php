<?php

namespace Soheilrt\AdobeConnectClient\Client\Commands;

use Soheilrt\AdobeConnectClient\Client\Abstracts\Command;
use Soheilrt\AdobeConnectClient\Client\Converter\Converter;
use Soheilrt\AdobeConnectClient\Client\Entities\CommonInfo as CommonInfoEntity;
use Soheilrt\AdobeConnectClient\Client\Helpers\SetEntityAttributes as FillObject;
use Soheilrt\AdobeConnectClient\Client\Helpers\StatusValidate;
use Soheilrt\AdobeConnectClient\Client\Helpers\ValueTransform as VT;

/**
 * Gets the common info.
 *
 * More info see {@link https://helpx.adobe.com/adobe-connect/webservices/common-info.html#common_info}
 */
class CommonInfo extends Command
{
    /**
     * @var string
     */
    protected $domain = '';

    /**
     * CommonInfo class name
     *
     * @var string
     */
    protected $className;

    /**
     * @param string $domain
     */
    public function __construct($domain = '')
    {
        $this->domain = $domain;
        $this->className = $this->getEntity('common-info');
    }

    /**
     * {@inheritdoc}
     *
     * @return CommonInfoEntity
     */
    protected function process()
    {
        $parameters = [
            'action' => 'common-info',
        ];

        if (!empty($this->domain)) {
            $parameters += [
                'domain' => VT::toString($this->domain),
            ];
        }

        $response = Converter::convert(
            $this->client->doGet($parameters)
        );
        StatusValidate::validate($response['status']);

        $commonInfo = new $this->className();
        FillObject::setAttributes($commonInfo, $response['common']);

        return $commonInfo;
    }
}
