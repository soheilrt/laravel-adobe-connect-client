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
            case 'ok':
                return;

            case 'invalid':
                $invalid = $status['invalid'];

                throw new InvalidException(
                    "{$invalid['field']} {$invalid['subcode']}"
                );

            case 'no-access':
                throw new NoAccessException($status['subcode']);
            case 'no-data':
                throw new NoDataException();
            case 'too-much-data':
                throw new TooMuchDataException();
        }

        throw new DomainException('Status Code is Invalid');
    }
}
