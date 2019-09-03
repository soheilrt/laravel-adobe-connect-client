<?php

namespace Soheilrt\AdobeConnectClient\Tests\Unit\Connection\Curl;

use PHPUnit\Framework\TestCase;
use Soheilrt\AdobeConnectClient\Client\Connection\Curl\Stream;
use Soheilrt\AdobeConnectClient\Client\Connection\StreamInterface;

class StreamTest extends TestCase
{
    public function testStreamInterface()
    {
        $stream = new Stream('');
        $this->assertInstanceOf(StreamInterface::class, $stream);
    }

    public function testToString()
    {
        $stream = new Stream('Hello');
        $this->assertEquals('Hello', (string) $stream);
    }
}
