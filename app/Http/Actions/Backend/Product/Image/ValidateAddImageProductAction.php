<?php

namespace App\Http\Actions\Backend\Product\Image;

use App\Contracts\Backend\Product\Image\ValidateAddImageProductContract;

class ValidateAddImageProductAction implements ValidateAddImageProductContract
{
    /**
     * @param $request
     * @return array|null
     */
    public function dataValidate($request): ?array
    {
        return $request->validated();
    }
}
