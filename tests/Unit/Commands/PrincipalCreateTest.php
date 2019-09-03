<?php

namespace Soheilrt\AdobeConnectClient\Tests\Unit\Commands;

use Soheilrt\AdobeConnectClient\Client\Commands\PrincipalCreate;
use Soheilrt\AdobeConnectClient\Client\Entities\Principal;
use Soheilrt\AdobeConnectClient\Client\Exceptions\NoAccessException;

class PrincipalCreateTest extends TestCommandBase
{
    public function testNoAccess()
    {
        $this->userLogout();

        $principal = $this->createPrincipalUser();

        $command = new PrincipalCreate($principal);
        $command->setClient($this->client);

        $this->expectException(NoAccessException::class);

        $command->execute();
    }

    /**
     * Create a new Principal User.
     *
     * @return Principal
     */
    private function createPrincipalUser()
    {
        return Principal::instance()
            ->setType(Principal::TYPE_USER)
            ->setFirstName('jake')
            ->setLastName('doe')
            ->setHasChildren(false)
            ->setLogin('jakedoe@example.com')
            ->setEmail('jakedoe@example.com')
            ->setPassword('12345')
            ->setSendEmail(false);
    }

    public function testCreateUser()
    {
        $this->userLogin();

        $principal = $this->createPrincipalUser();

        $command = new PrincipalCreate($principal);
        $command->setClient($this->client);

        $principalCreated = $command->execute();

        $this->assertInstanceOf(Principal::class, $principalCreated);
        $this->assertEquals($principal->getType(), $principalCreated->getType());
        $this->assertEquals($principal->getFirstName(), $principalCreated->getFirstName());
        $this->assertEquals($principal->getLastName(), $principalCreated->getLastName());
        $this->assertEquals($principal->getLogin(), $principalCreated->getLogin());
        $this->assertEquals($principal->getHasChildren(), $principalCreated->getHasChildren());
        $this->assertEquals(2006403978, $principalCreated->getPrincipalId());
        $this->assertEquals(624520, $principalCreated->getAccountId());
    }

    public function testCreateUserWithPrincipalId()
    {
        $this->userLogin();

        $principal = $this->createPrincipalUser();
        $principal->setPrincipalId(12345);

        $command = new PrincipalCreate($principal);
        $command->setClient($this->client);

        $principalCreated = $command->execute();

        $this->assertInstanceOf(Principal::class, $principalCreated);
        $this->assertEquals($principal->getType(), $principalCreated->getType());
        $this->assertEquals($principal->getFirstName(), $principalCreated->getFirstName());
        $this->assertEquals($principal->getLastName(), $principalCreated->getLastName());
        $this->assertEquals($principal->getLogin(), $principalCreated->getLogin());
        $this->assertEquals($principal->getHasChildren(), $principalCreated->getHasChildren());
        $this->assertEquals(2006403978, $principalCreated->getPrincipalId());
        $this->assertEquals(624520, $principalCreated->getAccountId());
    }

    public function testCreateGroup()
    {
        $this->userLogin();

        $principal = $this->createPrincipalGroup();

        $command = new PrincipalCreate($principal);
        $command->setClient($this->client);

        $principalCreated = $command->execute();

        $this->assertInstanceOf(Principal::class, $principalCreated);
        $this->assertEquals($principal->getType(), $principalCreated->getType());
        $this->assertEquals($principal->getName(), $principalCreated->getName());
        $this->assertEquals($principal->getHasChildren(), $principalCreated->getHasChildren());
        $this->assertEquals(2006403979, $principalCreated->getPrincipalId());
        $this->assertEquals(624520, $principalCreated->getAccountId());
    }

    /**
     * Create a new Principal Group.
     *
     * @return Principal
     */
    private function createPrincipalGroup()
    {
        return Principal::instance()
            ->setType(Principal::TYPE_GROUP)
            ->setHasChildren(true)
            ->setName('Group Test Name')
            ->setDescription('Group Test Description');
    }

    public function testCreateGroupWithPrincipalId()
    {
        $this->userLogin();

        $principal = $this->createPrincipalGroup();
        $principal->setPrincipalId(12345);

        $command = new PrincipalCreate($principal);
        $command->setClient($this->client);

        $principalCreated = $command->execute();

        $this->assertInstanceOf(Principal::class, $principalCreated);
        $this->assertEquals($principal->getType(), $principalCreated->getType());
        $this->assertEquals($principal->getName(), $principalCreated->getName());
        $this->assertEquals($principal->getHasChildren(), $principalCreated->getHasChildren());
        $this->assertEquals(2006403979, $principalCreated->getPrincipalId());
        $this->assertEquals(624520, $principalCreated->getAccountId());
    }

    public function testInvalidDependency()
    {
        $principal = $this->createPrincipalGroup();

        $command = new PrincipalCreate($principal);

        $this->expectException(\BadMethodCallException::class);

        $command->execute();
    }
}
