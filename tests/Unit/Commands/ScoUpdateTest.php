<?php

namespace Soheilrt\AdobeConnectClient\Tests\Unit\Commands;

use Soheilrt\AdobeConnectClient\Client\Commands\ScoUpdate;
use Soheilrt\AdobeConnectClient\Client\Entities\SCO;
use Soheilrt\AdobeConnectClient\Client\Exceptions\InvalidException;
use Soheilrt\AdobeConnectClient\Client\Exceptions\NoAccessException;

class ScoUpdateTest extends TestCommandBase
{
    public function testNoAccess()
    {
        $this->userLogout();

        $sco = SCO::instance()
            ->setScoId(1)
            ->setName('New Name');

        $command = new ScoUpdate($sco);
        $command->setClient($this->client);

        $this->expectException(NoAccessException::class);

        $command->execute();
    }

    public function testInvalid()
    {
        $sco = SCO::instance()
            ->setName('New Name');

        $this->expectException(InvalidException::class);

        $command = new ScoUpdate($sco);
    }

    public function testUpdate()
    {
        $this->userLogin();

        $sco = SCO::instance()
            ->setScoId(1)
            ->setName('New Name');

        $command = new ScoUpdate($sco);
        $command->setClient($this->client);

        $this->assertTrue($command->execute());
    }

    public function testUpdateWithFolderId()
    {
        $this->userLogin();

        $sco = SCO::instance()
            ->setScoId(1)
            ->setName('New Name')
            ->setFolderId(1);

        $command = new ScoUpdate($sco);
        $command->setClient($this->client);

        $this->assertTrue($command->execute());
    }

    public function testInvalidDependency()
    {
        $sco = SCO::instance()
            ->setScoId(1)
            ->setName('New Name');

        $command = new ScoUpdate($sco);

        $this->expectException(\BadMethodCallException::class);

        $command->execute();
    }
}
