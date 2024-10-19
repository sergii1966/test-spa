<?php

namespace App\Contracts\Backend\Product\Image;

use App\Models\Product;

interface DelImageProductContract
{
    public function __construct(string $relation);

    public function del(array $data): ?Product;
}
