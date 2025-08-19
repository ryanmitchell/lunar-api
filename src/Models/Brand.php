<?php

namespace Lunar\Api\Models;

use ApiPlatform\Metadata\ApiResource;
use ApiPlatform\Metadata\Get;
use ApiPlatform\Metadata\GetCollection;
use ApiPlatform\Metadata\IsApiResource;
use Lunar\Api\Resources;
use Lunar\Api\State\ModelManifestCollectionProvider;
use Lunar\Api\State\ModelManifestItemProvider;

class Brand
{
    use IsApiResource;

    public static $manifestMorph = \Lunar\Models\Contracts\Brand::class;

    public static function apiResource(): ApiResource
    {
        return new ApiResource(
            operations: [
                new Get(
                    output: Resources\Brand::class,
                    provider: ModelManifestItemProvider::class,
                    uriTemplate: '/brands/{id}'
                ),
                new GetCollection(
                    output: Resources\Brand::class,
                    provider: ModelManifestCollectionProvider::class,
                    uriTemplate: '/brands'
                ),
            ],
        );
    }
}
