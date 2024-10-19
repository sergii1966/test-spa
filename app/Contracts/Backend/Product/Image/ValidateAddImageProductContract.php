<?php

namespace App\Contracts\Backend\Product\Image;

interface ValidateAddImageProductContract
{
    public function dataValidate($request): ?array;
}
