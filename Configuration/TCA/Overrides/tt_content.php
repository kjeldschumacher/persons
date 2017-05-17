<?php
defined('TYPO3_MODE') or die();

/**
 * register plugin
 */
\TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerPlugin(
    'CPSIT.Persons',
    'Persons',
    'LLL:EXT:persons/Resources/Private/Language/locallang_be.xlf:plugin.persons.title'
);
$GLOBALS['TCA']['tt_content']['types']['list']['subtypes_excludelist']['persons_persons'] = 'recursive,select_key';
$GLOBALS['TCA']['tt_content']['types']['list']['subtypes_addlist']['persons_persons'] = 'pi_flexform';

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addStaticFile('persons', 'Configuration/TypoScript', 'Persons');
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPiFlexFormValue('persons_persons', 'FILE:EXT:persons/Configuration/FlexForms/flexform_persons.xml');
