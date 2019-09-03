<?php

namespace Soheilrt\AdobeConnectClient\Tests\Unit\CustomEntities;

use Soheilrt\AdobeConnectClient\Tests\CustomEntities\CustomCommonInfo;
use Soheilrt\AdobeConnectClient\Tests\CustomEntities\CustomSCO;
use Soheilrt\AdobeConnectClient\Tests\TestCase;

class CustomCommonInfoTest extends TestCase
{

    /**
     * @var CustomSCO
     * */
    protected $commonInfo;

    public function testInstanceOf()
    {
        $this->assertInstanceOf(CustomCommonInfo::class, $this->commonInfo);
    }

    public function testMagicAttributeSetter()
    {
        $this->commonInfo->magicAttribute = "magic test";
        $this->assertEquals('magic test', $this->commonInfo->getMagicAttribute());
    }

    public function testCustomAttributeSetter()
    {
        $returnValue = $this->commonInfo->setCustomAttribute("customValue");
        $this->assertEquals($this->commonInfo, $returnValue);
        $this->assertEquals("customValue", $this->commonInfo->customAttribute);
    }

    public function testParseValueOnSet()
    {
        $this->commonInfo->setTestParseValue('1234');
        $this->assertIsInt($this->commonInfo->testParseValue);
        $this->assertEquals(1234, $this->commonInfo->testParseValue);
    }

    public function testParseValueOnGet()
    {
        $this->commonInfo->ParseOnGet = 1234;
        $this->assertIsString($this->commonInfo->parseOnGet);
    }

    public function testSkipGetterWithParameter()
    {
        $this->commonInfo->setSkipParseOnGet("test");
        $this->assertEquals("test", $this->commonInfo->SkipParseOnGet);
    }

    protected function setUp(): void
    {
        parent::setUp();
        $this->commonInfo = new CustomCommonInfo();
    }

    protected function getEnvironmentSetUp($app)
    {
        parent::getEnvironmentSetUp($app);
        $app["config"]->set("adobeConnect.entities.sco-record", CustomCommonInfo::class);
    }

}
