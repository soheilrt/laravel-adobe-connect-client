<?php

namespace Soheilrt\AdobeConnectClient\Tests\Unit\Commands;

use Soheilrt\AdobeConnectClient\Client\Commands\PermissionInfoFromPrincipal;
use Soheilrt\AdobeConnectClient\Client\Entities\Permission;
use Soheilrt\AdobeConnectClient\Client\Exceptions\NoAccessException;
use Soheilrt\AdobeConnectClient\Client\Exceptions\NoDataException;

class PermissionInfoFromPrincipalTest extends TestCommandBase
{
    public function testPermissionInfoFromPrincipal()
    {
        $this->userLogin();

        $command = new PermissionInfoFromPrincipal(12345, 987654);
        $command->setClient($this->client);

        $permission = $command->execute();

        $this->assertInstanceOf(Permission::class, $permission);
        $this->assertEquals(Permission::PRINCIPAL_HOST, $permission->getPermissionId());
    }

    public function testNoData()
    {
        $this->userLogin();

        $command = new PermissionInfoFromPrincipal(12345, 1);
        $command->setClient($this->client);

        $this->expectException(NoDataException::class);

        $command->execute();
    }

    public function testNoAccess()
    {
        $this->userLogout();

        $command = new PermissionInfoFromPrincipal(12345, 987654);
        $command->setClient($this->client);

        $this->expectException(NoAccessException::class);

        $command->execute();
    }

    public function testInvalidDependency()
    {
        $command = new PermissionInfoFromPrincipal(12345, 987654);

        $this->expectException(\BadMethodCallException::class);

        $command->execute();
    }
}
