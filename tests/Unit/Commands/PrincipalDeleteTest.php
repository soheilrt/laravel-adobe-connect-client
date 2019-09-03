<?php

namespace Soheilrt\AdobeConnectClient\Tests\Unit\Commands;

use Soheilrt\AdobeConnectClient\Client\Commands\PrincipalDelete;
use Soheilrt\AdobeConnectClient\Client\Exceptions\NoAccessException;

class PrincipalDeleteTest extends TestCommandBase
{
    public function testDeletePrincipal()
    {
        $this->userLogin();

        $command = new PrincipalDelete(1);
        $command->setClient($this->client);

        $this->assertTrue($command->execute());
    }

    public function testNoAccess()
    {
        $this->userLogout();

        $command = new PrincipalDelete(1);
        $command->setClient($this->client);

        $this->expectException(NoAccessException::class);

        $command->execute();
    }

    public function testInvalidDependency()
    {
        $command = new PrincipalDelete(1);

        $this->expectException(\BadMethodCallException::class);

        $command->execute();
    }
}
