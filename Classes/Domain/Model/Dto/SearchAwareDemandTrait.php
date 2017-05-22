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
 * Trait SearchAwareDemandTrait
 * Provides properties and methods for (full-text) search aware demand objects
 */
trait SearchAwareDemandTrait
{
    /**
     * @var \CPSIT\Persons\Domain\Model\Dto\Search
     */
    protected $search;

    /**
     * Get search
     *
     * @return \CPSIT\Persons\Domain\Model\Dto\Search
     */
    public function getSearch()
    {
        return $this->search;
    }

    /**
     * Set search object
     *
     * @param \CPSIT\Persons\Domain\Model\Dto\Search $search A search object
     * @return void
     */
    public function setSearch(Search $search)
    {
        $this->search = $search;
    }
}
