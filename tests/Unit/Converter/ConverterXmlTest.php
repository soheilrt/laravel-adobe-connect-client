<?php

namespace Soheilrt\AdobeConnectClient\Tests\Unit\Converter;

use InvalidArgumentException;
use PHPUnit\Framework\TestCase;
use Soheilrt\AdobeConnectClient\Client\Connection\Curl\Response;
use Soheilrt\AdobeConnectClient\Client\Connection\Curl\Stream;
use Soheilrt\AdobeConnectClient\Client\Converter\ConverterXML;
use Soheilrt\AdobeConnectClient\Tests\Unit\Connection\File\Connection;

class ConverterXmlTest extends TestCase
{
    public function testInvalidArgumentException()
    {
        $response = new Response(200, [], new Stream(''));

        $this->expectException(InvalidArgumentException::class);

        ConverterXML::convert($response);
    }

    public function testConvertListRecordings()
    {
        $connection = new Connection();

        $response = $connection->get([
            'action'    => 'list-recordings',
            'folder-id' => 1,
            'session'   => $connection->getSessionString(),
        ]);

        $rawData = ConverterXML::convert($response);

        $this->assertNotEmpty($rawData);
        $this->assertEquals(13633, $rawData['recordings'][0]['scoId']);
    }
}
