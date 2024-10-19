<?php

namespace App\Http\Controllers\Backend\Product;

use App\Contracts\Backend\Product\AddNameDescriptionProductContract;
use App\Contracts\Backend\Product\ValidateAddNameDescriptionProductContract;
use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\Product\AddNameDescriptionProductRequest;

class AddNameDescriptionProductController extends Controller
{
    /**
     * @param AddNameDescriptionProductRequest $request
     * @param AddNameDescriptionProductContract $res
     * @param ValidateAddNameDescriptionProductContract $val
     * @return \Illuminate\Http\RedirectResponse
     */
    public function __invoke(
        AddNameDescriptionProductRequest $request,
        AddNameDescriptionProductContract $res,
        ValidateAddNameDescriptionProductContract $val
    )
    {
        $model = $res->createOrUpdate($val->dataValidate($request));

        return ($model) ?
            redirect()->route('edit-product-backend', ['id' => $model->id ?? null]) :
            redirect()->back()
            ->with('error', __('Щось пішло не так!'));
    }
}
