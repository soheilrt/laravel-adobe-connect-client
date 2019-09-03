<?php

namespace Soheilrt\AdobeConnectClient\Tests\Unit\Converter;

use DomainException;
use PHPUnit\Framework\TestCase;
use Soheilrt\AdobeConnectClient\Client\Connection\Curl\Response;
use Soheilrt\AdobeConnectClient\Client\Connection\Curl\Stream;
use Soheilrt\AdobeConnectClient\Client\Converter\Converter;
use Soheilrt\AdobeConnectClient\Tests\Unit\Connection\File\Connection;

class ConverterTest extends TestCase
{
    public function testConvertListRecordings()
    {
        $connection = new Connection();

        $response = $connection->get([
            'action'    => 'list-recordings',
            'folder-id' => 1,
            'session'   => $connection->getSessionString(),
        ]);

        $rawData = Converter::convert($response);

        $this->assertNotEmpty($rawData);
        $this->assertEquals(13633, $rawData['recordings'][0]['scoId']);
    }

    public function testInvalidArgumentException()
    {
        $response = new Response(
            200,
            [
                'Content-Type' => ['application/json'],
            ],
            new Stream('')
        );

        $this->expectException(DomainException::class);

        Converter::convert($response);
    }
}
