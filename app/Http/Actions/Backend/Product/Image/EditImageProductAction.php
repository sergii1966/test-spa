<?php

namespace App\Http\Actions\Backend\Product\Image;

use App\Contracts\Backend\Product\Image\EditImageProductContract;
use App\Models\Product;

class EditImageProductAction implements EditImageProductContract
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
        $model = Product::where(['id' => $data['product_id']])->with($this->relation)->first();
        $model->{$this->relation}()->updateOrCreate(['id' => $data['id'] ?? Null], $data);

        return $model;
    }
}
