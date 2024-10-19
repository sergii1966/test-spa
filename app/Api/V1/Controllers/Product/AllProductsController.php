<?php

namespace App\Api\V1\Controllers\Product;

use App\Api\V1\Resources\AllProductsResourceCollection;
use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class AllProductsController extends Controller
{

    /**
     * @param Request $request
     * @return AllProductsResourceCollection|false
     */
    public function __invoke(Request $request)
    {
        $items = Product::query();

        $items = $items->where('is_active', true);

        $items = $items->whereHas('images', function ($query) {
            $query->where('status', '=', 1);
        });

        $items = $items->whereHas('price', function ($query) {
            $query->where('price_old', '>', 1);
        });

        switch ($request->get('price') ?? null) {
            case 'asc':
                $items = $items->join('product_prices', 'product_prices.product_id', '=', 'products.id')
                    ->orderBy('product_prices.price_old', 'asc');
                break;
            case 'desc':
                $items = $items->join('product_prices', 'product_prices.product_id', '=', 'products.id')
                    ->orderBy('product_prices.price_old', 'desc');
                break;
            default:
                $items = $items
                    ->with('price')
                    ->orderBy('id', 'desc');
                break;
        }
        $items = $items->paginate(3);

        return $items->isNotEmpty() ? (new AllProductsResourceCollection($items))
            : false;
    }
}
