<?php

namespace Soheilrt\AdobeConnectClient\Tests\Unit\Commands;

use Soheilrt\AdobeConnectClient\Client\Client;
use Soheilrt\AdobeConnectClient\Tests\TestCase;
use Soheilrt\AdobeConnectClient\Tests\Unit\Connection\File\Connection;

abstract class TestCommandBase extends TestCase
{
    /**
     * @var Connection
     */
    protected $connection;

    /**
     * @var Client
     */
    protected $client;

    protected function setUp(): void
    {
        parent::setUp();

        $this->connection = new Connection();
        $this->client = new Client($this->connection);
    }

    protected function userLogin()
    {
        $this->client->setSession($this->connection->getSessionString());
    }

    protected function userLogout()
    {
        $this->client->setSession('');
    }
}
