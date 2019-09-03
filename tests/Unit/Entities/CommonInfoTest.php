<?php

namespace Soheilrt\AdobeConnectClient\Tests\Unit;

use DateTime;
use DateTimeImmutable;
use PHPUnit\Framework\TestCase;
use Soheilrt\AdobeConnectClient\Client\Entities\CommonInfo;

class CommonInfoTest extends TestCase
{
    public function testLocale()
    {
        $commonInfo = new CommonInfo();

        $commonInfo->setLocale('pt-BR');
        $this->assertEquals('pt-BR', $commonInfo->getLocale());
    }

    public function testTimeZoneId()
    {
        $commonInfo = new CommonInfo();

        $commonInfo->setTimeZoneId(5);
        $this->assertEquals(5, $commonInfo->getTimeZoneId());

        $commonInfo->setTimeZoneId('10');
        $this->assertEquals(10, $commonInfo->getTimeZoneId());
    }

    public function testCookie()
    {
        $commonInfo = new CommonInfo();

        $commonInfo->setCookie('nbasdfoaasdfsaf');
        $this->assertEquals('nbasdfoaasdfsaf', $commonInfo->getCookie());
    }

    public function testDate()
    {
        $date = new DateTime();
        $commonInfo = new CommonInfo();

        $commonInfo->setDate($date);
        $this->assertInstanceOf(DateTimeImmutable::class, $commonInfo->getDate());
        $this->assertEquals($date->format(DateTime::W3C), $commonInfo->getDate()->format(DateTime::W3C));

        $commonInfo->setDate($date->format(DateTime::W3C));
        $this->assertInstanceOf(DateTimeImmutable::class, $commonInfo->getDate());
        $this->assertEquals($date->format(DateTime::W3C), $commonInfo->getDate()->format(DateTime::W3C));
    }

    public function testHost()
    {
        $commonInfo = new CommonInfo();

        $commonInfo->setHost('host');
        $this->assertEquals('host', $commonInfo->getHost());
    }

    public function testLocalHost()
    {
        $commonInfo = new CommonInfo();

        $commonInfo->setLocalHost('LocalHost');
        $this->assertEquals('LocalHost', $commonInfo->getLocalHost());
    }

    public function testAdminHost()
    {
        $commonInfo = new CommonInfo();

        $commonInfo->setAdminHost('AdminHost');
        $this->assertEquals('AdminHost', $commonInfo->getAdminHost());
    }

    public function testUrl()
    {
        $commonInfo = new CommonInfo();

        $commonInfo->setUrl('Url');
        $this->assertEquals('Url', $commonInfo->getUrl());
    }

    public function testVersion()
    {
        $commonInfo = new CommonInfo();

        $commonInfo->setVersion('Version');
        $this->assertEquals('Version', $commonInfo->getVersion());
    }

    public function testAccountId()
    {
        $commonInfo = new CommonInfo();

        $commonInfo->setAccountId(5);
        $this->assertEquals(5, $commonInfo->getAccountId());

        $commonInfo->setAccountId('10');
        $this->assertEquals(10, $commonInfo->getAccountId());
    }
}
