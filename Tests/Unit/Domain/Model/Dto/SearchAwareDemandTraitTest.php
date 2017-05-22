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
use CPSIT\Persons\Domain\Model\Dto\Search;
use CPSIT\Persons\Domain\Model\Dto\SearchAwareDemandTrait;
use Nimut\TestingFramework\TestCase\UnitTestCase;

/**
 * Test case for class \CPSIT\Persons\Domain\Model\Dto\SearchAwareDemandTrait.
 */
class SearchAwareDemandTraitTest extends UnitTestCase
{
    /**
     * @var \CPSIT\Persons\Domain\Model\Dto\SearchAwareDemandTrait
     */
    protected $subject;

    public function setUp()
    {
        $this->subject = $this->getMockForTrait(SearchAwareDemandTrait::class);
    }

    /**
     * @test
     */
    public function getSearchInitiallyReturnsNull()
    {
        $this->assertNull(
            $this->subject->getSearch()
        );
    }

    /**
     * @test
     */
    public function setSearchForObjectSetsSearch()
    {
        $search = new Search();
        $this->subject->setSearch($search);

        $this->assertSame(
            $search,
            $this->subject->getSearch()
        );
    }
}
