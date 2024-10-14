<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ProductImage extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_id',
        'src',
        'path',
        'is_main',
        'is_active'
    ];

    public function product(): belongsTo
    {
        return $this->belongsTo(Product::class);
    }
}
