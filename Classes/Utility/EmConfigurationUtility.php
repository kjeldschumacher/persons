<?php

namespace CPSIT\Persons\Utility;

use CPSIT\Persons\Domain\Model\Dto\EmConfiguration;
use TYPO3\CMS\Core\Utility\ExtensionManagementUtility;

/**
 * Class EmConfigurationUtility
 */
class EmConfigurationUtility
{

    /**
     * Gets the settings from extension manager
     *
     * @return EmConfiguration
     */
    public static function getConfiguration()
    {
        $configuration = self::parseSettings();
        require_once ExtensionManagementUtility::extPath('persons') . 'Classes/Domain/Model/Dto/EmConfiguration.php';
        $settings = new EmConfiguration($configuration);
        return $settings;
    }

    /**
     * Parse settings and return it as array
     *
     * @return array un-serialized settings from extension manager
     */
    public static function parseSettings()
    {
        $settings = unserialize($GLOBALS['TYPO3_CONF_VARS']['EXT']['extConf']['persons']);
        if (!is_array($settings)) {
            $settings = [];
        }

        return $settings;
    }
}
