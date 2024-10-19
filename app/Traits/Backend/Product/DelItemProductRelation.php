<?php

namespace App\Traits\Backend\Product;

use App\Models\Product;

trait DelItemProductRelation
{
    public function __construct(public ?string $relation)
    {

    }

    /**
     * @param array $data
     * @return Product|null
     */
    public function del(array $data): ?Product
    {
        $model = Product::query()->where(['id' => $data['product_id']])->first();

        if($model && $model->{$this->relation}()->where('id', $data['id'])->delete()){
            return $model;
        }

        return null;
    }
}
