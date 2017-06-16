<?php
namespace CPSIT\Persons\Tests\Unit\Controller;

use CPSIT\Persons\Domain\Model\Person;
use CPSIT\Persons\Domain\Repository\PersonRepository;
use Nimut\TestingFramework\TestCase\UnitTestCase;
use TYPO3\CMS\Extbase\Mvc\View\ViewInterface;
use TYPO3\CMS\Extbase\Persistence\ObjectStorage;

/**
 * Test case.
 *
 * @author Dirk Wenzel <wenzel@cps-it.de>
 */
class PersonControllerTest extends UnitTestCase
{
    /**
     * @var \CPSIT\Persons\Controller\PersonController
     */
    protected $subject = null;

    protected function setUp()
    {
        parent::setUp();
        $this->subject = $this->getMockBuilder(\CPSIT\Persons\Controller\PersonController::class)
            ->setMethods(['redirect', 'forward', 'addFlashMessage'])
            ->disableOriginalConstructor()
            ->getMock();
    }

    protected function tearDown()
    {
        parent::tearDown();
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

        $view = $this->getMockBuilder(ViewInterface::class)->getMock();
        $view->expects(self::once())->method('assign')->with('persons', $allPersons);
        $this->inject($this->subject, 'view', $view);

        $this->subject->listAction();
    }

    /**
     * @test
     */
    public function showActionAssignsTheGivenPersonToView()
    {
        $person = new Person();

        $view = $this->getMockBuilder(ViewInterface::class)->getMock();
        $this->inject($this->subject, 'view', $view);
        $view->expects(self::once())->method('assign')->with('person', $person);

        $this->subject->showAction($person);
    }

    /**
     * @test
     */
    public function showSelectedActionFetchesRecordListAndAssignsResultToView(){
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

        $view = $this->getMockBuilder(ViewInterface::class)->getMock();
        $view->expects($this->once())
            ->method('assign')
            ->with('persons', $persons);

        $this->inject($this->subject, 'view', $view);

        $this->subject->showSelectedAction();
    }
}
