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

use CPSIT\Persons\Domain\Model\Dto\OrderAwareDemandTrait;
use Nimut\TestingFramework\TestCase\UnitTestCase;

/**
 * Class OrderAwareDemandTraitTest
 */
class OrderAwareDemandTraitTest extends UnitTestCase
{
    /**
     * @var OrderAwareDemandTrait
     */
    protected $subject;

    public function setUp()
    {
        $this->subject = $this->getMockForTrait(
            OrderAwareDemandTrait::class
        );
    }

    /**
     * @test
     */
    public function getOrderInitiallyReturnsNull()
    {
        $this->assertNull(
            $this->subject->getOrder()
        );
    }

    /**
     * @test
     */
    public function orderCanBeSet()
    {
        $order = 'foo|bar';
        $this->subject->setOrder($order);

        $this->assertSame(
            $order,
            $this->subject->getOrder()
        );
    }
}
