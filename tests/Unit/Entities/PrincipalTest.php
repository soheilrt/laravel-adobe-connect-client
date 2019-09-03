<?php

namespace Soheilrt\AdobeConnectClient\Tests\Unit\Entities;

use DomainException;
use PHPUnit\Framework\TestCase;
use Soheilrt\AdobeConnectClient\Client\Contracts\ArrayableInterface;
use Soheilrt\AdobeConnectClient\Client\Entities\Principal;

class PrincipalTest extends TestCase
{
    public function testInstance()
    {
        $this->assertInstanceOf(Principal::class, Principal::instance());
    }

    public function testArrayable()
    {
        $this->assertInstanceOf(ArrayableInterface::class, Principal::instance());
    }

    public function testName()
    {
        $principal = Principal::instance()
            ->setName('Name');

        $this->assertEquals('Name', $principal->getName());
    }

    public function testLogin()
    {
        $principal = Principal::instance()
            ->setLogin('Login');

        $this->assertEquals('Login', $principal->getLogin());
    }

    public function testDisplayUid()
    {
        $principal = Principal::instance();

        $principal->setDisplayUid(5);
        $this->assertEquals(5, $principal->getDisplayUid());

        $principal->setDisplayUid('5');
        $this->assertEquals(5, $principal->getDisplayUid());
    }

    public function testPrincipalId()
    {
        $principal = Principal::instance();

        $principal->setPrincipalId(5);
        $this->assertEquals(5, $principal->getPrincipalId());

        $principal->setPrincipalId('5');
        $this->assertEquals(5, $principal->getPrincipalId());
    }

    public function testIsPrimary()
    {
        $principal = Principal::instance();

        $principal->setIsPrimary(true);
        $this->assertTrue($principal->getIsPrimary());

        $principal->setIsPrimary(1);
        $this->assertTrue($principal->getIsPrimary());

        $principal->setIsPrimary('true');
        $this->assertTrue($principal->getIsPrimary());

        $principal->setIsPrimary('on');
        $this->assertTrue($principal->getIsPrimary());

        $principal->setIsPrimary(false);
        $this->assertFalse($principal->getIsPrimary());

        $principal->setIsPrimary(0);
        $this->assertFalse($principal->getIsPrimary());

        $principal->setIsPrimary('false');
        $this->assertFalse($principal->getIsPrimary());

        $principal->setIsPrimary('off');
        $this->assertFalse($principal->getIsPrimary());
    }

    public function testType()
    {
        $principal = Principal::instance()
            ->setType(Principal::TYPE_ADMINS);

        $this->assertEquals(Principal::TYPE_ADMINS, $principal->getType());
    }

    public function testTypeInvalid()
    {
        $this->expectException(DomainException::class);

        Principal::instance()
            ->setType('not implemented');
    }

    public function testHasChildren()
    {
        $principal = Principal::instance();

        $principal->setHasChildren(true);
        $this->assertTrue($principal->getHasChildren());

        $principal->setHasChildren(1);
        $this->assertTrue($principal->getHasChildren());

        $principal->setHasChildren('true');
        $this->assertTrue($principal->getHasChildren());

        $principal->setHasChildren('on');
        $this->assertTrue($principal->getHasChildren());

        $principal->setHasChildren(false);
        $this->assertFalse($principal->getHasChildren());

        $principal->setHasChildren(0);
        $this->assertFalse($principal->getHasChildren());

        $principal->setHasChildren('false');
        $this->assertFalse($principal->getHasChildren());

        $principal->setHasChildren('off');
        $this->assertFalse($principal->getHasChildren());
    }

    public function testPermissionId()
    {
        $principal = Principal::instance()
            ->setPermissionId(Principal::TYPE_ADMINS);

        $this->assertEquals(Principal::TYPE_ADMINS, $principal->getPermissionId());
    }

    public function testTrainingGroupId()
    {
        $principal = Principal::instance();

        $principal->setTrainingGroupId(5);
        $this->assertEquals(5, $principal->getTrainingGroupId());

        $principal->setTrainingGroupId('5');
        $this->assertEquals(5, $principal->getTrainingGroupId());
    }

    public function testIsEcommerce()
    {
        $principal = Principal::instance();

        $principal->setIsEcommerce(true);
        $this->assertTrue($principal->getIsEcommerce());

        $principal->setIsEcommerce(1);
        $this->assertTrue($principal->getIsEcommerce());

        $principal->setIsEcommerce('true');
        $this->assertTrue($principal->getIsEcommerce());

        $principal->setIsEcommerce('on');
        $this->assertTrue($principal->getIsEcommerce());

        $principal->setIsEcommerce(false);
        $this->assertFalse($principal->getIsEcommerce());

        $principal->setIsEcommerce(0);
        $this->assertFalse($principal->getIsEcommerce());

        $principal->setIsEcommerce('false');
        $this->assertFalse($principal->getIsEcommerce());

        $principal->setIsEcommerce('off');
        $this->assertFalse($principal->getIsEcommerce());
    }

    public function testIsHidden()
    {
        $principal = Principal::instance();

        $principal->setIsHidden(true);
        $this->assertTrue($principal->getIsHidden());

        $principal->setIsHidden(1);
        $this->assertTrue($principal->getIsHidden());

        $principal->setIsHidden('true');
        $this->assertTrue($principal->getIsHidden());

        $principal->setIsHidden('on');
        $this->assertTrue($principal->getIsHidden());

        $principal->setIsHidden(false);
        $this->assertFalse($principal->getIsHidden());

        $principal->setIsHidden(0);
        $this->assertFalse($principal->getIsHidden());

        $principal->setIsHidden('false');
        $this->assertFalse($principal->getIsHidden());

        $principal->setIsHidden('off');
        $this->assertFalse($principal->getIsHidden());
    }

    public function testDescription()
    {
        $principal = Principal::instance()
            ->setDescription('Description');

        $this->assertEquals('Description', $principal->getDescription());
    }

    public function testAccountId()
    {
        $principal = Principal::instance();

        $principal->setAccountId(5);
        $this->assertEquals(5, $principal->getAccountId());

        $principal->setAccountId('5');
        $this->assertEquals(5, $principal->getAccountId());
    }

    public function testDisabled()
    {
        $principal = Principal::instance();

        $principal->setDisabled(true);
        $this->assertTrue($principal->getDisabled());

        $principal->setDisabled(1);
        $this->assertTrue($principal->getDisabled());

        $principal->setDisabled('true');
        $this->assertTrue($principal->getDisabled());

        $principal->setDisabled('on');
        $this->assertTrue($principal->getDisabled());

        $principal->setDisabled(false);
        $this->assertFalse($principal->getDisabled());

        $principal->setDisabled(0);
        $this->assertFalse($principal->getDisabled());

        $principal->setDisabled('false');
        $this->assertFalse($principal->getDisabled());

        $principal->setDisabled('off');
        $this->assertFalse($principal->getDisabled());
    }

    public function testEmail()
    {
        $principal = Principal::instance()
            ->setEmail('email@email.com');

        $this->assertEquals('email@email.com', $principal->getEmail());
    }

    public function testFirstName()
    {
        $principal = Principal::instance()
            ->setFirstName('FirstName');

        $this->assertEquals('FirstName', $principal->getFirstName());
    }

    public function testLastName()
    {
        $principal = Principal::instance()
            ->setLastName('LastName');

        $this->assertEquals('LastName', $principal->getLastName());
    }

    public function testPassword()
    {
        $principal = Principal::instance()
            ->setPassword('Password');

        $this->assertEquals('Password', $principal->getPassword());
    }

    public function testSendEmail()
    {
        $principal = Principal::instance();

        $principal->setSendEmail(true);
        $this->assertTrue($principal->getSendEmail());

        $principal->setSendEmail(1);
        $this->assertTrue($principal->getSendEmail());

        $principal->setSendEmail('true');
        $this->assertTrue($principal->getSendEmail());

        $principal->setSendEmail('on');
        $this->assertTrue($principal->getSendEmail());

        $principal->setSendEmail(false);
        $this->assertFalse($principal->getSendEmail());

        $principal->setSendEmail(0);
        $this->assertFalse($principal->getSendEmail());

        $principal->setSendEmail('false');
        $this->assertFalse($principal->getSendEmail());

        $principal->setSendEmail('off');
        $this->assertFalse($principal->getSendEmail());
    }

    public function testToArrayForUser()
    {
        $principal = Principal::instance()
            ->setType(Principal::TYPE_USER)
            ->setHasChildren(false)
            ->setPrincipalId(1)
            ->setFirstName('FirstName')
            ->setLastName('LasName')
            ->setLogin('Login')
            ->setPassword('Password')
            ->setEmail('E-Mail')
            ->setSendEmail(false)
            ->setName('Name')
            ->setDescription('Description');

        $this->assertEquals(
            [
                'type'         => Principal::TYPE_USER,
                'has-children' => 'false',
                'principal-id' => '1',
                'first-name'   => 'FirstName',
                'last-name'    => 'LasName',
                'login'        => 'Login',
                'password'     => 'Password',
                'email'        => 'E-Mail',
                'send-email'   => 'false',
            ],
            $principal->toArray()
        );
    }

    public function testToArrayForGroup()
    {
        $principal = Principal::instance()
            ->setType(Principal::TYPE_GROUP)
            ->setHasChildren(true)
            ->setPrincipalId(1)
            ->setFirstName('FirstName')
            ->setLastName('LastName')
            ->setLogin('Login')
            ->setPassword('Password')
            ->setEmail('E-Mail')
            ->setSendEmail(false)
            ->setName('Name')
            ->setDescription('Description');

        $this->assertEquals(
            [
                'type'         => Principal::TYPE_GROUP,
                'has-children' => 'true',
                'principal-id' => '1',
                'name'         => 'Name',
                'description'  => 'Description',
            ],
            $principal->toArray()
        );
    }

    /**
     * @todo Create toArray for all types
     */
    public function testToArrayForNotImplementedTypes()
    {
        $principal = Principal::instance()
            ->setType(Principal::TYPE_AUTHORS)
            ->setHasChildren(false)
            ->setPrincipalId(1)
            ->setFirstName('FirstName')
            ->setLastName('LasName')
            ->setLogin('Login')
            ->setPassword('Password')
            ->setEmail('E-Mail')
            ->setSendEmail(false)
            ->setName('Name')
            ->setDescription('Description');

        $this->assertEquals([], $principal->toArray());
    }

    public function testFixNameByType()
    {
        $principal = new Principal();

        $principal->setName('Foo Bar');
        $principal->setType(Principal::TYPE_USER);

        $this->assertEquals(
            [
                'Foo',
                'Bar',
            ],
            [
                $principal->getFirstName(),
                $principal->getLastName(),
            ]
        );
    }

    public function testIsMember()
    {
        $principal = Principal::instance();

        $principal->setIsMember(true);
        $this->assertTrue($principal->getIsMember());

        $principal->setIsMember(1);
        $this->assertTrue($principal->getIsMember());

        $principal->setIsMember('true');
        $this->assertTrue($principal->getIsMember());

        $principal->setIsMember('on');
        $this->assertTrue($principal->getIsMember());

        $principal->setIsMember(false);
        $this->assertFalse($principal->getIsMember());

        $principal->setIsMember(0);
        $this->assertFalse($principal->getIsMember());

        $principal->setIsMember('false');
        $this->assertFalse($principal->getIsMember());

        $principal->setIsMember('off');
        $this->assertFalse($principal->getIsMember());
    }

    public function testFluentInterface()
    {
        $principal = Principal::instance();

        $this->assertInstanceOf(Principal::class, $principal->setName('field'));
        $this->assertInstanceOf(Principal::class, $principal->setLogin('field'));
        $this->assertInstanceOf(Principal::class, $principal->setDisplayUid(1));
        $this->assertInstanceOf(Principal::class, $principal->setPrincipalId(1));
        $this->assertInstanceOf(Principal::class, $principal->setIsPrimary(true));
        $this->assertInstanceOf(Principal::class, $principal->setType(Principal::TYPE_USER));
        $this->assertInstanceOf(Principal::class, $principal->setHasChildren(false));
        $this->assertInstanceOf(Principal::class, $principal->setPermissionId(Principal::TYPE_ADMINS));
        $this->assertInstanceOf(Principal::class, $principal->setTrainingGroupId(1));
        $this->assertInstanceOf(Principal::class, $principal->setIsEcommerce(false));
        $this->assertInstanceOf(Principal::class, $principal->setIsHidden(false));
        $this->assertInstanceOf(Principal::class, $principal->setDescription('field'));
        $this->assertInstanceOf(Principal::class, $principal->setAccountId(1));
        $this->assertInstanceOf(Principal::class, $principal->setDisabled(false));
        $this->assertInstanceOf(Principal::class, $principal->setEmail('email@email.com'));
        $this->assertInstanceOf(Principal::class, $principal->setFirstName('field'));
        $this->assertInstanceOf(Principal::class, $principal->setLastName('field'));
        $this->assertInstanceOf(Principal::class, $principal->setPassword('field'));
        $this->assertInstanceOf(Principal::class, $principal->setSendEmail(false));
    }
}
