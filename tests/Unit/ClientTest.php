<?php

namespace Soheilrt\AdobeConnectClient\Tests\Unit;

use BadMethodCallException;
use Soheilrt\AdobeConnectClient\Client\Client;
use Soheilrt\AdobeConnectClient\Tests\TestCase;
use Soheilrt\AdobeConnectClient\Tests\Unit\Connection\File\Connection;

class ClientTest extends TestCase
{
    /**
     * @var Connection
     */
    private $connection;

    public function testSession()
    {
        $client = new Client($this->connection);
        $client->setSession('sessionstring');

        $this->assertEquals('sessionstring', $client->getSession());
    }

    public function testCommandNotFound()
    {
        $client = new Client($this->connection);

        $this->expectException(BadMethodCallException::class);

        $client->notFoundCommand();
    }

    protected function setUp(): void
    {
        parent::setUp();
        $this->connection = new Connection();
    }
}
