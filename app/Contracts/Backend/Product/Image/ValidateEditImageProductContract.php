<?php

namespace App\Contracts\Backend\Product\Image;

interface ValidateEditImageProductContract
{
    public function dataValidate($request): ?array;
}
