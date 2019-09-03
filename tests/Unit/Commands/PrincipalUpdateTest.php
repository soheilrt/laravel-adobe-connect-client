<?php

namespace Soheilrt\AdobeConnectClient\Tests\Unit\Commands;

use Soheilrt\AdobeConnectClient\Client\Commands\PrincipalUpdate;
use Soheilrt\AdobeConnectClient\Client\Entities\Principal;
use Soheilrt\AdobeConnectClient\Client\Exceptions\NoAccessException;

class PrincipalUpdateTest extends TestCommandBase
{
    public function testNoAccess()
    {
        $this->userLogout();

        $principal = $this->createPrincipalUser();

        $command = new PrincipalUpdate($principal);
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
            ->setPrincipalId(2006403978)
            ->setFirstName('john')
            ->setLastName('doe')
            ->setHasChildren(false)
            ->setLogin('johndoe@example.com')
            ->setEmail('johndoe@example.com');
    }

    public function testUpdateUser()
    {
        $this->userLogin();

        $principal = $this->createPrincipalUser();

        $command = new PrincipalUpdate($principal);
        $command->setClient($this->client);

        $this->assertTrue($command->execute());
    }

    public function testUpdateGroup()
    {
        $this->userLogin();

        $principal = $this->createPrincipalGroup();

        $command = new PrincipalUpdate($principal);
        $command->setClient($this->client);

        $this->assertTrue($command->execute());
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
            ->setPrincipalId(2006403979)
            ->setHasChildren(true)
            ->setName('New Group Test Name')
            ->setDescription('New Group Test Description');
    }

    public function testInvalidDependency()
    {
        $principal = $this->createPrincipalGroup();

        $command = new PrincipalUpdate($principal);

        $this->expectException(\BadMethodCallException::class);

        $command->execute();
    }
}
