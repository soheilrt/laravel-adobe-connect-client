<?php

namespace Soheilrt\AdobeConnectClient\Tests\Unit\Entities;

use DateInterval;
use DateTime;
use DateTimeImmutable;
use PHPUnit\Framework\TestCase;
use Soheilrt\AdobeConnectClient\Client\Contracts\ArrayableInterface;
use Soheilrt\AdobeConnectClient\Client\Entities\SCO;

class SCOTest extends TestCase
{
    public function testInstance()
    {
        $this->assertInstanceOf(SCO::class, SCO::instance());
    }

    public function testArrayable()
    {
        $this->assertInstanceOf(ArrayableInterface::class, SCO::instance());
    }

    public function testAccountId()
    {
        $sco = SCO::instance();

        $sco->setAccountId(1);
        $this->assertEquals(1, $sco->getAccountId());

        $sco->setAccountId('1');
        $this->assertEquals(1, $sco->getAccountId());
    }

    public function testDisabled()
    {
        $sco = SCO::instance();

        $sco->setDisabled(true);
        $this->assertTrue($sco->getDisabled());

        $sco->setDisabled(1);
        $this->assertTrue($sco->getDisabled());

        $sco->setDisabled('true');
        $this->assertTrue($sco->getDisabled());

        $sco->setDisabled('on');
        $this->assertTrue($sco->getDisabled());

        $sco->setDisabled(false);
        $this->assertFalse($sco->getDisabled());

        $sco->setDisabled(0);
        $this->assertFalse($sco->getDisabled());

        $sco->setDisabled('false');
        $this->assertFalse($sco->getDisabled());

        $sco->setDisabled('off');
        $this->assertFalse($sco->getDisabled());
    }

    public function testDisplaySeq()
    {
        $sco = SCO::instance();

        $sco->setDisplaySeq(1);
        $this->assertEquals(1, $sco->getDisplaySeq());

        $sco->setDisplaySeq('1');
        $this->assertEquals(1, $sco->getDisplaySeq());
    }

    public function testFolderId()
    {
        $sco = SCO::instance();

        $sco->setFolderId(1);
        $this->assertEquals(1, $sco->getFolderId());

        $sco->setFolderId('1');
        $this->assertEquals(1, $sco->getFolderId());
    }

    public function testIcon()
    {
        $sco = SCO::instance();

        $sco->setIcon('session');
        $this->assertEquals('session', $sco->getIcon());
    }

    public function testLang()
    {
        $sco = SCO::instance();

        $sco->setLang('en');
        $this->assertEquals('en', $sco->getLang());
    }

    public function testMaxRetries()
    {
        $sco = SCO::instance();

        $sco->setMaxRetries(1);
        $this->assertEquals(1, $sco->getMaxRetries());

        $sco->setMaxRetries('1');
        $this->assertEquals(1, $sco->getMaxRetries());
    }

    public function testScoId()
    {
        $sco = SCO::instance();

        $sco->setScoId(1);
        $this->assertEquals(1, $sco->getScoId());

        $sco->setScoId('1');
        $this->assertEquals(1, $sco->getScoId());
    }

    public function testSourceScoId()
    {
        $sco = SCO::instance();

        $sco->setSourceScoId(1);
        $this->assertEquals(1, $sco->getSourceScoId());

        $sco->setSourceScoId('1');
        $this->assertEquals(1, $sco->getSourceScoId());
    }

    public function testType()
    {
        $sco = SCO::instance();

        $sco->setType(SCO::TYPE_MEETING);
        $this->assertEquals(SCO::TYPE_MEETING, $sco->getType());
    }

    public function testVersion()
    {
        $sco = SCO::instance();

        $sco->setVersion('9.5.4');
        $this->assertEquals('9.5.4', $sco->getVersion());
    }

    public function testDateCreated()
    {
        $date = new DateTime();
        $sco = SCO::instance();

        $sco->setDateCreated($date);

        $this->assertInstanceOf(DateTimeImmutable::class, $sco->getDateCreated());
        $this->assertEquals($date, $sco->getDateCreated());

        $sco->setDateCreated($date->format(DateTime::W3C));

        $this->assertEquals(
            $date->format(DateTime::W3C),
            $sco->getDateCreated()->format(DateTime::W3C)
        );
    }

    public function testDateModified()
    {
        $date = new DateTime();
        $sco = SCO::instance();

        $sco->setDateModified($date);

        $this->assertInstanceOf(DateTimeImmutable::class, $sco->getDateModified());
        $this->assertEquals($date, $sco->getDateModified());

        $sco->setDateModified($date->format(DateTime::W3C));

        $this->assertEquals(
            $date->format(DateTime::W3C),
            $sco->getDateModified()->format(DateTime::W3C)
        );
    }

    public function testDescription()
    {
        $sco = SCO::instance();

        $sco->setDescription('Description');
        $this->assertEquals('Description', $sco->getDescription());
    }

    public function testName()
    {
        $sco = SCO::instance();

        $sco->setName('Name');
        $this->assertEquals('Name', $sco->getName());
    }

    public function testUrlPath()
    {
        $sco = SCO::instance();

        $sco->setUrlPath('/UrlPath/');
        $this->assertEquals('/UrlPath/', $sco->getUrlPath());
    }

    public function testDateBegin()
    {
        $date = new DateTime();
        $sco = SCO::instance();

        $sco->setDateBegin($date);

        $this->assertInstanceOf(DateTimeImmutable::class, $sco->getDateBegin());
        $this->assertEquals($date, $sco->getDateBegin());

        $sco->setDateBegin($date->format(DateTime::W3C));

        $this->assertEquals(
            $date->format(DateTime::W3C),
            $sco->getDateBegin()->format(DateTime::W3C)
        );
    }

    public function testDateEnd()
    {
        $date = new DateTime();
        $sco = SCO::instance();

        $sco->setDateEnd($date);

        $this->assertInstanceOf(DateTimeImmutable::class, $sco->getDateEnd());
        $this->assertEquals($date, $sco->getDateEnd());

        $sco->setDateEnd($date->format(DateTime::W3C));

        $this->assertEquals(
            $date->format(DateTime::W3C),
            $sco->getDateEnd()->format(DateTime::W3C)
        );
    }

    public function testMeetingPodsLayoutsLocked()
    {
        $sco = SCO::instance();

        $sco->setMeetingPodsLayoutsLocked(true);
        $this->assertTrue($sco->getMeetingPodsLayoutsLocked());

        $sco->setMeetingPodsLayoutsLocked(1);
        $this->assertTrue($sco->getMeetingPodsLayoutsLocked());

        $sco->setMeetingPodsLayoutsLocked('true');
        $this->assertTrue($sco->getMeetingPodsLayoutsLocked());

        $sco->setMeetingPodsLayoutsLocked('on');
        $this->assertTrue($sco->getMeetingPodsLayoutsLocked());

        $sco->setMeetingPodsLayoutsLocked(false);
        $this->assertFalse($sco->getMeetingPodsLayoutsLocked());

        $sco->setMeetingPodsLayoutsLocked(0);
        $this->assertFalse($sco->getMeetingPodsLayoutsLocked());

        $sco->setMeetingPodsLayoutsLocked('false');
        $this->assertFalse($sco->getMeetingPodsLayoutsLocked());

        $sco->setMeetingPodsLayoutsLocked('off');
        $this->assertFalse($sco->getMeetingPodsLayoutsLocked());
    }

    public function testUpdateLinkedItem()
    {
        $sco = SCO::instance();

        $sco->setUpdateLinkedItem(true);
        $this->assertTrue($sco->getUpdateLinkedItem());

        $sco->setUpdateLinkedItem(1);
        $this->assertTrue($sco->getUpdateLinkedItem());

        $sco->setUpdateLinkedItem('true');
        $this->assertTrue($sco->getUpdateLinkedItem());

        $sco->setUpdateLinkedItem('on');
        $this->assertTrue($sco->getUpdateLinkedItem());

        $sco->setUpdateLinkedItem(false);
        $this->assertFalse($sco->getUpdateLinkedItem());

        $sco->setUpdateLinkedItem(0);
        $this->assertFalse($sco->getUpdateLinkedItem());

        $sco->setUpdateLinkedItem('false');
        $this->assertFalse($sco->getUpdateLinkedItem());

        $sco->setUpdateLinkedItem('off');
        $this->assertFalse($sco->getUpdateLinkedItem());
    }

    public function testToArray()
    {
        $dateBegin = new DateTimeImmutable();
        $dateEnd = $dateBegin->add(new DateInterval('PT1H'));

        $sco = SCO::instance()
            ->setName('Name')
            ->setDateBegin($dateBegin)
            ->setDateEnd($dateEnd)
            ->setType(SCO::TYPE_MEETING);

        $this->assertEquals(
            [
                'name'       => 'Name',
                'date-begin' => $dateBegin->format(DateTime::W3C),
                'date-end'   => $dateEnd->format(DateTime::W3C),
                'type'       => SCO::TYPE_MEETING,
            ],
            $sco->toArray()
        );
    }

    public function testFluentInterface()
    {
        $sco = SCO::instance();
        $date = new DateTimeImmutable();

        $this->assertInstanceOf(SCO::class, $sco->setAccountId(1));
        $this->assertInstanceOf(SCO::class, $sco->setDisabled(true));
        $this->assertInstanceOf(SCO::class, $sco->setDisplaySeq(1));
        $this->assertInstanceOf(SCO::class, $sco->setFolderId(1));
        $this->assertInstanceOf(SCO::class, $sco->setIcon('archive'));
        $this->assertInstanceOf(SCO::class, $sco->setLang('en'));
        $this->assertInstanceOf(SCO::class, $sco->setMaxRetries(1));
        $this->assertInstanceOf(SCO::class, $sco->setScoId(1));
        $this->assertInstanceOf(SCO::class, $sco->setSourceScoId(1));
        $this->assertInstanceOf(SCO::class, $sco->setType(SCO::TYPE_MEETING));
        $this->assertInstanceOf(SCO::class, $sco->setVersion('9.5.4'));
        $this->assertInstanceOf(SCO::class, $sco->setDateCreated($date));
        $this->assertInstanceOf(SCO::class, $sco->setDateModified($date));
        $this->assertInstanceOf(SCO::class, $sco->setDescription('description'));
        $this->assertInstanceOf(SCO::class, $sco->setName('name'));
        $this->assertInstanceOf(SCO::class, $sco->setUrlPath('/urlpath/'));
        $this->assertInstanceOf(SCO::class, $sco->setDateBegin($date));
        $this->assertInstanceOf(SCO::class, $sco->setDateEnd($date));
        $this->assertInstanceOf(SCO::class, $sco->setMeetingPodsLayoutsLocked(false));
        $this->assertInstanceOf(SCO::class, $sco->setUpdateLinkedItem(false));
    }
}
