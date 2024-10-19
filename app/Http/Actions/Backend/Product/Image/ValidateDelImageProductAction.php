<?php

namespace App\Http\Actions\Backend\Product\Image;

use App\Contracts\Backend\Product\Image\ValidateDelImageProductContract;

class ValidateDelImageProductAction implements ValidateDelImageProductContract
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
