<?php

namespace Soheilrt\AdobeConnectClient\Tests\Unit;

use PHPUnit\Framework\TestCase;
use Soheilrt\AdobeConnectClient\Client\Contracts\ArrayableInterface;
use Soheilrt\AdobeConnectClient\Client\Entities\Permission;

class PermissionTest extends TestCase
{
    public function testInstance()
    {
        $this->assertInstanceOf(Permission::class, Permission::instance());
    }

    public function testIsArrayable()
    {
        $this->assertInstanceOf(ArrayableInterface::class, Permission::instance());
    }

    public function testAclId()
    {
        $permission = Permission::instance();

        $permission->setAclId(1);
        $this->assertEquals(1, $permission->getAclId());

        $permission->setAclId('1');
        $this->assertEquals(1, $permission->getAclId());
    }

    public function testPermissionId()
    {
        $permission = Permission::instance();

        $permission->setPermissionId(Permission::MEETING_ANYONE_WITH_URL);
        $this->assertEquals(Permission::MEETING_ANYONE_WITH_URL, $permission->getPermissionId());
    }

    public function testPrincipalId()
    {
        $permission = Permission::instance();

        $permission->setPrincipalId(Permission::PRINCIPAL_HOST);
        $this->assertEquals(Permission::PRINCIPAL_HOST, $permission->getPrincipalId());

        $permission->setPrincipalId(1);
        $this->assertEquals(1, $permission->getPrincipalId());
    }

    public function testToArray()
    {
        $permission = Permission::instance()
            ->setAclId(1)
            ->setPermissionId(Permission::MEETING_ANYONE_WITH_URL)
            ->setPrincipalId(Permission::MEETING_PRINCIPAL_PUBLIC_ACCESS);

        $this->assertEquals(
            [
                'acl-id'        => 1,
                'permission-id' => Permission::MEETING_ANYONE_WITH_URL,
                'principal-id'  => Permission::MEETING_PRINCIPAL_PUBLIC_ACCESS,
            ],
            $permission->toArray()
        );
    }

    public function testFluentInterface()
    {
        $permission = Permission::instance();
        $this->assertInstanceOf(Permission::class, $permission->setPrincipalId(5));
        $this->assertInstanceOf(Permission::class, $permission->setPermissionId(Permission::MEETING_ANYONE_WITH_URL));
        $this->assertInstanceOf(Permission::class, $permission->setAclId(1));
    }

    public function testFillable()
    {
        $values = ['a' => 1, 'b' => 'test value', 'c' => 'nothing else', 'd' => null];
        $permission = Permission::instance()->fill($values);

        $this->assertEquals($values,$permission->toArray(false));

        foreach ($values as $key=>$value){
            $this->assertEquals($value,$permission->$key);
        }
    }
}
