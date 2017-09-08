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
 * Class ListJson
 * Json view for list action of PersonController
 */
class ListJson extends AbstractJsonView
{
    /**
     * Only variables whose name is contained in this array will be rendered
     *
     * @var array
     */
    protected $variablesToRender = ['persons'];

    /**
     * The rendering configuration for this JSON view which
     * determines which properties of each variable to render.
     *
     * @var array
     */
    protected $configuration = [
        'persons' => [
            '_descendAll' => [
                '_exclude' => ['pid', 'uid'],
                '_descend' => [
                    'person' => [
                        '_descend' => [
                            'image' => [
                                '_descend' => [
                                    '_only' => [
                                        'publicUrl',
                                        'title',
                                        'alternative'
                                    ]
                                ]
                            ],

                        ]
                    ],
                    'categories' => [
                        '_only' => [
                            'title',
                            'uid',
                            'parent'
                        ],
                        '_descend' => [
                            'parent' => [
                                '_only' => [
                                    'uid',
                                    'title'
                                ],
                            ]
                        ]
                    ]
                ]
            ]
        ]
    ];
}
