<?php

namespace Soheilrt\AdobeConnectClient\Tests\Unit\Traits;


use Soheilrt\AdobeConnectClient\Tests\TestCase;

class FillableTraitTest extends TestCase
{
    public function test_fillable()
    {
        $values = ['a' => 1, 'b' => 'test value', 'c' => 'nothing else', 'd' => null];

        $fillableTestClass = $this->app->make(FillableTraitTestClass::class)->fill($values);

        $this->assertEquals($values['a'],$fillableTestClass->a);
        $this->assertEquals($values['b'],$fillableTestClass->b);
        $this->assertEquals($values['c'],$fillableTestClass->c);
        $this->assertEquals($values['d'],$fillableTestClass->d);
    }
}
