<?php

namespace CPSIT\Persons\Domain\Model\Dto;

/**
 * This file is part of the "Persons" project.
 *
 * It is free software; you can redistribute it and/or modify it under
 * the terms of the GNU General Public License, either version 2
 * of the License, or any later version.
 *
 * For the full copyright and license information, please read the
 * LICENSE.txt file that was distributed with this source code.
 *
 * The TYPO3 project - inspiring people to share!
 */

use TYPO3\CMS\Extbase\Domain\Model\Category;

/**
 * Interface StatusAwareDemandInterface
 */
interface StatusAwareDemandInterface
{
    /**
     * Returns the performance status
     *
     * @return \TYPO3\CMS\Extbase\Domain\Model\Category
     */
    public function getStatus();

    /**
     * sets the status
     *
     * @param \TYPO3\CMS\Extbase\Domain\Model\Category $status
     * @return void
     */
    public function setStatus(Category $status);

    /**
     * @return string
     */
    public function getStatuses();

    /**
     * @param string $statuses
     */
    public function setStatuses($statuses);

    /**
     * @return boolean
     */
    public function isExcludeSelectedStatuses();

    /**
     * @param boolean $excludeSelectedStatuses
     */
    public function setExcludeSelectedStatuses($excludeSelectedStatuses);

    /**
     * @return string
     */
    public function getStatusField();
}
