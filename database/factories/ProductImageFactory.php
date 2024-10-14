<?php

namespace Database\Factories;

use App\Models\Product;
use App\Models\ProductImage;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class ProductImageFactory extends Factory
{

    protected $model = ProductImage::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
//            'product_id' => Product::factory(),
//            'product_id' => function () {
//                return Product::factory()->create()->id;
//            },
            'src' => $this->faker->imageUrl(500, 500),
            'path' => null,
            'is_main' => true,
            'is_active' => true,
        ];
    }
}
