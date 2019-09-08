<?php

namespace Soheilrt\AdobeConnectClient\Tests\Unit\Connection\Curl;

use InvalidArgumentException;
use PHPUnit\Framework\TestCase;
use Soheilrt\AdobeConnectClient\Client\Connection\ConnectionInterface;
use Soheilrt\AdobeConnectClient\Client\Connection\Curl\Connection;
use Soheilrt\AdobeConnectClient\Client\Connection\ResponseInterface;
use SplFileInfo;
use UnexpectedValueException;

class ConnectionTest extends TestCase
{
    protected $host = 'https://test.adobeconnect.com/api/xml';

    protected $errorHost = 'https://error.adobeconnect.com/api/xml';

    public function testConnectionInterface()
    {
        $connection = new Connection($this->host);
        $this->assertInstanceOf(ConnectionInterface::class, $connection);

        return $connection;
    }

    public function testHostInvalid()
    {
        $this->expectException(InvalidArgumentException::class);
        new Connection('invalid-host');
    }

    public function testGet()
    {
        $connection = new Connection($this->host);
        $response = $connection->get();
        $this->assertInstanceOf(ResponseInterface::class, $response);
    }

    public function testPost()
    {
        $connection = new Connection($this->host);
        $response = $connection->post(
            [
                'invalid'      => 'string',
                'fileResource' => fopen(__DIR__ . '/ConnectionTest.php', 'r'),
                'SplFileInfo'  => new SplFileInfo(__DIR__ . '/ConnectionTest.php'),
            ]
        );
        $this->assertInstanceOf(ResponseInterface::class, $response);
    }

    public function testGetWithoutResponse()
    {
        $this->expectException(UnexpectedValueException::class);
        $connection = new Connection($this->errorHost);
        $connection->get();
    }

    public function testPostWithoutResponse()
    {
        $this->expectException(UnexpectedValueException::class);
        $connection = new Connection($this->errorHost);
        $connection->post([]);
    }

    protected function setUp():void
    {
        if (defined(TEST_CONNECTION_CURL)) {
            $this->markTestSkipped();
        }
    }
}
