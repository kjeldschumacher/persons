<?php
defined('TYPO3_MODE') || die('Access denied.');

call_user_func(
    function () {

        \TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
            'CPSIT.Persons',
            'Persons',
            [
                'Person' => 'list, show'
            ],
            // non-cacheable actions
            [
                'Person' => ''
            ]
        );

        if (TYPO3_MODE === 'BE') {
            $icons = [
                'ext-persons-wizard-icon' => 'icon-persons.svg',
            ];
            $iconRegistry = \TYPO3\CMS\Core\Utility\GeneralUtility::makeInstance(\TYPO3\CMS\Core\Imaging\IconRegistry::class);
            foreach ($icons as $identifier => $path) {
                $iconRegistry->registerIcon(
                    $identifier,
                    \TYPO3\CMS\Core\Imaging\IconProvider\SvgIconProvider::class,
                    ['source' => 'EXT:persons/Resources/Public/Icons/' . $path]
                );
            }
        }

        // wizards
        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPageTSConfig(
            '<INCLUDE_TYPOSCRIPT: source="FILE:EXT:persons/Configuration/TSconfig/ContentElementWizard.txt">');
    }
);
