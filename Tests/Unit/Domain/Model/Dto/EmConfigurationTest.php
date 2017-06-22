<?php


namespace CPSIT\Persons\Tests\Unit\Domain\Model\Dto;

use CPSIT\Persons\Domain\Model\Dto\EmConfiguration;
use Nimut\TestingFramework\TestCase\UnitTestCase;

/**
 * Class EmConfigurationTest
 */
class EmConfigurationTest extends UnitTestCase
{
    /**
     * @var EmConfiguration | \PHPUnit_Framework_MockObject_MockObject
     */
    protected $subject;

    /**
     * set up the subject
     */
    public function setUp()
    {
        $this->subject = $this->getMockBuilder(EmConfiguration::class)
            ->setMethods(['dummy'])->disableOriginalConstructor()->getMock();
    }

    /**
     * @test
     */
    public function getStatusRootCategoryInitiallyReturnsZero()
    {
        $this->assertSame(
            0,
            $this->subject->getStatusRootCategoryId()
        );
    }

    /**
     * @test
     */
    public function statusRootCategoryCanBeSet()
    {
        $category = 15;
        $this->subject->setStatusRootCategoryId($category);

        $this->assertSame(
            $category,
            $this->subject->getStatusRootCategoryId()
        );
    }

    /**
     * @test
     */
    public function getDepartmentRootCategoryInitiallyReturnsZero()
    {
        $this->assertSame(
            0,
            $this->subject->getDepartmentRootCategoryId()
        );
    }

    /**
     * @test
     */
    public function departmentRootCategoryCanBeSet()
    {
        $category = 15;
        $this->subject->setDepartmentRootCategoryId($category);

        $this->assertSame(
            $category,
            $this->subject->getDepartmentRootCategoryId()
        );
    }
}
