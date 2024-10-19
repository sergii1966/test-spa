<?php

namespace App\Http\Controllers\Backend\Product;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class AllProductsController extends Controller
{
    /**
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        $items = Product::query()
            ->orderBy('id', 'desc')
            ->paginate(10);

        return response()->view('backend.product.all-products', [
            'items' => $items
        ]);
    }
}
