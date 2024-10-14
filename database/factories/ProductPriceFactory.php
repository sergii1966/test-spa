<?php

namespace Database\Factories;

use App\Models\Product;
use App\Models\ProductPrice;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class ProductPriceFactory extends Factory
{
    protected $model = ProductPrice::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
//            'product_id' => Product::factory(),
            'product_id' => function () {
                return Product::factory()->create()->id;
            },
            'price_old' => $this->faker->randomFloat(0, 100, 200),
            'price_new' => $this->faker->randomFloat(0, 201, 300),
            //fake()->randomFloat(10000, 10),
        ];
    }
}
