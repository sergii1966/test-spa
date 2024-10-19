<?php

namespace App\Http\Actions\Backend\Product;

use App\Contracts\Backend\Product\AddStatusProductContract;
use App\Models\Product;

class AddStatusProductAction implements AddStatusProductContract
{
    /**
     * @param array $data
     * @return Product|null
     */
    public function createOrUpdate(array $data): ?Product
    {
        $model = Product::query()->where(['id' => $data['product_id']])->first();
        if($model && $model->updateOrCreate(['id' => $data['product_id'] ?? Null], $data)){
            return $model;
        }

        return null;
    }
}
