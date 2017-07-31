<?php

namespace CPSIT\Persons\View;

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
use TYPO3\CMS\Extbase\Persistence\ObjectStorage;
use TYPO3\CMS\Extbase\Reflection\ObjectAccess;

/**
 * Class AbstractJsonView
 */
class AbstractJsonView extends JsonView
{

    /**
     * Traverses the given object structure in order to transform it into an
     * array structure.
     * This implementation transforms FileReference objects too.
     *
     * @param object $object Object to traverse
     * @param array $configuration Configuration for transforming the given object or NULL
     * @return array Object structure as an array
     */
    protected function transformObject($object, array $configuration)
    {
        if ($object instanceof LazyLoadingProxy) {
            /** @var FileReference $object */
            $object = $object->_loadRealInstance();
        }

        if ($object instanceof ObjectStorage) {
            $object = $object->toArray();
        }

        $transformedObject = parent::transformObject($object, $configuration);
        if (
            $object instanceof FileReference
            && isset($configuration['_descend']['_only'])
        ) {
            $transformedObject = $this->transformFileReference($object, $configuration['_descend']['_only'], $transformedObject);
        }

        return $transformedObject;
    }

    /**
     * Transforms a file reference by transforming its original resource.
     * Its properties are added to the incoming transformedObject array
     * as key => value pairs. The key corresponds to the property name.
     * The value is transformed recursively.
     *
     * @param $object FileReference
     * @param array $configuration Local configuration for property of type FileReference
     * @param array $transformedObject
     * @return array
     */
    protected function transformFileReference($object, array $configuration, $transformedObject)
    {
        $originalResource = $object->getOriginalResource();

        foreach (ObjectAccess::getGettableProperties($originalResource) as $propertyName => $propertyValue) {
            if (in_array($propertyName, $configuration)) {
                if (is_object($propertyValue)) {
                    $transformedObject[$propertyName] = $this->transformObject($propertyValue, $configuration);
                } else {
                    $transformedObject[$propertyName] = $this->transformValue($propertyValue, $configuration);
                }
            }
        }

        return $transformedObject;
    }
}
