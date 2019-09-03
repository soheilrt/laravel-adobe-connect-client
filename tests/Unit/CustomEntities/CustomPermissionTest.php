<?php

namespace Soheilrt\AdobeConnectClient\Tests\Unit\CustomEntities;

use Soheilrt\AdobeConnectClient\Tests\CustomEntities\CustomPermission;
use Soheilrt\AdobeConnectClient\Tests\CustomEntities\CustomSCO;
use Soheilrt\AdobeConnectClient\Tests\TestCase;

class CustomPermissionTest extends TestCase
{

    /**
     * @var CustomSCO
     * */
    protected $permission;

    public function testInstanceOf()
    {
        $this->assertInstanceOf(CustomPermission::class, $this->permission);
    }

    public function testMagicAttributeSetter()
    {
        $this->permission->magicAttribute = "magic test";
        $this->assertEquals('magic test', $this->permission->getMagicAttribute());
    }

    public function testCustomAttributeSetter()
    {
        $returnValue = $this->permission->setCustomAttribute("customValue");
        $this->assertEquals($this->permission, $returnValue);
        $this->assertEquals("customValue", $this->permission->customAttribute);
    }

    public function testParseValueOnSet()
    {
        $this->permission->setTestParseValue('1234');
        $this->assertIsInt($this->permission->testParseValue);
        $this->assertEquals(1234, $this->permission->testParseValue);
    }

    public function testParseValueOnGet()
    {
        $this->permission->ParseOnGet = 1234;
        $this->assertIsString($this->permission->parseOnGet);
    }

    public function testSkipGetterWithParameter()
    {
        $this->permission->setSkipParseOnGet("test");
        $this->assertEquals("test", $this->permission->SkipParseOnGet);
    }

    protected function setUp(): void
    {
        parent::setUp();
        $this->permission = config('adobeConnect.entities.sco-record')::instance();
    }

    protected function getEnvironmentSetUp($app)
    {
        parent::getEnvironmentSetUp($app);
        $app["config"]->set("adobeConnect.entities.sco-record", CustomPermission::class);
    }

}
