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

/**
 * Interface CategoryAwareDemandInterface
 *
 * @package CPSIT\Persons\Domain\Model\Dto
 */
interface CategoryAwareDemandInterface
{
    /**
     * @return string
     */
    public function getCategories();

    /**
     * @param string $categories
     * @return void
     */
    public function setCategories($categories);

    /**
     * @return string
     */
    public function getCategoryField();
}
