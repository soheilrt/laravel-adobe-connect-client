<?php

namespace Soheilrt\AdobeConnectClient\Tests\Unit\CustomEntities;

use Soheilrt\AdobeConnectClient\Tests\CustomEntities\CustomPrincipal;
use Soheilrt\AdobeConnectClient\Tests\CustomEntities\CustomSCO;
use Soheilrt\AdobeConnectClient\Tests\TestCase;

class CustomPrincipalTest extends TestCase
{

    /**
     * @var CustomSCO
     * */
    protected $principal;

    public function testInstanceOf()
    {
        $this->assertInstanceOf(CustomPrincipal::class, $this->principal);
    }

    public function testMagicAttributeSetter()
    {
        $this->principal->magicAttribute = "magic test";
        $this->assertEquals('magic test', $this->principal->getMagicAttribute());
    }

    public function testCustomAttributeSetter()
    {
        $returnValue = $this->principal->setCustomAttribute("customValue");
        $this->assertEquals($this->principal, $returnValue);
        $this->assertEquals("customValue", $this->principal->customAttribute);
    }

    public function testParseValueOnSet()
    {
        $this->principal->setTestParseValue('1234');
        $this->assertIsInt($this->principal->testParseValue);
        $this->assertEquals(1234, $this->principal->testParseValue);
    }

    public function testParseValueOnGet()
    {
        $this->principal->ParseOnGet = 1234;
        $this->assertIsString($this->principal->parseOnGet);
    }

    public function testSkipGetterWithParameter()
    {
        $this->principal->setSkipParseOnGet("test");
        $this->assertEquals("test", $this->principal->SkipParseOnGet);
    }

    protected function setUp(): void
    {
        parent::setUp();
        $this->principal = config('adobeConnect.entities.sco-record')::instance();
    }

    protected function getEnvironmentSetUp($app)
    {
        parent::getEnvironmentSetUp($app);
        $app["config"]->set("adobeConnect.entities.sco-record", CustomPrincipal::class);
    }

}
