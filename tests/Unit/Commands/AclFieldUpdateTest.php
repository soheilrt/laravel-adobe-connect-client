<?php

namespace Soheilrt\AdobeConnectClient\Tests\Unit\Commands;

use Soheilrt\AdobeConnectClient\Client\Commands\AclFieldUpdate;
use Soheilrt\AdobeConnectClient\Client\Exceptions\InvalidException;
use Soheilrt\AdobeConnectClient\Client\Exceptions\NoAccessException;
use Soheilrt\AdobeConnectClient\Client\Parameter;

class AclFieldUpdateTest extends TestCommandBase
{
    public function testAclFieldUpdate()
    {
        $this->userLogin();

        $extraParams = Parameter::instance()
            ->set('extraField', 'extra value');

        $command = new AclFieldUpdate(1, 'field', 'value', $extraParams);
        $command->setClient($this->client);

        $this->assertTrue($command->execute());
    }

    public function testNoAccess()
    {
        $this->userLogout();

        $extraParams = Parameter::instance()
            ->set('extraField', 'extra value');

        $command = new AclFieldUpdate(1, 'field', 'value', $extraParams);
        $command->setClient($this->client);

        $this->expectException(NoAccessException::class);

        $command->execute();
    }

    public function testInvalid()
    {
        $this->userLogin();

        $extraParams = Parameter::instance()
            ->set('extraField', 'extra value');

        $command = new AclFieldUpdate(1, 'invalid-field', 'value', $extraParams);
        $command->setClient($this->client);

        $this->expectException(InvalidException::class);

        $command->execute();
    }

    public function testInvalidDependency()
    {
        $command = new AclFieldUpdate(1, 'field', 'value');

        $this->expectException(\BadMethodCallException::class);

        $command->execute();
    }
}
