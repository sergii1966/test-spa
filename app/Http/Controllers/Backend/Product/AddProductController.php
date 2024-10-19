<?php

namespace App\Http\Controllers\Backend\Product;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class AddProductController extends Controller
{
    /**
     * @return \Illuminate\Http\Response
     */
    public function __invoke()
    {
        return response()->view('backend.product.add-product');
    }
}
