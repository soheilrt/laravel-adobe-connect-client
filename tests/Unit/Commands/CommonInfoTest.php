<?php

namespace Soheilrt\AdobeConnectClient\Tests\Unit\Commands;

use Soheilrt\AdobeConnectClient\Client\Commands\CommonInfo;
use Soheilrt\AdobeConnectClient\Client\Entities\CommonInfo as CommonInfoEntity;

class CommonInfoTest extends TestCommandBase
{
    public function testWithoutDomain()
    {
        $command = new CommonInfo();
        $command->setClient($this->client);
        $commonInfo = $command->execute();

        $this->assertInstanceOf(CommonInfoEntity::class, $commonInfo);
        $this->assertEquals('https:example.com', $commonInfo->getHost());
        $this->assertEquals(624520, $commonInfo->getAccountId());
    }

    public function testWithDomain()
    {
        $command = new CommonInfo('domain');
        $command->setClient($this->client);
        $commonInfo = $command->execute();

        $this->assertInstanceOf(CommonInfoEntity::class, $commonInfo);
        $this->assertEquals('https:example.com', $commonInfo->getHost());
        $this->assertEquals(624520, $commonInfo->getAccountId());
    }

    public function testInvalidDependency()
    {
        $command = new CommonInfo();

        $this->expectException(\BadMethodCallException::class);

        $command->execute();
    }
}
