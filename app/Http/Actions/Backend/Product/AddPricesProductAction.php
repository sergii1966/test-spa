<?php

namespace App\Http\Actions\Backend\Product;

use App\Contracts\Backend\Product\AddPricesProductContract;
use App\Traits\Backend\Product\CreateOrUpdateItemProductRelation;

class AddPricesProductAction implements AddPricesProductContract
{
    use CreateOrUpdateItemProductRelation;
}
