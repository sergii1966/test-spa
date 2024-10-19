<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ProductImage extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'product_id',
        'path_sm',
        'path_lg',
        'url_sm',
        'url_lg',
        'width_sm',
        'width_lg',
        'height_sm',
        'height_lg',
        'status'
    ];

    public function product(): belongsTo
    {
        return $this->belongsTo(Product::class);
    }
}
