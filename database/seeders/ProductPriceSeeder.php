<?php

namespace Database\Seeders;

use App\Models\ProductPrice;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductPriceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ProductPrice::factory()
            // ->has(ProductPrice::factory(), 'price')->count(50)
            // ->has(ProductImage::factory(), 'images')->count(100)
            ->count(50)
            ->create();
    }
}
