<?php

namespace App\Contracts\Backend\Product\Image;

interface RemoveImageProductContract
{
    public function remove(array $data): bool;
}
