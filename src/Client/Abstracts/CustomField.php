<?php

namespace Soheilrt\AdobeConnectClient\Client\Abstracts;

/**
 * Adobe Connect's types constants to Custom Field.
 *
 * See common elements in {@link https://helpx.adobe.com/adobe-connect/webservices/common-xml-elements-attributes.html#type}
 *
 * @todo Check if this is useful
 */
abstract class CustomField
{
    /**
     * A required custom field for the account.
     *
     * @var string
     */
    const REQUIRED = 'required';

    /**
     * An optional field that is displayed during self-registration.
     *
     * @var string
     */
    const OPTIONAL = 'optional';

    /**
     * An optional field that is hidden during self-registration.
     *
     * @var string
     */
    const OPTIONAL_NO_SELF_REG = 'optional-no-self-reg';
}
