<?php

namespace Tests\Feature;

use App\Http\Actions\Backend\Product\ValidateAddNameDescriptionProductAction;
use App\Http\Requests\Backend\Product\AddNameDescriptionProductRequest;
use App\Models\Product;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Session;
use Mockery\MockInterface;
use Tests\TestCase;

class AddNameDescriptionProductTest extends TestCase
{
    use RefreshDatabase;
    protected array $validatedNameDescriptionArray;

    protected function setUp(): void
    {
        parent::setUp();

        Session::start();

        $this->validatedNameDescriptionArray = [
            'name' => fake()->text(50),
            'description' => fake()->text(300),
        ];
    }

    public function test_ValidateAddNameDescriptionProductContract(): void
    {
        $requestMock = $this->mock(AddNameDescriptionProductRequest::class);

        $stub = $this->mock(ValidateAddNameDescriptionProductAction::class, function (MockInterface $mock) {
            $mock->shouldReceive('dataValidate')->once()->andReturn($this->validatedNameDescriptionArray);
        });

        $this->assertEquals($this->validatedNameDescriptionArray, $stub->dataValidate($requestMock));
    }

    public function test_name_empty_in_form(): void
    {
        unset($this->validatedNameDescriptionArray['name']);
        $this->validatedNameDescriptionArray['_token'] = csrf_token();

        $response = $this->post(route('add-name-description-product-backend'), $this->validatedNameDescriptionArray);

        $response->assertSessionHasErrors(['name']);
    }

    public function test_description_empty_in_form(): void
    {
        unset($this->validatedNameDescriptionArray['description']);
        $this->validatedNameDescriptionArray['_token'] = csrf_token();

        $response = $this->post(route('add-name-description-product-backend'), $this->validatedNameDescriptionArray);

        $response->assertSessionHasErrors(['description']);
    }

    public function test_product_add(): void
    {

        $this->validatedNameDescriptionArray['_token'] = csrf_token();

        $response = $this->post(route('add-name-description-product-backend'), $this->validatedNameDescriptionArray);
        $product = Product::find(1);

        $this->assertEquals($product->name, $this->validatedNameDescriptionArray['name']);
        $this->assertEquals($product->description, $this->validatedNameDescriptionArray['description']);

        $response->assertRedirect(route('edit-product-backend', ['id' => $product->id]));
    }
}
