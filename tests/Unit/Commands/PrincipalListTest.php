<?php

namespace Soheilrt\AdobeConnectClient\Tests\Unit\Commands;

use Soheilrt\AdobeConnectClient\Client\Commands\PrincipalList;
use Soheilrt\AdobeConnectClient\Client\Entities\Principal;
use Soheilrt\AdobeConnectClient\Client\Exceptions\NoAccessException;
use Soheilrt\AdobeConnectClient\Client\Filter;
use Soheilrt\AdobeConnectClient\Client\Sorter;

class PrincipalListTest extends TestCommandBase
{
    public function testNoAccess()
    {
        $this->userLogout();

        $command = new PrincipalList();
        $command->setClient($this->client);

        $this->expectException(NoAccessException::class);

        $command->execute();
    }

    public function testListAll()
    {
        $this->userLogin();

        $command = new PrincipalList();
        $command->setClient($this->client);

        $principals = $command->execute();

        $this->assertEquals(2, \count($principals));

        $principal1 = $principals[0];
        $principal2 = $principals[1];

        $this->assertInstanceOf(Principal::class, $principal1);
        $this->assertInstanceOf(Principal::class, $principal2);

        $this->assertEquals(624526, $principal1->getPrincipalId());
        $this->assertEquals(624550, $principal2->getPrincipalId());
    }

    public function testListSorter()
    {
        $this->userLogin();

        $command = new PrincipalList(0, null, Sorter::instance()->asc('firstName'));
        $command->setClient($this->client);

        $principals = $command->execute();

        $this->assertEquals(2, \count($principals));

        $principal = $principals[0];
        $this->assertEquals(624550, $principal->getPrincipalId());
    }

    public function testListFilter()
    {
        $this->userLogin();

        $command = new PrincipalList(0, Filter::instance()->equals('firstName', 'amelie'));
        $command->setClient($this->client);

        $principals = $command->execute();

        $this->assertEquals(1, \count($principals));

        $principal = $principals[0];
        $this->assertEquals(624550, $principal->getPrincipalId());
    }

    public function testListEmpty()
    {
        $this->userLogin();

        $command = new PrincipalList(0, Filter::instance()->equals('firstName', 'joseph'));
        $command->setClient($this->client);

        $principals = $command->execute();

        $this->assertEmpty($principals);
    }

    public function testListGroupAll()
    {
        $this->userLogin();

        $command = new PrincipalList(5);
        $command->setClient($this->client);

        $principals = $command->execute();

        $this->assertEquals(2, \count($principals));

        $assertsExpected = [
            [
                'id'       => 624526,
                'isMember' => true,
            ],
            [
                'id'       => 624550,
                'isMember' => false,
            ],
        ];

        foreach ($assertsExpected as $index => $expectedItems) {
            $this->assertEquals($expectedItems['id'], $principals[$index]->getPrincipalId());
            $this->assertEquals($expectedItems['isMember'], $principals[$index]->getIsMember());
        }
    }

    public function testListGroupIsMember()
    {
        $this->userLogin();

        $command = new PrincipalList(5, Filter::instance()->isMember(true));
        $command->setClient($this->client);

        $principals = $command->execute();

        $this->assertEquals(1, \count($principals));

        $principal = $principals[0];

        $this->assertEquals(624526, $principal->getPrincipalId());
        $this->assertTrue($principal->getIsMember());
    }

    public function testListGroupIsNotMember()
    {
        $this->userLogin();

        $command = new PrincipalList(5, Filter::instance()->isMember(false));
        $command->setClient($this->client);

        $principals = $command->execute();

        $this->assertEquals(1, \count($principals));

        $principal = $principals[0];

        $this->assertEquals(624550, $principal->getPrincipalId());
        $this->assertFalse($principal->getIsMember());
    }

    public function testInvalidDependency()
    {
        $command = new PrincipalList(5, Filter::instance()->isMember(false));

        $this->expectException(\BadMethodCallException::class);

        $command->execute();
    }
}
