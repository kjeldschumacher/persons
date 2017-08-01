<?php

namespace CPSIT\Persons\Tests\Unit\Controller;

use CPSIT\Persons\Domain\Model\Person;
use CPSIT\Persons\Domain\Repository\PersonRepository;
use Nimut\TestingFramework\TestCase\UnitTestCase;
use TYPO3\CMS\Extbase\Mvc\View\ViewInterface;
use TYPO3\CMS\Extbase\Persistence\ObjectStorage;

/**
 * Class PersonControllerTest
 */
class PersonControllerTest extends UnitTestCase
{
    /**
     * @var \CPSIT\Persons\Controller\PersonController|\PHPUnit_Framework_MockObject_MockObject
     */
    protected $subject = null;

    /**
     * @var ViewInterface|\PHPUnit_Framework_MockObject_MockObject
     */
    protected $view;

    protected function setUp()
    {
        parent::setUp();
        $this->subject = $this->getMockBuilder(\CPSIT\Persons\Controller\PersonController::class)
            ->setMethods(['redirect', 'forward', 'addFlashMessage'])
            ->disableOriginalConstructor()
            ->getMock();
        $this->view = $this->getMockBuilder(ViewInterface::class)
            ->setMethods(['assign'])->getMockForAbstractClass();
        $this->inject($this->subject, 'view', $this->view);
    }

    /**
     * @test
     */
    public function listActionFetchesAllPersonsFromRepositoryAndAssignsThemToView()
    {
        $allPersons = $this->getMockBuilder(ObjectStorage::class)
            ->disableOriginalConstructor()
            ->getMock();

        $personRepository = $this->getMockBuilder(PersonRepository::class)
            ->setMethods(['findAll'])
            ->disableOriginalConstructor()
            ->getMock();
        $personRepository->expects(self::once())->method('findAll')->will(self::returnValue($allPersons));
        $this->inject($this->subject, 'personRepository', $personRepository);

        $this->view->expects(self::once())->method('assign')
            ->with('persons', $allPersons);

        $this->subject->listAction();
    }

    /**
     * @test
     */
    public function showActionAssignsTheGivenPersonToView()
    {
        $person = new Person();
        $this->view->expects(self::once())->method('assign')->with('person', $person);

        $this->subject->showAction($person);
    }

    /**
     * @test
     */
    public function showSelectedActionFetchesRecordListAndAssignsResultToView()
    {
        $settings = [
            'selectedPersons' => '5,3,1'
        ];
        $this->inject(
            $this->subject,
            'settings',
            $settings
        );

        $persons = $this->getMockBuilder(ObjectStorage::class)
            ->disableOriginalConstructor()
            ->getMock();

        $personRepository = $this->getMockBuilder(PersonRepository::class)
            ->setMethods(['findMultipleByUid'])->disableOriginalConstructor()->getMock();

        $personRepository->expects($this->once())
            ->method('findMultipleByUid')
            ->with($settings['selectedPersons'])
            ->will($this->returnValue($persons));

        $this->inject($this->subject, 'personRepository', $personRepository);

        $this->view->expects($this->once())
            ->method('assign')
            ->with('persons', $persons);

        $this->subject->showSelectedAction();
    }

    /**
     * @test
     */
    public function filterActionAssignsOptions()
    {
        $settings = [
            'selected' => 'foo',
            'visible' => 'bar'
        ];

        $this->inject(
            $this->subject,
            'settings',
            $settings
        );

        $expectedOptions = [
            'options' => [
                'selected' => $settings['selected'],
                'visible' => $settings['visible']
            ]
        ];
        $this->view->expects($this->once())
            ->method('assign')
            ->with('configuration', $expectedOptions);

        $this->subject->filterAction();
    }
}
