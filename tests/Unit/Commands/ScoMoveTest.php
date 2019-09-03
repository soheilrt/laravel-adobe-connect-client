<?php

namespace Soheilrt\AdobeConnectClient\Tests\Unit\Commands;

use Soheilrt\AdobeConnectClient\Client\Commands\ScoMove;
use Soheilrt\AdobeConnectClient\Client\Exceptions\InvalidException;
use Soheilrt\AdobeConnectClient\Client\Exceptions\NoAccessException;

class ScoMoveTest extends TestCommandBase
{
    public function testNoAccess()
    {
        $this->userLogout();

        $command = new ScoMove(1, 1);
        $command->setClient($this->client);

        $this->expectException(NoAccessException::class);

        $command->execute();
    }

    public function testInvalid()
    {
        $this->userLogin();

        $command = new ScoMove(1, 2);
        $command->setClient($this->client);

        $this->expectException(InvalidException::class);

        $command->execute();
    }

    public function testMove()
    {
        $this->userLogin();

        $command = new ScoMove(1, 1);
        $command->setClient($this->client);

        $this->assertTrue($command->execute());
    }

    public function testInvalidDependency()
    {
        $command = new ScoMove(1, 1);

        $this->expectException(\BadMethodCallException::class);

        $command->execute();
    }
}
