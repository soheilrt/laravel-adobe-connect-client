<?php

namespace Soheilrt\AdobeConnectClient\Client\Commands;

use Soheilrt\AdobeConnectClient\Client\Abstracts\Command;
use Soheilrt\AdobeConnectClient\Client\Contracts\ArrayableInterface;
use Soheilrt\AdobeConnectClient\Client\Converter\Converter;
use Soheilrt\AdobeConnectClient\Client\Helpers\StatusValidate;
use Soheilrt\AdobeConnectClient\Client\Helpers\StringCaseTransform as SCT;
use Soheilrt\AdobeConnectClient\Client\Helpers\ValueTransform as VT;

/**
 * Updates the passed in field-id for the specified SCO, Principal or Account.
 *
 * More info see {@link https://helpx.adobe.com/adobe-connect/webservices/acl-field-update.html}
 */
class AclFieldUpdate extends Command
{
    /**
     * @var array
     */
    protected $parameters;

    /**
     * @param int                     $aclId
     * @param string                  $fieldId
     * @param mixed                   $value
     * @param ArrayableInterface|null $extraParams
     */
    public function __construct($aclId, $fieldId, $value, ArrayableInterface $extraParams = null)
    {
        $this->parameters = [
            'action'   => 'acl-field-update',
            'acl-id'   => $aclId,
            'field-id' => SCT::toHyphen($fieldId),
            'value'    => VT::toString($value),
        ];

        if ($extraParams) {
            $this->parameters += $extraParams->toArray();
        }
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
