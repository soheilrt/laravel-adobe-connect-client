<?php

namespace Soheilrt\AdobeConnectClient\Tests\Unit\Traits;

use PHPUnit\Framework\TestCase;

class SetterTraitTest extends TestCase
{
    private $setter;

    public function test_has_property()
    {
        $this->assertTrue(isset($this->setter->privateProperty));
        $this->assertEquals('private property', $this->setter->privateProperty);

        $this->assertFalse(isset($this->setter->NotAvailableProperty));
        $this->assertNull($this->setter->NotAvailableProp);
    }

    public function test_has_attribute()
    {
        $this->assertTrue(isset($this->setter->property_attribute));
        $this->assertEquals('attribute value', $this->setter->property_attribute);

        $this->assertFalse(isset($this->setter->not_exists_attribute));
        $this->assertNull($this->setter->Not_exists_attribute);
    }

    public function test_getter()
    {
        $this->assertTrue(isset($this->setter->propertyGetter));
        $this->assertEquals('getter value', $this->setter->PropertyGetter);

        $this->assertFalse(isset($this->setter->propertyNotExistsGetter));
        $this->assertNull($this->setter->propertyNotExistsGetter);
    }

    protected function setUp(): void
    {
        parent::setUp();
        $this->setter = new SetterTraitTestClass();
    }
}

