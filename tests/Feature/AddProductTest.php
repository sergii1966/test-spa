<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Session;
use Mockery\MockInterface;
use Tests\TestCase;

class AddProductTest extends TestCase
{
   use RefreshDatabase;
    protected array $validatedNameDescriptionArray;

    protected function setUp(): void
    {
        parent::setUp();

        Session::start();
    }

    public function test_view_add_product_form()
    {
        $response = $this->get(route('add-product-backend'));

        $response->assertSuccessful();
        $response->assertViewIs('backend.product.add-product');
    }
}
