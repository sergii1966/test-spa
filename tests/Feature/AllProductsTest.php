<?php

namespace Tests\Feature;

use App\Models\Product;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class AllProductsTest extends TestCase
{
    use RefreshDatabase;
    public function setUp(): void
    {
        parent::setUp();

        $this->artisan('db:seed ProductSeeder');
    }

    public function test_get_products_json_response(): void
    {
        $response = $this->json('GET', '/api/v1/products');

        $response
            ->assertStatus(200);
    }
}
