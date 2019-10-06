<?php

namespace Soheilrt\AdobeConnectClient\Tests\Entities;

use DateInterval;
use DateTime;
use DateTimeImmutable;
use InvalidArgumentException;
use PHPUnit\Framework\TestCase;
use Soheilrt\AdobeConnectClient\Client\Entities\SCORecord;

class SCORecordTest extends TestCase
{
    public function testScoId()
    {
        $record = new SCORecord();

        $record->setScoId(1);
        $this->assertEquals(1, $record->getScoId());

        $record->setScoId('1');
        $this->assertEquals(1, $record->getScoId());
    }

    public function testSourceScoId()
    {
        $record = new SCORecord();

        $record->setSourceScoId(1);
        $this->assertEquals(1, $record->getSourceScoId());

        $record->setSourceScoId('1');
        $this->assertEquals(1, $record->getSourceScoId());
    }

    public function testType()
    {
        $record = new SCORecord();

        $record->setType('content');
        $this->assertEquals('content', $record->getType());
    }

    public function testFolderId()
    {
        $record = new SCORecord();

        $record->setFolderId(1);
        $this->assertEquals(1, $record->getFolderId());

        $record->setFolderId('1');
        $this->assertEquals(1, $record->getFolderId());
    }

    public function testDisplaySeq()
    {
        $record = new SCORecord();

        $record->setDisplaySeq(1);
        $this->assertEquals(1, $record->getDisplaySeq());

        $record->setDisplaySeq('1');
        $this->assertEquals(1, $record->getDisplaySeq());
    }

    public function testJobId()
    {
        $record = new SCORecord();

        $record->setJobId(1);
        $this->assertEquals(1, $record->getJobId());

        $record->setJobId('1');
        $this->assertEquals(1, $record->getJobId());
    }

    public function testJobStatus()
    {
        $record = new SCORecord();

        $record->setJobStatus('in-progress');
        $this->assertEquals('in-progress', $record->getJobStatus());
    }

    public function testAccountId()
    {
        $record = new SCORecord();

        $record->setAccountId(1);
        $this->assertEquals(1, $record->getAccountId());

        $record->setAccountId('1');
        $this->assertEquals(1, $record->getAccountId());
    }

    public function testIsFolder()
    {
        $record = new SCORecord();

        $record->setIsFolder(true);
        $this->assertTrue($record->getIsFolder());

        $record->setIsFolder(1);
        $this->assertTrue($record->getIsFolder());

        $record->setIsFolder('true');
        $this->assertTrue($record->getIsFolder());

        $record->setIsFolder('on');
        $this->assertTrue($record->getIsFolder());

        $record->setIsFolder(false);
        $this->assertFalse($record->getIsFolder());

        $record->setIsFolder(0);
        $this->assertFalse($record->getIsFolder());

        $record->setIsFolder('false');
        $this->assertFalse($record->getIsFolder());

        $record->setIsFolder('off');
        $this->assertFalse($record->getIsFolder());
    }

    public function testEncoderServiceJobProgress()
    {
        $record = new SCORecord();

        $record->setEncoderServiceJobProgress(1);
        $this->assertEquals(1, $record->getEncoderServiceJobProgress());

        $record->setEncoderServiceJobProgress('1');
        $this->assertEquals(1, $record->getEncoderServiceJobProgress());
    }

    public function testNoOfDownloads()
    {
        $record = new SCORecord();

        $record->setNoOfDownloads(1);
        $this->assertEquals(1, $record->getNoOfDownloads());

        $record->setNoOfDownloads('1');
        $this->assertEquals(1, $record->getNoOfDownloads());
    }

    public function testIcon()
    {
        $record = new SCORecord();

        $record->setIcon('archive');
        $this->assertEquals('archive', $record->getIcon());
    }

    public function testName()
    {
        $record = new SCORecord();

        $record->setName('Name');
        $this->assertEquals('Name', $record->getName());
    }

    public function testUrlPath()
    {
        $record = new SCORecord();

        $record->setUrlPath('/urlpath/');
        $this->assertEquals('/urlpath/', $record->getUrlPath());
    }

    public function testDateBegin()
    {
        $date = new DateTime();
        $record = new SCORecord();

        $record->setDateBegin($date);

        $this->assertInstanceOf(DateTimeImmutable::class, $record->getDateBegin());
        $this->assertEquals($date, $record->getDateBegin());

        $record->setDateBegin($date->format(DateTime::W3C));
        $this->assertEquals(
            $date->format(DateTime::W3C),
            $record->getDateBegin()->format(DateTime::W3C)
        );
    }

    public function testDateEnd()
    {
        $date = new DateTime();
        $record = new SCORecord();

        $record->setDateEnd($date);

        $this->assertInstanceOf(DateTimeImmutable::class, $record->getDateEnd());
        $this->assertEquals($date, $record->getDateEnd());

        $record->setDateEnd($date->format(DateTime::W3C));
        $this->assertEquals(
            $date->format(DateTime::W3C),
            $record->getDateEnd()->format(DateTime::W3C)
        );
    }

    public function testDateCreated()
    {
        $date = new DateTime();
        $record = new SCORecord();

        $record->setDateCreated($date);

        $this->assertInstanceOf(DateTimeImmutable::class, $record->getDateCreated());
        $this->assertEquals($date, $record->getDateCreated());

        $record->setDateCreated($date->format(DateTime::W3C));
        $this->assertEquals(
            $date->format(DateTime::W3C),
            $record->getDateCreated()->format(DateTime::W3C)
        );
    }

    public function testDateModified()
    {
        $date = new DateTime();
        $record = new SCORecord();

        $record->setDateModified($date);

        $this->assertInstanceOf(DateTimeImmutable::class, $record->getDateModified());
        $this->assertEquals($date, $record->getDateModified());

        $record->setDateModified($date->format(DateTime::W3C));
        $this->assertEquals(
            $date->format(DateTime::W3C),
            $record->getDateModified()->format(DateTime::W3C)
        );
    }

    public function testDuration()
    {
        $record = new SCORecord();
        $duration = new DateInterval('PT01H20M10S');

        $record->setDuration($duration);
        $this->assertInstanceOf(DateInterval::class, $record->getDuration());
        $this->assertEquals($duration, $record->getDuration());

        $record->setDuration('01:20:10');
        $this->assertInstanceOf(DateInterval::class, $record->getDuration());
        $this->assertEquals($duration, $record->getDuration());
    }

    public function testDurationInvalid()
    {
        $this->expectException(InvalidArgumentException::class);

        $record = new SCORecord();
        $record->setDuration('invalid');
    }

    public function testFilename()
    {
        $record = new SCORecord();

        $record->setFilename('Filename');
        $this->assertEquals('Filename', $record->getFilename());
    }

    public function testFillable()
    {
        $values = ['a' => 1, 'b' => 'test value', 'c' => 'nothing else', 'd' => null];

        $scoRecord = app()->make(SCORecord::class)->fill($values);

        foreach ($values as $key => $value) {
            $this->assertEquals($value, $scoRecord->$key);
        }
    }
}
