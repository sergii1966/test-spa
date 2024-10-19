<?php

namespace App\Contracts\Backend\Product;

interface ValidateAddStatusProductContract
{
    public function dataValidate($request): ?array;
}
