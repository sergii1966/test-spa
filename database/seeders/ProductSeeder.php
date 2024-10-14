<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Models\ProductImage;
use App\Models\ProductPrice;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
//    public function run(): void
//    {
//        Product::factory()
//            ->has(ProductPrice::factory(), 'price')->count(50)
//            ->has(ProductImage::factory(), 'images')->count(100)
//            ->count(50)
//            ->create();
//    }

    public function run()
    {
        Product::factory()->count(50)
            ->create()
            ->each(function (Product $product) {
                $images = ProductImage::factory()->count(3)->make();

                $product->images()->saveMany($images);
            });

//        // Create 10 records of customers
//        factory(Product::class, 10)->create()->each(function ($customer) {
//            // Seed the relation with one address
//            $address = factory(App\CustomerAddress::class)->make();
//            $customer->address()->save($address);
//
//            // Seed the relation with 5 purchases
//            $purchases = factory(App\CustomerPurchase::class, 5)->make();
//            $customer->purchases()->saveMany($purchases);
//        });
    }
}
