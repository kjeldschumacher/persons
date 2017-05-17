<?php
defined('TYPO3_MODE') || die('Access denied.');

call_user_func(
    function()
    {

        \TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
            'CPSIT.Persons',
            'Person',
            [
                'Person' => 'list, show'
            ],
            // non-cacheable actions
            [
                'Person' => ''
            ]
        );

    // wizards
    \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPageTSConfig(
        'mod {
            wizards.newContentElement.wizardItems.plugins {
                elements {
                    person {
                        icon = EXT:persons/Resources/Public/Icons/user_plugin_person.svg
                        title = LLL:EXT:persons/Resources/Private/Language/locallang_db.xlf:tx_persons_domain_model_person
                        description = LLL:EXT:persons/Resources/Private/Language/locallang_db.xlf:tx_persons_domain_model_person.description
                        tt_content_defValues {
                            CType = list
                            list_type = persons_person
                        }
                    }
                }
                show := addToList(person)
            }
       }'
    );
    }
);
