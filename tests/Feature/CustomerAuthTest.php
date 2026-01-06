<?php

namespace Tests\Feature;

use App\Models\Customer;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Hash;
use Tests\TestCase;

class CustomerAuthTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_example(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    public function test_customer_can_login()
{
    $customer = Customer::create([
        'name' => 'Customer',
        'email' => 'customerone@test.com',
        'password' => Hash::make('password123'),
    ]);

    $response = $this->post(route('customer.login.post'), [
        'email' => 'customerone@test.com',
        'password' => 'password123',
    ]);

    $response->assertRedirect(route('customer.dashboard'));
    $this->assertAuthenticatedAs($customer, 'customer');
}

}
