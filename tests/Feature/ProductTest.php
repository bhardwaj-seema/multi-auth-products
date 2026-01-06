<?php

namespace Tests\Feature;

use App\Models\Product;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ProductTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     */
    public function test_example(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }


     public function test_product_creation()
    {
        $product = Product::create([
            'name' => 'Unit Product',
            'price' => 200,
            'stock' => 5,
        ]);

      $this->assertDatabaseHas('products', [
            'name' => 'Unit Product',
            'price' => 200,
            'stock' => 5,
        ]);
    }
}
