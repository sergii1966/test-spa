<?php

namespace App\Http\Actions\Backend\Product;

use App\Contracts\Backend\Product\ValidateAddStatusProductContract;

class ValidateAddStatusProductAction implements ValidateAddStatusProductContract
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
