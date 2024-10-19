<?php

namespace App\Contracts\Backend\Product;

use App\Models\Product;

interface AddStatusProductContract
{
    public function createOrUpdate(array $data): ?Product;
}
