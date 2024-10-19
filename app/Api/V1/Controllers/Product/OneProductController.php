<?php

namespace App\Api\V1\Controllers\Product;

use App\Api\V1\Resources\OneProductResource;
use App\Http\Controllers\Controller;
use App\Models\Product;

class OneProductController extends Controller
{
    /**
     * @param string|null $id
     * @return OneProductResource|bool
     */
    public function __invoke(?string $id): OneProductResource|bool
    {
        $item = Product::query()
            ->where('is_active', true)
            ->where('id', $id)
            ->whereHas('images', function ($query) {
                $query->where('status', '=', 1);
            })
            ->whereHas('price', function ($query) {
            $query->where('price_old', '>', 1);
            })
            ->first();

       return $item ? (new OneProductResource($item))
        : false;
    }
}
