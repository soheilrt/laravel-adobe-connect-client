<?php

namespace Soheilrt\AdobeConnectClient\Tests\Unit;

use DateTime;
use DateTimeImmutable;
use PHPUnit\Framework\TestCase;
use Soheilrt\AdobeConnectClient\Client\Helpers\ValueTransform as VT;

class ValueTransformTest extends TestCase
{
    public function testToBoolean()
    {
        $this->assertTrue(VT::toBool(true));
        $this->assertTrue(VT::toBool(1));
        $this->assertTrue(VT::toBool('true'));
        $this->assertTrue(VT::toBool('on'));
        $this->assertTrue(VT::toBool('1'));

        $this->assertFalse(VT::toBool(false));
        $this->assertFalse(VT::toBool(0));
        $this->assertFalse(VT::toBool('false'));
        $this->assertFalse(VT::toBool('off'));
        $this->assertFalse(VT::toBool('0'));
    }

    public function testToDateTimeImmutable()
    {
        $dateTime = new DateTime();

        $this->assertInstanceOf(
            DateTimeImmutable::class,
            VT::toDateTimeImmutable($dateTime)
        );

        $this->assertInstanceOf(
            DateTimeImmutable::class,
            VT::toDateTimeImmutable(DateTimeImmutable::createFromMutable($dateTime))
        );

        $this->assertInstanceOf(
            DateTimeImmutable::class,
            VT::toDateTimeImmutable($dateTime->format(DateTime::W3C))
        );
    }

    public function testToString()
    {
        $this->assertEquals(
            'test',
            VT::toString('test')
        );

        $this->assertEquals(
            'true',
            VT::toString(true)
        );

        $this->assertEquals(
            'false',
            VT::toString(false)
        );

        $dateTimeImmutable = new DateTimeImmutable();

        $this->assertEquals(
            $dateTimeImmutable->format(DateTime::W3C),
            VT::toString($dateTimeImmutable)
        );

        $this->assertEquals(
            '1',
            VT::toString(1)
        );
    }
}
