<?php

namespace Soheilrt\AdobeConnectClient\Tests\Unit;

use PHPUnit\Framework\TestCase;
use Soheilrt\AdobeConnectClient\Client\Helpers\StringCaseTransform as SCT;

class StringCaseTransformTest extends TestCase
{
    public function testToCamelCase()
    {
        $this->assertEquals('scoId', SCT::toCamelCase('scoId'));
        $this->assertEquals('scoId', SCT::toCamelCase('ScoId'));
        $this->assertEquals('scoId', SCT::toCamelCase('sco-id'));
        $this->assertEquals('scoId', SCT::toCamelCase('sco_id'));
        $this->assertEquals('scoId', SCT::toCamelCase('sco id'));
    }

    public function testToUpperCamelCase()
    {
        $this->assertEquals('ScoId', SCT::toUpperCamelCase('scoId'));
        $this->assertEquals('ScoId', SCT::toUpperCamelCase('ScoId'));
        $this->assertEquals('ScoId', SCT::toUpperCamelCase('sco-id'));
        $this->assertEquals('ScoId', SCT::toUpperCamelCase('sco_id'));
        $this->assertEquals('ScoId', SCT::toUpperCamelCase('sco id'));
    }

    public function testToHyphen()
    {
        $this->assertEquals('sco-id', SCT::toHyphen('scoId'));
        $this->assertEquals('sco-id', SCT::toHyphen('ScoId'));
        $this->assertEquals('sco-id', SCT::toHyphen('sco-id'));
        $this->assertEquals('sco-id', SCT::toHyphen('sco_id'));
        $this->assertEquals('sco-id', SCT::toHyphen('sco id'));
    }

    public function testToDash()
    {
        $this->assertEquals('sco_id', SCT::toDash('scoId'));
        $this->assertEquals('sco_id', SCT::toDash('ScoId'));
        $this->assertEquals('sco_id', SCT::toDash('sco-id'));
        $this->assertEquals('sco_id', SCT::toDash('sco_id'));
        $this->assertEquals('sco_id', SCT::toDash('sco id'));
    }

    public function testToSpace()
    {
        $this->assertEquals('sco id', SCT::toSpace('scoId'));
        $this->assertEquals('sco id', SCT::toSpace('ScoId'));
        $this->assertEquals('sco id', SCT::toSpace('sco-id'));
        $this->assertEquals('sco id', SCT::toSpace('sco_id'));
        $this->assertEquals('sco id', SCT::toSpace('sco id'));
    }
}
