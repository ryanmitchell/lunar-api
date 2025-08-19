<?php

namespace Lunar\Api\Overrides;

use ApiPlatform\Metadata\Resource\Factory\ResourceNameCollectionFactoryInterface;
use ApiPlatform\Metadata\Resource\ResourceNameCollection;

class ResourceNameCollectionFactory implements ResourceNameCollectionFactoryInterface
{
    public function __construct(private ResourceNameCollectionFactoryInterface $decorated) {}

    public function create(): ResourceNameCollection
    {
        // @TODO: this should be opt-in
        $classes = [
            '\\Lunar\\Api\\Models\\Brand',
            '\\Lunar\\Api\\Models\\Product',
        ];

        $base = $this->decorated->create();
        $classes = [...$classes, ...iterator_to_array($base->getIterator())];

        return new ResourceNameCollection($classes);
    }
}
