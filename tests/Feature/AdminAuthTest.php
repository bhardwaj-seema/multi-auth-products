<?php

namespace Tests\Feature;

use App\Models\Admin;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Hash;
use Tests\TestCase;

class AdminAuthTest extends TestCase
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

    public function test_admin_can_login(){
        $admin = Admin::create([
'name'=>'Admin',
'email'=>'adminone@test.com',
'password'=>Hash::make('password123')
        ]);

        $res = $this->post(route('admin.login.post'),[
            'email'=>'adminone@test.com',
            'password'=>'password123'
        ]);

        $res->assertRedirect(route('admin.dashboard'));
        $this->assertAuthenticatedAs($admin, 'admin');
    }
}
