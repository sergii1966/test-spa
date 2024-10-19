<?php

namespace App\Traits\Backend\Product;

use App\Models\Product;

trait AddItemToProductRelation
{
    public function __construct(public ?string $relation)
    {

    }

    /**
     * @param array $data
     * @return Product|bool
     */
    public function add(array $data): Product|bool
    {
        $model = Product::query()->where(['id' => $data['product_id']])->first();

        if($model && $model->{$this->relation}()->create($data)){
            return $model;
        }

        return false;
    }
}
