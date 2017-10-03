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
    use PersonRepositoryTrait, SignalTrait;

    const SIGNAL_FILTER_ACTION_BEFORE_ASSIGN = 'filterBeforeAssign';
    const SIGNAL_LIST_ACTION_BEFORE_ASSIGN = 'listBeforeAssign';

    /**
     * action list
     *
     * @return void
     */
    public function listAction()
    {
        $persons = $this->personRepository->findAll();

        $templateVariables = [
            'persons' => $persons,
            'settings' => $this->settings
        ];
        $this->emitSignal(
            __CLASS__,
            static::SIGNAL_LIST_ACTION_BEFORE_ASSIGN,
            $templateVariables
        );
        $this->view->assignMultiple($templateVariables);
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

    /**
     * Action show selected
     * Displays one ore more persons selected in plugin
     */
    public function showSelectedAction()
    {
        $persons = $this->personRepository->findMultipleByUid($this->settings['selectedPersons']);
        $this->view->assign('persons', $persons);
    }

    /**
     * Action filter
     * Display filter for list view
     */
    public function filterAction()
    {
        $templateVariables = [
            'categories' => $this->settings['categories'],
            'visible' => $this->settings['visible'],
            'settings' => $this->settings
        ];

        $this->emitSignal(
            __CLASS__,
            static::SIGNAL_FILTER_ACTION_BEFORE_ASSIGN,
            $templateVariables
        );
        $this->view->assignMultiple($templateVariables);
    }
    
    /**
     * Assign content element and page data to all views.
     *
     * @param \TYPO3\CMS\Extbase\Mvc\View\ViewInterface $view The view to be initialized
     */
    protected function initializeView(\TYPO3\CMS\Extbase\Mvc\View\ViewInterface $view)
    {
        $view->assign('contentObjectData', $this->configurationManager->getContentObject()->data);
        if (is_object($GLOBALS['TSFE'])) {
            $view->assign('pageData', $GLOBALS['TSFE']->page);
        }
        parent::initializeView($view);
    }
}
