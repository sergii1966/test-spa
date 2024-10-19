<?php

namespace App\Http\Actions\Backend\Product\Image;

use App\Contracts\Backend\Product\Image\ValidateEditImageProductContract;

class ValidateEditImageProductAction implements ValidateEditImageProductContract
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
