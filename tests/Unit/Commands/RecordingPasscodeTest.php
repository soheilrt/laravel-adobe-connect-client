<?php

namespace Soheilrt\AdobeConnectClient\Tests\Unit\Commands;

use Soheilrt\AdobeConnectClient\Client\Commands\RecordingPasscode;
use Soheilrt\AdobeConnectClient\Client\Exceptions\NoAccessException;

class RecordingPasscodeTest extends TestCommandBase
{
    public function testNoAccess()
    {
        $this->userLogout();

        $command = new RecordingPasscode(1, 'passcode');
        $command->setClient($this->client);

        $this->expectException(NoAccessException::class);

        $command->execute();
    }

    public function testSetPasscode()
    {
        $this->userLogin();

        $command = new RecordingPasscode(1, 'passcode');
        $command->setClient($this->client);

        $this->assertTrue($command->execute());
    }

    public function testInvalidDependency()
    {
        $command = new RecordingPasscode(1, 'passcode');

        $this->expectException(\BadMethodCallException::class);

        $command->execute();
    }
}
