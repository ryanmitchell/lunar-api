<?php

namespace Lunar\Api\Resources;

use Illuminate\Database\Eloquent\Model;

final class Brand
{
    public int $id;

    public string $name;

    public function __construct(Model $model)
    {
        $this->id = $model->id;

        $this->name = $model->name;
    }
}
