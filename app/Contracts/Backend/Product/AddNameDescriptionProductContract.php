<?php

namespace App\Contracts\Backend\Product;

use App\Models\Product;

interface AddNameDescriptionProductContract
{
    public function createOrUpdate(array $data): ?Product;
}
