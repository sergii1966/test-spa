<?php

namespace App\Traits\Backend\Product;

use App\Models\Product;

trait CreateOrUpdateItemProductRelation
{
    public function __construct(public ?string $relation)
    {

    }

    /**
     * @param array $data
     * @return Product|null
     */
    public function createOrUpdate(array $data): ?Product
    {
        $model = Product::query()->where(['id' => $data['product_id']])->first();
        if($model && $model->{$this->relation}()->updateOrCreate(['id' => $data['id'] ?? Null], $data)){
            return $model;
        }

        return null;
    }
}
