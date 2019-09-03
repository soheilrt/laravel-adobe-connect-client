<?php

namespace Soheilrt\AdobeConnectClient\Tests\Unit\Connection\Curl;

use PHPUnit\Framework\TestCase;
use Soheilrt\AdobeConnectClient\Client\Connection\Curl\Response;
use Soheilrt\AdobeConnectClient\Client\Connection\Curl\Stream;
use Soheilrt\AdobeConnectClient\Client\Connection\ResponseInterface;

class ResponseTest extends TestCase
{
    /**
     * @var Response
     */
    protected $response = null;

    /**
     * @var Stream
     */
    protected $streamBody = null;

    /**
     * @var int
     */
    protected $statusCode = 0;

    /**
     * @var string
     */
    protected $reasonPhrase = '';

    /**
     * @var array
     */
    protected $headers = [];

    public function testResponseInterface()
    {
        $this->assertInstanceOf(ResponseInterface::class, $this->response);
    }

    public function testGetStatusCode()
    {
        $this->assertEquals($this->statusCode, $this->response->getStatusCode());
    }

    public function testGetReasonPhrase()
    {
        $this->assertEquals($this->reasonPhrase, $this->response->getReasonPhrase());
    }

    public function testGetBody()
    {
        $this->assertEquals($this->streamBody, $this->response->getBody());
    }

    public function testGetHeaders()
    {
        $this->assertEquals($this->headers, $this->response->getHeaders());
    }

    public function testGetHeader()
    {
        $this->assertEquals($this->headers['Content-Type'], $this->response->getHeader('Content-Type'));
        $this->assertEquals($this->headers['Content-Type'], $this->response->getHeader('content-type'));
        $this->assertEquals([], $this->response->getHeader('Set-Cookie'));
    }

    public function testGetHeaderLine()
    {
        $headerLine = reset($this->headers['Content-Type']);
        $this->assertEquals($headerLine, $this->response->getHeaderLine('Content-Type'));
    }

    protected function setUp()
    {
        parent::setUp();

        $this->streamBody = new Stream('Content');
        $this->statusCode = 200;
        $this->reasonPhrase = 'OK';
        $this->headers['Content-Type'] = ['text/xml'];

        $this->response = new Response($this->statusCode, $this->headers, $this->streamBody);
    }
}
