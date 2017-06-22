<?php

$ll = 'LLL:EXT:persons/Resources/Private/Language/locallang_db.xlf:';

$emConfig = \CPSIT\Persons\Utility\EmConfigurationUtility::getConfiguration();

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::makeCategorizable(
    'persons',
    'tx_persons_domain_model_person',
    'status',
    [
        'label' => $ll . 'tx_persons_domain_model_person.status',
        'exclude' => true,
        'fieldConfiguration' => [
            'treeConfig' => [
                'rootUid' => $emConfig->getStatusRootCategoryId(),
                'maxLevels' => 2,
                'appearance' => [
                    'showHeader' => true,
                    'nonSelectableLevels' => 0,
                ]
            ],
            'foreign_table_where' => ' AND sys_category.sys_language_uid IN (-1, 0) ORDER BY sys_category.title ASC',
        ],
        'l10n_mode' => 'exclude',
        'l10n_display' => 'hideDiff',
    ]
);


\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::makeCategorizable(
    'hfm_persons',
    'tx_persons_domain_model_person',
    'departments',
    [
        'label' => $ll . 'tx_persons_domain_model_person.departments',
        'exclude' => false,
        'fieldConfiguration' => [
            'treeConfig' => [
                'rootUid' => $emConfig->getDepartmentRootCategoryId(),
                'maxLevels' => 2,
                'appearance' => [
                    'showHeader' => true,
                    'nonSelectableLevels' => 0,
                ]
            ],
            'size' => 10,
            'foreign_table_where' => ' AND sys_category.sys_language_uid IN (-1, 0) ORDER BY sys_category.title ASC',
        ],
        'l10n_mode' => 'exclude',
        'l10n_display' => 'hideDiff',
    ]
);
