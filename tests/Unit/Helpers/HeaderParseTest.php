<?php

namespace Soheilrt\AdobeConnectClient\Tests\Unit;

use PHPUnit\Framework\TestCase;
use Soheilrt\AdobeConnectClient\Client\Helpers\HeaderParse;

class HeaderParseTest extends TestCase
{
    protected $cookieName = 'BREEZESESSION';
    protected $cookieValue = 'na9breezx3385yw9ymhhzb5p';
    protected $headerLine = '';

    public function testHeaderParseString()
    {
        $parsed = HeaderParse::parse($this->headerLine);
        $this->assertEquals($this->cookieValue, $parsed[0][$this->cookieName]);
    }

    public function testHeaderParseArray()
    {
        $parsed = HeaderParse::parse([$this->headerLine]);
        $this->assertEquals($this->cookieValue, $parsed[0][$this->cookieName]);
    }

    public function testHeaderParseArrayComma()
    {
        $parsed = HeaderParse::parse(
            [
                "{$this->cookieName}={$this->cookieValue},HttpOnly,domain=.adobeconnect.com,secure,path=/,t=a;b;c",
            ]
        );
        $this->assertEquals($this->cookieValue, $parsed[0][$this->cookieName]);
    }

    protected function setUp():void
    {
        parent::setUp();
        $this->headerLine = "{$this->cookieName}={$this->cookieValue};HttpOnly;domain=.adobeconnect.com;secure;path=/";
    }
}
