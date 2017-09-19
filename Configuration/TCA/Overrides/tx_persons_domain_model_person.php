<?php

$ll = 'LLL:EXT:persons/Resources/Private/Language/locallang_db.xlf:';

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::makeCategorizable(
    'persons',
    'tx_persons_domain_model_person',
    'categories',
    [
        'label' => $ll . 'tx_persons_domain_model_person.categories',
        'exclude' => false,
        'fieldConfiguration' => [
            'treeConfig' => [
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
