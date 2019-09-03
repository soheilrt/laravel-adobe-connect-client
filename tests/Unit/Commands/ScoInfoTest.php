<?php

namespace Soheilrt\AdobeConnectClient\Tests\Unit\Commands;

use Soheilrt\AdobeConnectClient\Client\Commands\ScoInfo;
use Soheilrt\AdobeConnectClient\Client\Entities\SCO;
use Soheilrt\AdobeConnectClient\Client\Exceptions\NoAccessException;

class ScoInfoTest extends TestCommandBase
{
    public function testNoAccess()
    {
        $this->userLogout();

        $command = new ScoInfo(1);
        $command->setClient($this->client);

        $this->expectException(NoAccessException::class);

        $command->execute();
    }

    public function testInfo()
    {
        $this->userLogin();

        $command = new ScoInfo(1);
        $command->setClient($this->client);

        $sco = $command->execute();

        $this->assertInstanceOf(SCO::class, $sco);
        $this->assertEquals(624520, $sco->getAccountId());
        $this->assertEquals(2006320683, $sco->getScoId());
    }

    public function testInvalidDependency()
    {
        $command = new ScoInfo(1);

        $this->expectException(\BadMethodCallException::class);

        $command->execute();
    }
}
