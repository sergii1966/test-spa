<?php

namespace App\Api\V1\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ProductPriceResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'price_old' => $this->price_old,
            'price_new' => $this->price_new
        ];
    }
}
