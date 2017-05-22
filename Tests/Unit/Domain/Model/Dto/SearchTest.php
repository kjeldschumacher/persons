<?php

namespace CPSIT\Persons\Tests;

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
use Nimut\TestingFramework\TestCase\UnitTestCase;

/**
 * Test case for class \CPSIT\Persons\Domain\Model\Dto\Search.
 */
class SearchTest extends UnitTestCase
{
    /**
     * @var \CPSIT\Persons\Domain\Model\Dto\Search
     */
    protected $subject;

    public function setUp()
    {
        $this->subject = new \CPSIT\Persons\Domain\Model\Dto\Search();
    }

    /**
     * @test
     */
    public function getSubjectReturnsInitialValueForString()
    {
        $this->assertNull($this->subject->getSubject());
    }

    /**
     * @test
     */
    public function setSubjectForStringSetsSubject()
    {
        $this->subject->setSubject('ping');
        $this->assertSame('ping', $this->subject->getSubject());
    }

    /**
     * @test
     */
    public function getFieldsReturnsInitialValueForString()
    {
        $this->assertNull($this->subject->getFields());
    }

    /**
     * @test
     */
    public function setFieldsForStringSetsFields()
    {
        $this->subject->setFields('ping');
        $this->assertSame('ping', $this->subject->getFields());
    }
}
