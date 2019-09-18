<?php

namespace Soheilrt\AdobeConnectClient\Client\Helpers;

use DomainException;
use Soheilrt\AdobeConnectClient\Client\Exceptions\InvalidException;
use Soheilrt\AdobeConnectClient\Client\Exceptions\NoAccessException;
use Soheilrt\AdobeConnectClient\Client\Exceptions\NoDataException;
use Soheilrt\AdobeConnectClient\Client\Exceptions\TooMuchDataException;

/**
 * Validate the status code.
 */
abstract class StatusValidate
{
    /**
     * @see {https://helpx.adobe.com/adobe-connect/webservices/common-xml-elements-attributes.html}
     * @var string
     */
    private const STATUS_OK = 'ok';

    /**
     * @see {https://helpx.adobe.com/adobe-connect/webservices/common-xml-elements-attributes.html}
     * @var string
     */
    private const STATUS_INVALID = 'invalid';

    /**
     * @see {https://helpx.adobe.com/adobe-connect/webservices/common-xml-elements-attributes.html}
     * @var string
     */
    private const STATUS_NO_ACCESS = 'no-access';

    /**
     * @see {https://helpx.adobe.com/adobe-connect/webservices/common-xml-elements-attributes.html}
     * @var string
     */
    private const STATUS_NO_DATA = 'no-data';

    /**
     * @see {https://helpx.adobe.com/adobe-connect/webservices/common-xml-elements-attributes.html}
     * @var string
     */
    private const STATUS_TOO_MUCH_DATA = 'too-much-data';


    /**
     * Validate the status code and throw an exception if something is wrong.
     *
     * @param array $status
     *
     * @throws InvalidException
     * @throws NoAccessException
     * @throws NoDataException
     * @throws TooMuchDataException
     * @throws DomainException
     */
    public static function validate(array $status)
    {
        switch ($status['code']) {
            case self::STATUS_OK:
                return;

            case self::STATUS_INVALID:
                $invalid = $status[self::STATUS_INVALID];
                throw new InvalidException(
                    self::getExceptionMessage(self::STATUS_INVALID, $invalid['subcode'], $invalid['field'])
                );
            case self::STATUS_NO_ACCESS:
                throw new NoAccessException(
                    self::getExceptionMessage(
                        self::STATUS_NO_ACCESS,
                        $status['subcode']
                    )
                );
            case self::STATUS_NO_DATA:
                throw new NoDataException(
                    self::getExceptionMessage(self::STATUS_NO_DATA)
                );
            case self::STATUS_TOO_MUCH_DATA:
                throw new TooMuchDataException(
                    self::getExceptionMessage(self::STATUS_TOO_MUCH_DATA)
                );
        }

        throw new DomainException('Status Code is Invalid');
    }

    /**
     *
     *
     * @param string      $statusCode
     * @param null|string $subCode
     * @param null|string $field
     *
     * @return mixed|void
     */
    private static function getExceptionMessage($statusCode, $subCode = null, $field = null)
    {
        $codes = [
            self::STATUS_NO_DATA       =>
                'There is no data available (in response to an action that would normally result in returning data). ' .
                'Usually indicates that there is no item with the ID you specified. ' .
                'To resolve the error, change the specified ID to that of an item that exists.',
            self::STATUS_TOO_MUCH_DATA => 'The action should have returned a single result but is actually returning ' .
                'multiple results. For example, if there are multiple users with the same user name and password, ' .
                'and you call the login action using that user name and password as parameters, ' .
                'the system cannot determine which user to log you in as, so it returns a too-much-data error.',
            self::STATUS_NO_ACCESS     => [
                'account-expired'      => 'The account has expired.',
                'denied'               => 'Based on the supplied credentials, you don’t have permission to call the action.',
                'no-login'             => 'The user is not logged in. To resolve the error, log in (using the login action) ' .
                    'before you make the call.',
                'illegalparent'        => 'The specified acl - id is not a seminar or an unknown issue occured while ' .
                    'retrieving the quota for that seminar.',
                'no-quota'             => 'The account limits have been reached or exceeded.',
                'not-available'        => 'The required resource is unavailable.',
                'not-secure'           => 'You must use SSL to call this action.',
                'pending-activation'   => 'The account is not yet activated.',
                'pending-license'      => 'The account’s license agreement has not been settled.',
                'sco-expired'          => 'The course or tracking content has expired.',
                'sco-not-started'      => 'The meeting or course has not started.',
                'valuelessthanorequal' => 'Value is not a valid integer or is greater than the allowed license quota ' .
                    'for that seminar.',
            ],
            self::STATUS_INVALID       => [
                'duplicate'         => 'The call attempted to add a duplicate item on %s in a context where uniqueness is ' .
                    'required.',
                'format'            => 'passed %s parameter had the wrong format.',
                'illegal-operation' => 'The requested operation on %s violates integrity rules ' .
                    '(for example, moving a folder into itself).',
                'missing'           => 'A required parameter %s is missing.',
                'no-such-item'      => 'The requested %s does not exist.',
                'range'             => 'The value of %s is outside the permitted range of values.'
            ]
        ];

        //this statement will check for any unknown subcodes if any subcodes provided
        // and if any unknown provided, it'll return default error message!
        if ($subCode && !isset($codes[$statusCode][$subCode])) {
            return "{$statusCode} - {$subCode} - {$field}";
        }

        switch ($statusCode) {
            case self::STATUS_INVALID:
                return sprintf($codes[self::STATUS_INVALID][$subCode], $field);
            case self::STATUS_NO_ACCESS:
                return $codes[self::STATUS_NO_ACCESS][$subCode];
            case self::STATUS_NO_DATA:
                return $codes[self::STATUS_NO_DATA];
            case self::STATUS_TOO_MUCH_DATA:
                return $codes[self::STATUS_TOO_MUCH_DATA];
        }
    }
}
