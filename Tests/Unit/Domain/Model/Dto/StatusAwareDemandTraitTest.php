<?php

namespace CPSIT\Persons\Tests\Unit\Domain\Model\Dto;

/**
 * This file is part of the "Persons" project.
 *
 * It is free software; you can redistribute it and/or modify it under
 * the terms of the GNU General Public License, either version 2
 * of the License, or any later version.
 *
 * For the full copyright and license information, please read the
 * LICENSE.txt file that was distributed with this source code.
 *
 * The TYPO3 project - inspiring people to share!
 */

use CPSIT\Persons\Domain\Model\Dto\StatusAwareDemandTrait;
use Nimut\TestingFramework\TestCase\UnitTestCase;

/**
 * Test case for class \CPSIT\Persons\Domain\Model\Dto\StatusAwareDemandTrait.
 */
class StatusAwareDemandTraitTest extends UnitTestCase
{
    /**
     * @var \CPSIT\Persons\Domain\Model\Dto\StatusAwareDemandTrait
     */
    protected $subject;

    public function setUp()
    {
        $this->subject = $this->getMockForTrait(
            StatusAwareDemandTrait::class
        );
    }

    /**
     * @test
     */
    public function getStatusReturnsInitialNull()
    {
        $this->assertSame(NULL, $this->subject->getStatus());
    }

    /**
     * @test
     */
    public function setStatusForCategorySetsStatus()
    {
        $status = new \TYPO3\CMS\Extbase\Domain\Model\Category();

        $this->subject->setStatus($status);

        $this->assertEquals($status, $this->subject->getStatus());
    }

    /**
     * @test
     */
    public function getStatusesReturnsInitialValueForString()
    {
        $this->assertNull($this->subject->getStatuses());
    }

    /**
     * @test
     */
    public function setStatusesForStringSetsStatuses()
    {
        $this->subject->setStatuses('foo');
        $this->assertSame(
            'foo',
            $this->subject->getStatuses()
        );
    }

    /**
     * @test
     */
    public function isExcludeSelectedStatusesInitiallyReturnsNull()
    {
        $this->assertNull(
            $this->subject->isExcludeSelectedStatuses()
        );
    }

    /**
     * @test
     */
    public function excludeSelectedStatusesCanBeSet()
    {
        $this->subject->setExcludeSelectedStatuses(true);
        $this->assertTrue(
            $this->subject->isExcludeSelectedStatuses()
        );
    }
}
