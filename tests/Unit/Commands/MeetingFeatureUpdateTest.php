<?php

namespace Soheilrt\AdobeConnectClient\Tests\Unit\Commands;

use Soheilrt\AdobeConnectClient\Client\Commands\MeetingFeatureUpdate;
use Soheilrt\AdobeConnectClient\Client\Exceptions\InvalidException;
use Soheilrt\AdobeConnectClient\Client\Exceptions\NoAccessException;

class MeetingFeatureUpdateTest extends TestCommandBase
{
    public function testMeetignFeatureUpdate()
    {
        $this->userLogin();

        $command = new MeetingFeatureUpdate(1, 'feature', true);
        $command->setClient($this->client);

        $this->assertTrue($command->execute());
    }

    public function testNoAccess()
    {
        $this->userLogout();

        $command = new MeetingFeatureUpdate(1, 'feature', true);
        $command->setClient($this->client);

        $this->expectException(NoAccessException::class);

        $command->execute();
    }

    public function testInvalidFeature()
    {
        $this->userLogin();

        $command = new MeetingFeatureUpdate(1, 'invalid-feature', true);
        $command->setClient($this->client);

        $this->expectException(InvalidException::class);

        $command->execute();
    }

    public function testInvalidDependency()
    {
        $command = new MeetingFeatureUpdate(1, 'invalid-feature', true);

        $this->expectException(\BadMethodCallException::class);

        $command->execute();
    }
}
