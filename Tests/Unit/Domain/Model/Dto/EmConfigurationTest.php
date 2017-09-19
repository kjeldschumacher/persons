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

}
