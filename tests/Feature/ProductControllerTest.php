<?php

namespace Tests\Feature;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\Response;
use Tests\TestCase;

class ProductControllerTest extends TestCase
{
    use RefreshDatabase;

    public function test_show_product()
    {
        $product = Product::factory()->create();

        $response = $this->getJson(route('products.show', $product->id));

        $response->assertStatus(Response::HTTP_OK);
    }

    public function test_store_product()
    {
        $category = Category::factory()->create();

        $productData = [
            'name' => 'Test Product',
            'description' => 'This is a test product description',
            'price' => 99.99,
            'category_id' => $category->id,
            'image_url' => 'https://example.com/image.jpg',
        ];

        $response = $this->postJson(route('products.store'), $productData);

        $response->assertStatus(201)
            ->assertJsonFragment([
                'name' => 'Test Product',
                'description' => 'This is a test product description',
                'price' => 99.99,
                'category_id' => $category->id,
                'image_url' => 'https://example.com/image.jpg',
            ]);

        $this->assertDatabaseHas('products', [
            'name' => 'Test Product',
            'price' => 99.99,
        ]);
    }

    public function test_store_product_validation_error()
    {
        $invalidProductData = [
            'name' => '', // Empty name should fail validation
            'price' => 'not-a-number', // Invalid price
            'category_id' => 999, // Non-existent category
        ];

        $response = $this->postJson(route('products.store'), $invalidProductData);

        $response->assertStatus(422)
            ->assertJsonValidationErrors(['name', 'price', 'category_id']);
    }

    public function test_update_product()
    {
        $product = Product::factory()->create([
            'name' => 'Original Product',
            'description' => 'Original description',
            'price' => 50.00
        ]);

        $updatedData = [
            'name' => 'Updated Product Name',
            'description' => 'Updated product description',
            'price' => 75.99
        ];

        $response = $this->putJson(route('products.update', $product->id), $updatedData);

        $response->assertStatus(200)
            ->assertJsonPath('message', 'Product updated successfully')
            ->assertJsonPath('product.name', 'Updated Product Name')
            ->assertJsonPath('product.description', 'Updated product description')
            ->assertJsonPath('product.price', 75.99)
            ->assertJsonPath('product.id', $product->id);

        $this->assertDatabaseHas('products', [
            'id' => $product->id,
            'name' => 'Updated Product Name',
            'description' => 'Updated product description',
            'price' => 75.99
        ]);
    }


    public function test_update_product_not_found()
    {
        $nonExistentProductId = 9999;

        $updatedData = [
            'name' => 'Updated Product Name',
            'price' => 75.99
        ];

        $response = $this->putJson(route('products.update', $nonExistentProductId), $updatedData);

        $response->assertStatus(404)
            ->assertJsonFragment([
                'message' => 'Product not found'
            ]);
    }

    public function test_destroy_product()
    {
        $product = Product::factory()->create();

        $response = $this->deleteJson(route('products.destroy', $product->id));

        $response->assertStatus(200)
            ->assertJsonFragment([
                'message' => 'Product deleted successfully'
            ]);

        $this->assertDatabaseMissing('products', [
            'id' => $product->id
        ]);
    }

    public function test_destroy_product_not_found()
    {
        $nonExistentProductId = 9999;

        $response = $this->deleteJson(route('products.destroy', $nonExistentProductId));

        $response->assertStatus(404)
            ->assertJsonFragment([
                'message' => 'Product not found'
            ]);
    }


}
