<?php

namespace App\Http\Controllers\Backend\Product;

use App\Contracts\Backend\Product\AddPricesProductContract;
use App\Contracts\Backend\Product\ValidateAddPricesProductContract;
use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\Product\AddPricesProductRequest;


class AddPricesProductController extends Controller
{
    /**
     * @param AddPricesProductRequest $request
     * @param AddPricesProductContract $res
     * @param ValidateAddPricesProductContract $val
     * @return \Illuminate\Http\RedirectResponse
     */
    public function __invoke(
        AddPricesProductRequest $request,
        AddPricesProductContract $res,
        ValidateAddPricesProductContract $val
    ) {
        return ($model = $res->createOrUpdate($val->dataValidate($request)) ?? null)
            ? redirect()->route('edit-product-backend', [
                'id' => $model->id ?? null
            ])->withFragment('add-prices-product')
            : redirect()->back()
                ->with('error', __('Щось пішло не так!'));
    }
}
