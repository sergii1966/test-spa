<?php

namespace App\Contracts\Backend\Product;

use App\Models\Product;

interface AddPricesProductContract
{
    public function __construct(string $relation);
    public function createOrUpdate(array $data): ?Product;
}
