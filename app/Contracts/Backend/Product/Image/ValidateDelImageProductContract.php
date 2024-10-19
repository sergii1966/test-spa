<?php

namespace App\Contracts\Backend\Product\Image;

interface ValidateDelImageProductContract
{
    public function dataValidate($request): ?array;
}
