<?php

namespace App\Http\Actions\Backend\Product;

use App\Contracts\Backend\Product\ValidateAddNameDescriptionProductContract;

class ValidateAddNameDescriptionProductAction implements ValidateAddNameDescriptionProductContract
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
