<?php

namespace Soheilrt\AdobeConnectClient\Tests\Unit\Commands;

use Soheilrt\AdobeConnectClient\Client\Commands\Logout;

class LogoutTest extends TestCommandBase
{
    /**
     * return string.
     */
    public function testLogout()
    {
        $this->userLogin();

        $command = new Logout();
        $command->setClient($this->client);

        $this->assertTrue($command->execute());

        return $this->client->getSession();
    }

    /**
     * @depends testLogout
     *
     * @param string $session
     */
    public function testLogoutSession($session)
    {
        $this->assertEquals('', $session);
    }

    public function testInvalidDependency()
    {
        $command = new Logout();

        $this->expectException(\BadMethodCallException::class);

        $command->execute();
    }
}
