<?php

namespace Soheilrt\AdobeConnectClient\Tests\Unit\Commands;

use Soheilrt\AdobeConnectClient\Client\Commands\GroupMembershipUpdate;
use Soheilrt\AdobeConnectClient\Client\Exceptions\InvalidException;
use Soheilrt\AdobeConnectClient\Client\Exceptions\NoAccessException;

class GroupMembershipUpdateTest extends TestCommandBase
{
    public function testChangeMemberSuccess()
    {
        $this->userLogin();

        $command = new GroupMembershipUpdate(1, 1, true);
        $command->setClient($this->client);

        $this->assertTrue($command->execute());
    }

    public function testNoAccess()
    {
        $this->userLogout();

        $command = new GroupMembershipUpdate(1, 0, true);
        $command->setClient($this->client);

        $this->expectException(NoAccessException::class);

        $command->execute();
    }

    public function testInvalidPrincipalUser()
    {
        $this->userLogin();

        $command = new GroupMembershipUpdate(1, 0, true);
        $command->setClient($this->client);

        $this->expectException(InvalidException::class);

        $command->execute();
    }

    public function testInvalidDependency()
    {
        $command = new GroupMembershipUpdate(1, 0, true);

        $this->expectException(\BadMethodCallException::class);

        $command->execute();
    }
}
