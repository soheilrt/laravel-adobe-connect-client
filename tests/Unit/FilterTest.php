<?php

namespace Soheilrt\AdobeConnectClient\Tests\Unit;

use DateTime;
use DateTimeImmutable;
use PHPUnit\Framework\TestCase;
use Soheilrt\AdobeConnectClient\Client\Contracts\ArrayableInterface;
use Soheilrt\AdobeConnectClient\Client\Filter;

class FilterTest extends TestCase
{
    public function testInstance()
    {
        $this->assertInstanceOf(Filter::class, Filter::instance());
    }

    public function testArrayable()
    {
        $this->assertInstanceOf(ArrayableInterface::class, Filter::instance());
    }

    public function testEquals()
    {
        $filter = Filter::instance();
        $expected = [];

        $filter->equals('name', 'Name');
        $expected['filter-name'] = 'Name';
        $this->assertEquals($expected, $filter->toArray());

        $filter->equals('scoId', 5);
        $expected['filter-sco-id'] = '5';
        $this->assertEquals($expected, $filter->toArray());
    }

    public function testLike()
    {
        $filter = Filter::instance();
        $expected = [];

        $filter->like('name', 'Name');
        $expected['filter-like-name'] = 'Name';
        $this->assertEquals($expected, $filter->toArray());

        $filter->like('scoId', 5);
        $expected['filter-like-sco-id'] = '5';
        $this->assertEquals($expected, $filter->toArray());
    }

    public function testOut()
    {
        $filter = Filter::instance();
        $expected = [];

        $filter->out('name', 'Name');
        $expected['filter-out-name'] = 'Name';
        $this->assertEquals($expected, $filter->toArray());

        $filter->out('scoId', 5);
        $expected['filter-out-sco-id'] = '5';
        $this->assertEquals($expected, $filter->toArray());
    }

    public function testRows()
    {
        $filter = Filter::instance()->rows(5);
        $this->assertEquals(['filter-rows' => '5'], $filter->toArray());
    }

    public function testStart()
    {
        $filter = Filter::instance()->start(10);
        $this->assertEquals(['filter-start' => '10'], $filter->toArray());
    }

    public function testIsMember()
    {
        $filter = Filter::instance()->isMember(true);
        $this->assertEquals(['filter-ismember' => 'true'], $filter->toArray());
    }

    public function testRemoveField()
    {
        $filter = Filter::instance();
        $expected = [];

        $filter->equals('name', 'Name');
        $expected['filter-name'] = 'Name';
        $this->assertEquals($expected, $filter->toArray());

        $filter->equals('scoId', 5);
        $expected['filter-sco-id'] = '5';
        $this->assertEquals($expected, $filter->toArray());

        $filter->removeField('name');
        unset($expected['filter-name']);
        $this->assertEquals($expected, $filter->toArray());

        $filter->removeField('scoId');
        unset($expected['filter-sco-id']);
        $this->assertEquals($expected, $filter->toArray());
    }

    public function testDateAfter()
    {
        $date = new DateTimeImmutable();
        $filter = Filter::instance();
        $expected = [];

        $filter->dateAfter('dateBegin', $date);
        $expected['filter-gte-date-begin'] = $date->format(DateTime::W3C);
        $this->assertEquals($expected, $filter->toArray());

        $filter->dateAfter('dateEnd', $date, false);
        $expected['filter-gt-date-end'] = $date->format(DateTime::W3C);
        $this->assertEquals($expected, $filter->toArray());
    }

    public function testDateBefore()
    {
        $date = new DateTimeImmutable();
        $filter = Filter::instance();
        $expected = [];

        $filter->dateBefore('dateBegin', $date);
        $expected['filter-lte-date-begin'] = $date->format(DateTime::W3C);
        $this->assertEquals($expected, $filter->toArray());

        $filter->dateBefore('dateEnd', $date, false);
        $expected['filter-lt-date-end'] = $date->format(DateTime::W3C);
        $this->assertEquals($expected, $filter->toArray());
    }

    public function testFluentInterface()
    {
        $filter = Filter::instance();
        $dateNow = new DateTimeImmutable();

        $this->assertInstanceOf(Filter::class, $filter->equals('field', 'value'));
        $this->assertInstanceOf(Filter::class, $filter->like('field', 'value'));
        $this->assertInstanceOf(Filter::class, $filter->out('field', 'value'));
        $this->assertInstanceOf(Filter::class, $filter->rows(1));
        $this->assertInstanceOf(Filter::class, $filter->start(1));
        $this->assertInstanceOf(Filter::class, $filter->dateAfter('dateBegin', $dateNow));
        $this->assertInstanceOf(Filter::class, $filter->dateBefore('dateBegin', $dateNow));
        $this->assertInstanceOf(Filter::class, $filter->isMember(true));
        $this->assertInstanceOf(Filter::class, $filter->removeField('field'));
    }
}
