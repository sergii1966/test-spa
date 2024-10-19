<?php

namespace App\Contracts\Backend\Product\Image;

use App\Models\Product;

interface EditImageProductContract
{
    public function __construct(string $relation);
    public function createOrUpdate(array $data): ?Product;
}
