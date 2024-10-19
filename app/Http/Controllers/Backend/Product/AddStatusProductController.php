<?php

namespace App\Http\Controllers\Backend\Product;

use App\Contracts\Backend\Product\AddStatusProductContract;
use App\Contracts\Backend\Product\ValidateAddStatusProductContract;
use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\Product\AddStatusProductRequest;
use Illuminate\Http\Request;

class AddStatusProductController extends Controller
{
    /**
     * @param AddStatusProductRequest $request
     * @param AddStatusProductContract $res
     * @param ValidateAddStatusProductContract $val
     * @return \Illuminate\Http\RedirectResponse
     */
    public function __invoke(
        AddStatusProductRequest $request,
        AddStatusProductContract $res,
        ValidateAddStatusProductContract $val
    )
    {
        $model = $res->createOrUpdate($val->dataValidate($request));

        return ($model) ?
            redirect()->route('edit-product-backend', ['id' => $model->id ?? null]) :
            redirect()->back()
                ->with('error', __('Щось пішло не так!'));
    }
}
