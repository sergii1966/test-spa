<?php

namespace App\Contracts\Backend\Product;

interface ValidateAddPricesProductContract
{
    public function dataValidate($request): ?array;
}
