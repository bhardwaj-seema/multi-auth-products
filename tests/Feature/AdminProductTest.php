<?php

namespace Tests\Feature;

use App\Models\Admin;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class AdminProductTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_example(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    public function test_admin_can_create_product(){
        $admin = Admin::factory()->create();

        $res = $this->actingAs($admin,'admin')->post(route('admin.products.store'),[
            'name'=>'Test Product',
             'price' => 100,
            'stock' => 10,
            'category' => 'General',
        ]);

    $res->assertRedirect();
    $this->assertDatabaseHas('products', [
        'name' => 'Test Product',
    ]);
    }
}
