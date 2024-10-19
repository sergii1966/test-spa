<?php

namespace App\Http\Controllers\Backend\Product\Image;

use App\Contracts\Backend\Product\Image\EditImageProductContract;
use App\Contracts\Backend\Product\Image\ValidateEditImageProductContract;
use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\Product\Image\EditImageProductRequest;

class EditImageProductController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(
        EditImageProductRequest $request,
        EditImageProductContract $res,
        ValidateEditImageProductContract $val
    ) {
       return ($model = $res->createOrUpdate($val->dataValidate($request)))
            ? redirect()->route('edit-product-backend', [
                'id' => $model->id ?? null
            ])->withFragment('edit-images-product')
            : redirect()->back()
                ->with('error', __('Щось пішло не так!'));
    }
}
