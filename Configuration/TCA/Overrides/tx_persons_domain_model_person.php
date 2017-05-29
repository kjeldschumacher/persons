<?php

$emConfig = \CPSIT\Persons\Utility\EmConfigurationUtility::getConfiguration();

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::makeCategorizable(
    'persons',
    'tx_persons_domain_model_person',
    'status',
    [
        'label' => $ll . 'tx_persons_domain_model_person.departments',
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
