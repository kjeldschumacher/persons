<?php

namespace CPSIT\Persons\Tests\Unit\Domain\Repository;

/***
 *
 * This file is part of the "Persons" Extension for TYPO3 CMS.
 *
 * For the full copyright and license information, please read the
 * LICENSE.txt file that was distributed with this source code.
 *
 *  (c) 2017 Dirk Wenzel <wenzel@cps-it.de>
 *
 ***/

use CPSIT\Persons\Domain\Repository\PersonRepository;
use Nimut\TestingFramework\TestCase\UnitTestCase;
use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3\CMS\Extbase\Persistence\QueryInterface;
use TYPO3\CMS\Extbase\Persistence\RepositoryInterface;

/**
 * Class PersonRepositoryTest
 */
class PersonRepositoryTest extends UnitTestCase
{
    /**
     * @var PersonRepository|\PHPUnit_Framework_MockObject_MockObject
     */
    protected $subject;

    /**
     * set up the subject
     */
    public function setUp()
    {
        $this->subject = $this->getMockBuilder(PersonRepository::class)
            ->disableOriginalConstructor()->setMethods(['createQuery'])->getMock();
    }

    /**
     * provides data for testing creation of orderings
     */
    public function orderingsDataProvider()
    {
        return [
            // empty value, empty orderings
            ['', []],
            ['foo', ['foo' => QueryInterface::ORDER_ASCENDING]],
            ['foo|dEsC', ['foo' => QueryInterface::ORDER_DESCENDING]],
            ['foo|,bar|asc', ['foo' => QueryInterface::ORDER_ASCENDING, 'bar' => QueryInterface::ORDER_ASCENDING]],
        ];
    }

    /**
     * @test
     * @dataProvider orderingsDataProvider
     * @param string $orderList
     * @param array $expectedOrderings
     */
    public function createOrderingsFromDemandReturnsCorrectValues($orderList, $expectedOrderings)
    {
        $this->assertSame(
            $expectedOrderings,
            $this->subject->createOrderingsFromList($orderList)
        );
    }

    /**
     * @test
     */
    public function findMultipleByUidCreatesAndExecutesQuery() {
        $mockQuery = $this->getMockBuilder(QueryInterface::class)
            ->setMethods(['execute'])->getMockForAbstractClass();
        $this->subject->expects($this->once())->method('createQuery')
            ->will($this->returnValue($mockQuery));
        $mockQuery->expects($this->once())->method('execute');

        $this->subject->findMultipleByUid('');
    }

    /**
     * @test
     */
    public function findMultipleByUidMatchesIds() {
        $recordList = '3,5,1';
        $recordItems = GeneralUtility::trimExplode(',', $recordList, true);

        $mockQuery = $this->getMockBuilder(QueryInterface::class)
            ->setMethods(['execute', 'in', 'matching'])->getMockForAbstractClass();
        $this->subject->expects($this->once())->method('createQuery')
            ->will($this->returnValue($mockQuery));

        $mockQuery->expects($this->once())
            ->method('in')
            ->with('uid', $recordItems)
            ->will($this->returnValue($mockQuery));

        $mockQuery->expects($this->once())
            ->method('matching')
            ->with($mockQuery);

        $this->subject->findMultipleByUid($recordList);
    }

    /**
     * @test
     */
    public function findMultipleByUidSetsOrderings() {
        $recordList = '3,5,1';
        $orderList = 'foo';
        $orderings = ['foo' => QueryInterface::ORDER_ASCENDING];

        $mockQuery = $this->getMockBuilder(QueryInterface::class)
            ->setMethods(['execute', 'in', 'matching', 'setOrderings'])->getMockForAbstractClass();
        $this->subject->expects($this->once())->method('createQuery')
            ->will($this->returnValue($mockQuery));

        $mockQuery->expects($this->once())
            ->method('in')
            ->will($this->returnValue($mockQuery));

        $mockQuery->expects($this->once())
            ->method('matching')
            ->will($this->returnValue($mockQuery));

        $mockQuery->expects($this->once())
            ->method('setOrderings')
            ->with($orderings)
            ->will($this->returnValue($mockQuery));

        $this->subject->findMultipleByUid($recordList, $orderList);
    }
}
