<?php

namespace Soheilrt\AdobeConnectClient\Tests\Unit;

use PHPUnit\Framework\TestCase;
use Soheilrt\AdobeConnectClient\Client\Contracts\ArrayableInterface;
use Soheilrt\AdobeConnectClient\Client\Parameter;

class ParameterTest extends TestCase
{
    public function testInstance()
    {
        $this->assertInstanceOf(Parameter::class, Parameter::instance());
    }

    public function testArrayable()
    {
        $this->assertInstanceOf(ArrayableInterface::class, Parameter::instance());
    }

    public function testSet()
    {
        $parameter = Parameter::instance();

        $parameter->set('scoId', 1);
        $expected = ['sco-id' => 1];
        $this->assertEquals($expected, $parameter->toArray());

        $parameter->set('name', 'test');
        $expected['name'] = 'test';
        $this->assertEquals($expected, $parameter->toArray());

        return $parameter;
    }

    /**
     * @depends testSet
     *
     * @param Parameter $parameter
     */
    public function testRemove(Parameter $parameter)
    {
        $parameter->remove('scoId');
        $expected = ['name' => 'test'];
        $this->assertEquals($expected, $parameter->toArray());

        $parameter->remove('name');
        $expected = [];
        $this->assertEquals($expected, $parameter->toArray());
    }

    public function testFluentInterface()
    {
        $parameter = Parameter::instance();
        $this->assertInstanceOf(Parameter::class, $parameter->set('parameter', 'value'));
        $this->assertInstanceOf(Parameter::class, $parameter->remove('parameter'));
    }
}
