<?php

namespace Soheilrt\AdobeConnectClient\Tests\Unit\CustomEntities;

use Soheilrt\AdobeConnectClient\Tests\CustomEntities\CustomSCO;
use Soheilrt\AdobeConnectClient\Tests\TestCase;

class CustomSCOTest extends TestCase
{

    /**
     * @var CustomSCO
     * */
    protected $sco;

    public function testInstanceOf()
    {
        $this->assertInstanceOf(CustomSCO::class, $this->sco);
    }

    public function testMagicAttributeSetter()
    {
        $this->sco->magicAttribute = "magic test";
        $this->assertEquals('magic test', $this->sco->getMagicAttribute());
    }

    public function testCustomAttributeSetter()
    {
        $returnValue = $this->sco->SetCustomAttribute("customValue");
        $this->assertEquals($this->sco, $returnValue);
        $this->assertEquals("customValue", $this->sco->customAttribute);
    }

    public function testParseValueOnSet()
    {
        $this->sco->setTestParseValue('1234');
        $this->assertIsInt($this->sco->testParseValue);
        $this->assertEquals(1234, $this->sco->testParseValue);
    }

    public function testParseValueOnGet()
    {
        $this->sco->ParseOnGet = 1234;
        $this->assertIsString($this->sco->parseOnGet);
    }

    public function testSkipGetterWithParameter()
    {
        $this->sco->setSkipParseOnGet("test");
        $this->assertEquals("test", $this->sco->SkipParseOnGet);
    }

    protected function setUp(): void
    {
        parent::setUp();
        $this->sco = CustomSCO::instance();
    }

    protected function getEnvironmentSetUp($app)
    {
        parent::getEnvironmentSetUp($app);
        $app["config"]->set("adobeConnect.entities.sco", CustomSCO::class);
    }

}
