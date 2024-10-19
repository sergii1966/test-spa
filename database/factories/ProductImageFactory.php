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
            'url_sm' => $this->faker->imageUrl(380, 380),
            'path_sm' => $this->faker->text(5),
            'width_sm' => 380,
            'height_sm' => 380,
            'url_lg' => $this->faker->imageUrl(627, 627),
            'path_lg' => $this->faker->text(5),
            'width_lg' => 627,
            'height_lg' => 627,
             'status' => 1,
        ];
    }
}
