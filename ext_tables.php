<?php
defined('TYPO3_MODE') || die('Access denied.');

call_user_func(
    function()
    {
        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('tx_persons_domain_model_person', 'EXT:persons/Resources/Private/Language/locallang_csh_tx_persons_domain_model_person.xlf');
        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_persons_domain_model_person');
    }
);
