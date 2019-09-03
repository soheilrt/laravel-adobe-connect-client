<?php

namespace Soheilrt\AdobeConnectClient\Tests\Unit\Commands;

use Soheilrt\AdobeConnectClient\Client\Commands\ScoCreate;
use Soheilrt\AdobeConnectClient\Client\Entities\SCO;
use Soheilrt\AdobeConnectClient\Client\Exceptions\NoAccessException;

class ScoCreateTest extends TestCommandBase
{
    public function testNoAccess()
    {
        $this->userLogout();

        $sco = SCO::instance()->setName('SCO Name');

        $command = new ScoCreate($sco);
        $command->setClient($this->client);

        $this->expectException(NoAccessException::class);

        $command->execute();
    }

    public function testInvalidDependency()
    {
        $sco = SCO::instance()->setName('SCO Name');

        $command = new ScoCreate($sco);

        $this->expectException(\BadMethodCallException::class);

        $command->execute();
    }

    public function testCreate()
    {
        $this->userLogin();

        $dateBegin = new \DateTimeImmutable('2018-03-12T14:00:00.000-03:00');
        $dateEnd = new \DateTimeImmutable('2018-03-12T15:00:00.000-03:00');

        $sco = SCO::instance()
            ->setScoId(1)// this will be removed
            ->setName('SCO Name')
            ->setType(SCO::TYPE_MEETING)
            ->setFolderId(2006258747)
            ->setDateBegin($dateBegin)
            ->setDateEnd($dateEnd);

        $command = new ScoCreate($sco);
        $command->setClient($this->client);

        $scoCreated = $command->execute();

        $this->assertInstanceOf(SCO::class, $scoCreated);
        $this->assertEquals(2006258747, $scoCreated->getFolderId());
        $this->assertEquals($dateBegin, $scoCreated->getDateBegin());
        $this->assertEquals($dateEnd, $scoCreated->getDateEnd());
    }
}
