<?php

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::makeCategorizable(
    'persons',
    'tx_persons_domain_model_person',
    'departments',
    [
// Set a custom label
        'label' => $ll . 'tx_persons_domain_model_person.departments',
// This field should not be an exclude-field
        'exclude' => true,
// Override generic configuration, e.g. sort by title rather than by sorting
        'fieldConfiguration' => [
            'treeConfig' => [
                'rootUid' => $emConfig->getDepartmentRootCategoryId(),
                'maxLevels' => 2,
                'appearance' => [
                    'showHeader' => true,
                    'nonSelectableLevels' => 0,
                ]
            ],
            'foreign_table_where' => ' AND sys_category.sys_language_uid IN (-1, 0) ORDER BY sys_category.title ASC',
        ],
// string (keyword), see TCA reference for details
        'l10n_mode' => 'exclude',
// list of keywords, see TCA reference for details
        'l10n_display' => 'hideDiff',
    ]
);
