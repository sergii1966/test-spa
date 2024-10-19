<?php

namespace App\Http\Controllers\Backend\Product\Image;

use App\Contracts\Backend\Product\Image\AddImageProductContract;
use App\Contracts\Backend\Product\Image\EditImageProductContract;
use App\Contracts\Backend\Product\Image\ValidateAddImageProductContract;
use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\Product\Image\AddImageProductRequest;

class AddImageProductController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(
        AddImageProductRequest $request,
        AddImageProductContract $res,
        ValidateAddImageProductContract $val,
        EditImageProductContract $save
    )
    {
        if( ! $res->setImageData($val->dataValidate($request))
            ->setDirName('product')
            ->makeSmAndLgDirs()
            ->putImageToTmp()
            ->putImage()
        ){
            redirect()->back()->withErrors(['image' => __('Щось пішло не так!')]);
        }

        return ($model = $save->createOrUpdate($res->dataImgToSave()))
            ? redirect()->route('edit-product-backend', [
                'id' => $model->id ?? null
            ])->withFragment('edit-images-product')
            : redirect()->back()
                ->with('error', __('Щось пішло не так!'));
    }
}
