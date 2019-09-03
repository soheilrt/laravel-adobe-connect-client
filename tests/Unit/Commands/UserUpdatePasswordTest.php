<?php

namespace Soheilrt\AdobeConnectClient\Tests\Unit\Commands;

use Soheilrt\AdobeConnectClient\Client\Commands\UserUpdatePassword;
use Soheilrt\AdobeConnectClient\Client\Exceptions\NoAccessException;

class UserUpdatePasswordTest extends TestCommandBase
{
    public function testNoAccess()
    {
        $this->userLogout();

        $command = new UserUpdatePassword(1, 'password');
        $command->setClient($this->client);

        $this->expectException(NoAccessException::class);

        $command->execute();
    }

    public function testUpdateWithoutOldPassword()
    {
        $this->userLogin();

        $command = new UserUpdatePassword(1, 'newpassword');
        $command->setClient($this->client);

        $this->assertTrue($command->execute());
    }

    public function testUpdateWithOldPassword()
    {
        $this->userLogin();

        $command = new UserUpdatePassword(1, 'newpassword', 'oldpassword');
        $command->setClient($this->client);

        $this->assertTrue($command->execute());
    }

    public function testInvalidDependency()
    {
        $command = new UserUpdatePassword(1, 'newpassword', 'oldpassword');

        $this->expectException(\BadMethodCallException::class);

        $command->execute();
    }
}
