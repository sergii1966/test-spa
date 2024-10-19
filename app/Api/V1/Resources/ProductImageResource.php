<?php

namespace App\Api\V1\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ProductImageResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'url_sm' => $this->url_sm,
            'url_lg' => $this->url_lg,
            'status' => $this->status
        ];
    }
}
