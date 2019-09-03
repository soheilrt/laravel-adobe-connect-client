<?php

namespace Soheilrt\AdobeConnectClient\Tests\Unit\Commands;

use Soheilrt\AdobeConnectClient\Client\Commands\PrincipalInfo;
use Soheilrt\AdobeConnectClient\Client\Entities\Principal;
use Soheilrt\AdobeConnectClient\Client\Exceptions\NoAccessException;

class PrincipalInfoTest extends TestCommandBase
{
    public function testPrincipalUserInfo()
    {
        $this->userLogin();

        $command = new PrincipalInfo(2006258745);
        $command->setClient($this->client);

        $principal = $command->execute();

        $this->assertInstanceOf(Principal::class, $principal);
        $this->assertEquals(Principal::TYPE_USER, $principal->getType());
        $this->assertEquals(2006258745, $principal->getPrincipalId());
        $this->assertEquals('Smith', $principal->getLastName());
    }

    public function testPrincipalGroupInfo()
    {
        $this->userLogin();

        $command = new PrincipalInfo(2006403979);
        $command->setClient($this->client);

        $principal = $command->execute();

        $this->assertInstanceOf(Principal::class, $principal);
        $this->assertEquals(Principal::TYPE_GROUP, $principal->getType());
        $this->assertEquals(2006403979, $principal->getPrincipalId());
        $this->assertEquals('Group Test Description', $principal->getDescription());
        $this->assertEquals('Group Test Name', $principal->getName());
    }

    public function testNoAccess()
    {
        $this->userLogout();

        $command = new PrincipalInfo(2006258745);
        $command->setClient($this->client);

        $this->expectException(NoAccessException::class);

        $command->execute();
    }

    public function testInvalidDependency()
    {
        $command = new PrincipalInfo(2006258745);

        $this->expectException(\BadMethodCallException::class);

        $command->execute();
    }
}
