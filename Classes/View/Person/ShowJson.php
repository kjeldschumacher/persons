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


use TYPO3\CMS\Extbase\Domain\Model\FileReference;
use TYPO3\CMS\Extbase\Mvc\View\JsonView;
use TYPO3\CMS\Extbase\Persistence\Generic\LazyLoadingProxy;

/**
 * Class ShowJson
 * Json view for show action of PersonController
 */
class ShowJson extends JsonView
{
    const FIELD_NAME_IMAGE_URL = 'publicUrl';
    const FIELD_NAME_IMAGE_TITLE = 'title';
    const FIELD_NAME_IMAGE_ALTERNATIVE = 'alternative';
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
        'person' => [
            '_exclude' => ['pid'],
            '_descend' => [
                'image' => [
                    '_descend' => [
                        '_only' => [
                            self::FIELD_NAME_IMAGE_URL,
                            self::FIELD_NAME_IMAGE_TITLE,
                            self::FIELD_NAME_IMAGE_ALTERNATIVE
                        ]
                    ]
                ]
            ]
        ]
    ];

    protected function transformObject($object, array $configuration)
    {
        if ($object instanceof LazyLoadingProxy) {
            /** @var FileReference $object */
            $object = $object->_loadRealInstance();
        }

        $transformedObject = parent::transformObject($object, $configuration);
        if (
            $object instanceof FileReference
            && isset($configuration['_descend']['_only'])
        ) {
            if (in_array(static::FIELD_NAME_IMAGE_URL, $configuration['_descend']['_only'])) {
                $transformedObject[static::FIELD_NAME_IMAGE_URL] = $object->getOriginalResource()->getPublicUrl();
            }
            if (in_array(static::FIELD_NAME_IMAGE_TITLE, $configuration['_descend']['_only'])) {
                $transformedObject[static::FIELD_NAME_IMAGE_TITLE] = $object->getOriginalResource()->getTitle();
            }
            if (in_array(static::FIELD_NAME_IMAGE_ALTERNATIVE, $configuration['_descend']['_only'])) {
                $transformedObject[static::FIELD_NAME_IMAGE_ALTERNATIVE] = $object->getOriginalResource()->getAlternative();
            }
        }

        return $transformedObject;
    }

}
