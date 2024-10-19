<?php

namespace App\Contracts\Backend\Product;

interface ValidateAddNameDescriptionProductContract
{
    public function dataValidate($request): ?array;
}
