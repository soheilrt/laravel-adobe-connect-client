<?php

namespace Soheilrt\AdobeConnectClient\Client\Commands;

use Soheilrt\AdobeConnectClient\Client\Abstracts\Command;

/**
 * Ends the session.
 *
 * More info see {@link https://helpx.adobe.com/content/help/en/adobe-connect/webservices/logout.html}
 */
class Logout extends Command
{
    /**
     * {@inheritdoc}
     *
     * @return bool
     */
    protected function process()
    {
        $this->client->doGet([
            'action'  => 'logout',
            'session' => $this->client->getSession(),
        ]);
        $this->client->setSession('');

        return true;
    }
}
