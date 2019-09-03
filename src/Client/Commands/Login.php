<?php

namespace Soheilrt\AdobeConnectClient\Client\Commands;

use Soheilrt\AdobeConnectClient\Client\Abstracts\Command;
use Soheilrt\AdobeConnectClient\Client\Converter\Converter;
use Soheilrt\AdobeConnectClient\Client\Exceptions\NoDataException;
use Soheilrt\AdobeConnectClient\Client\Helpers\HeaderParse;
use Soheilrt\AdobeConnectClient\Client\Helpers\StatusValidate;

/**
 * Call the Login action and save the session cookie.
 *
 * More info see {@link https://helpx.adobe.com/content/help/en/adobe-connect/webservices/login.html}
 */
class Login extends Command
{
    /**
     * @var array
     */
    protected $parameters;

    /**
     * @param string $login
     * @param string $password
     */
    public function __construct($login, $password)
    {
        $this->parameters = [
            'action'   => 'login',
            'login'    => (string) $login,
            'password' => (string) $password,
        ];
    }

    /**
     * {@inheritdoc}
     *
     * @return bool
     */
    protected function process()
    {
        $response = $this->client->doGet($this->parameters);
        $responseConverted = Converter::convert($response);

        try {
            StatusValidate::validate($responseConverted['status']);
        } catch (NoDataException $e) { // Invalid Login
            $this->client->setSession('');

            return false;
        }
        $cookieHeader = HeaderParse::parse($response->getHeader('Set-Cookie'));
        $this->client->setSession($cookieHeader[0]['BREEZESESSION']);

        return true;
    }
}
