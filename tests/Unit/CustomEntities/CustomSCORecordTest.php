<?php

namespace Soheilrt\AdobeConnectClient\Tests\Unit\CustomEntities;

use Soheilrt\AdobeConnectClient\Tests\CustomEntities\CustomSCO;
use Soheilrt\AdobeConnectClient\Tests\CustomEntities\CustomSCORecord;
use Soheilrt\AdobeConnectClient\Tests\TestCase;

class CustomSCORecordTest extends TestCase
{

    /**
     * @var CustomSCO
     * */
    protected $scoRecord;

    public function testInstanceOf()
    {
        $this->assertInstanceOf(CustomSCORecord::class, $this->scoRecord);
    }

    public function testMagicAttributeSetter()
    {
        $this->scoRecord->magicAttribute = "magic test";
        $this->assertEquals('magic test', $this->scoRecord->getMagicAttribute());
    }

    public function testCustomAttributeSetter()
    {
        $returnValue = $this->scoRecord->setCustomAttribute("customValue");
        $this->assertEquals($this->scoRecord, $returnValue);
        $this->assertEquals("customValue", $this->scoRecord->customAttribute);
    }

    public function testParseValueOnSet()
    {
        $this->scoRecord->setTestParseValue('1234');
        $this->assertIsInt($this->scoRecord->testParseValue);
        $this->assertEquals(1234, $this->scoRecord->testParseValue);
    }

    public function testParseValueOnGet()
    {
        $this->scoRecord->ParseOnGet = 1234;
        $this->assertIsString($this->scoRecord->parseOnGet);
    }

    public function testSkipGetterWithParameter()
    {
        $this->scoRecord->setSkipParseOnGet("test");
        $this->assertEquals("test", $this->scoRecord->SkipParseOnGet);
    }

    protected function setUp(): void
    {
        parent::setUp();
        $scoRecord = config('adobeConnect.entities.sco-record');
        $this->scoRecord = new $scoRecord();
    }

    protected function getEnvironmentSetUp($app)
    {
        parent::getEnvironmentSetUp($app);
        $app["config"]->set("adobeConnect.entities.sco-record", CustomSCORecord::class);
    }

}
