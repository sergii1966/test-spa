<?php

namespace App\Http\Actions\Backend\Product;

use App\Contracts\Backend\Product\ValidateAddPricesProductContract;

class ValidateAddPricesProductAction implements ValidateAddPricesProductContract
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
