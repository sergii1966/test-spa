<?php

namespace App\Http\Controllers\Backend\Product\Image;

use App\Contracts\Backend\Product\Image\DelImageProductContract;
use App\Contracts\Backend\Product\Image\RemoveImageProductContract;
use App\Contracts\Backend\Product\Image\ValidateDelImageProductContract;
use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\Product\Image\DelImageProductRequest;


class DelImageProductController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(
        DelImageProductRequest $request,
        DelImageProductContract $res,
        ValidateDelImageProductContract $val,
        RemoveImageProductContract $rem
    ) {
        if(!$rem->remove($val->dataValidate($request))){
            redirect()->back()->withErrors(['product_id' => __('Щось пішло не так!')]);
        }

        return ($model = $res->del($val->dataValidate($request)))
            ? redirect()->route('edit-product-backend', [
                'id' => $model->id ?? null
            ])->withFragment('edit-images-product')
            : redirect()->back()
                ->with('error', __('Щось пішло не так!'));
    }
}
