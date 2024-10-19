<?php

namespace App\Http\Controllers\Backend\Product;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class EditProductController extends Controller
{
    /**
     * @param string|null $id
     * @return \Illuminate\Http\Response
     */
    public function __invoke(?string $id = null)
    {
        if(!($model = Product::query()
            ->where('id', $id)
            ->with(['price', 'images'])
            ->first()
        )
        ){
            abort(404);
        }
        return response()->view('backend.product.add-product', ['model' => $model]);
    }
}
