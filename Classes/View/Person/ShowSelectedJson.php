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
 * Class ShowSelectedJson
 * Json view for showSelected action of PersonController
 */
class ShowSelectedJson extends AbstractJsonView
{
    /**
     * Only variables whose name is contained in this array will be rendered
     *
     * @var array
     */
    protected $variablesToRender = ['person'];

    /**
     * The rendering configuration for this JSON view which
     * determines which properties of each variable to render.
     *
     * @var array
     */
    protected $configuration = [
        'persons' => [
            '_descendAll' => [
                '_exclude' => ['pid'],
                '_descend' => [
                    'person' => [
                        '_exclude' => ['pid'],
                        '_descend' => [
                            'image' => [
                                '_descend' => [
                                    '_only' => [
                                        'publicUrl',
                                        'title',
                                        'alternative'
                                    ]
                                ]
                            ]
                        ]
                    ]
                ]
            ]
        ]
    ];
}
