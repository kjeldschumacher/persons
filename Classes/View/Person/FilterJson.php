<?php


namespace CPSIT\Persons\View\Person;

/**
 * This file is part of the "Events" project.
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

use CPSIT\Persons\View\AbstractJsonView;

/**
 * Class FilterJson
 * Json view for filter action of PersonController
 */
class FilterJson extends AbstractJsonView
{
    /**
     * Only variables whose name is contained in this array will be rendered
     *
     * @var array
     */
    protected $variablesToRender = ['configuration'];

    /**
     * The rendering configuration for this JSON view which
     * determines which properties of each variable to render.
     *
     * @var array
     */
    protected $configuration = [
        'configuration' => [
            '_descendAll' => [
            ]
        ]
    ];
}
