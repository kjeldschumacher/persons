<?php
namespace CPSIT\Persons\Controller;

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

/**
 * PersonController
 */
class PersonController extends \TYPO3\CMS\Extbase\Mvc\Controller\ActionController
{
    /**
     * personRepository
     *
     * @var \CPSIT\Persons\Domain\Repository\PersonRepository
     * @inject
     */
    protected $personRepository = null;

    /**
     * action list
     *
     * @return void
     */
    public function listAction()
    {
        $persons = $this->personRepository->findAll();
        $this->view->assign('persons', $persons);
    }

    /**
     * action show
     *
     * @param \CPSIT\Persons\Domain\Model\Person $person
     * @return void
     */
    public function showAction(\CPSIT\Persons\Domain\Model\Person $person)
    {
        $this->view->assign('person', $person);
    }
}
