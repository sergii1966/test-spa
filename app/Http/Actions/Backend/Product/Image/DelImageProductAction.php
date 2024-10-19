<?php

namespace App\Http\Actions\Backend\Product\Image;

use App\Contracts\Backend\Product\Image\DelImageProductContract;
use App\Models\Product;

class DelImageProductAction implements DelImageProductContract
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
        $model = Product::where(['id' => $data['product_id']])->with([$this->relation])->first();
        $model->{$this->relation}()->where('id', $data['id'])->delete();

        return $model;
    }
}
