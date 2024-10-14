<?php

namespace App\Http\Controllers\Backend\Product;

use App\Http\Controllers\Controller;
use App\Http\Requests\Frontend\Product\AddNameDescriptionProductRequest;
use Illuminate\Http\Request;

class AddNameDescriptionProductAdminController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(AddNameDescriptionProductRequest $request)
    {
        dd($request->validated());
    }
}
