<?php

namespace Soheilrt\AdobeConnectClient\Client\Commands;

use Soheilrt\AdobeConnectClient\Client\Abstracts\Command;
use Soheilrt\AdobeConnectClient\Client\Converter\Converter;
use Soheilrt\AdobeConnectClient\Client\Helpers\StatusValidate;

/**
 * Changes user’s password.
 *
 * More info see {@link https://helpx.adobe.com/adobe-connect/webservices/user-update-pwd.html}
 */
class UserUpdatePassword extends Command
{
    /**
     * @var array
     */
    protected $parameters;

    /**
     * @param int    $userId The Principal Id for user
     * @param string $newPassword
     * @param string $oldPassword
     */
    public function __construct($userId, $newPassword, $oldPassword = '')
    {
        $this->parameters = [
            'action'          => 'user-update-pwd',
            'password'        => $newPassword,
            'user-id'         => (int) $userId,
            'password-verify' => $newPassword,
        ];

        if (!empty($oldPassword)) {
            $this->parameters['password-old'] = $oldPassword;
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
