<?php

namespace App\Http\Actions\Backend\Product;

use App\Contracts\Backend\Product\AddNameDescriptionProductContract;
use App\Models\Product;

class AddNameDescriptionProductAction implements AddNameDescriptionProductContract
{
    /**
     * @param array $data
     * @return Product|null
     */
    public function createOrUpdate(array $data): ?Product
    {
        return Product::query()->updateOrCreate($data);
    }
}
