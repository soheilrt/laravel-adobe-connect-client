<?php

namespace Soheilrt\AdobeConnectClient\Tests\Unit\Commands;

use Soheilrt\AdobeConnectClient\Client\Commands\Login;

class LoginTest extends TestCommandBase
{
    /**
     * return string.
     */
    public function testUserSuccess()
    {
        $command = new Login('ValidLogin', 'ValidPassword');
        $command->setClient($this->client);

        $this->assertTrue($command->execute());

        return $this->client->getSession();
    }

    /**
     * @depends testUserSuccess
     *
     * @param string $session
     */
    public function testLoggedSession($session)
    {
        $this->assertEquals($this->connection->getSessionString(), $session);
    }

    public function testInvalidLogin()
    {
        $command = new Login('InvalidLogin', 'InvalidPassword');
        $command->setClient($this->client);

        $this->assertFalse($command->execute());
    }

    /**
     * @depends testInvalidLogin
     *
     * @param string $session
     */
    public function testLogoutdSession($session)
    {
        $this->assertEquals('', $session);
    }

    public function testInvalidDependency()
    {
        $command = new Login('InvalidLogin', 'InvalidPassword');

        $this->expectException(\BadMethodCallException::class);

        $command->execute();
    }
}
