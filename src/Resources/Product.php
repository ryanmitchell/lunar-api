<?php

namespace Lunar\Api\Resources;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;

final class Product
{
    public int $id;

    public Collection $brand;

    public Collection $productType;

    public array $attributeData;

    public string $status;

    public function __construct(Model $model)
    {
        $this->id = $model->id;

        // @TODO: should be a DTO
        $this->brand = collect([
            'id' => $model->brand_id,
            'name' => $model->brand->name,
        ]);

        // @TODO: should be a DTO
        $this->productType = collect([
            'id' => $model->product_type_id,
            'name' => $model->productType->name,
        ]);

        // @TODO: should be a DTO
        $this->attributeData = json_decode($model->attribute_data->toJson(), true);

        $this->status = $model->status;
    }
}
