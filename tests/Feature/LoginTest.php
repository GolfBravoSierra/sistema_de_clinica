<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;

class LoginTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Test if login is possible.
     */
    public function test_is_login_possible(): void
    {
        // Create a test user
        $user = User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@gmail.com',
            'password' => bcrypt('password'),
            'permicao' => 1,
            'cep' => 23456789,
        ]);

        $auth = ['name'=>$user->name,'password'=>'password'];

        // Send a POST request to the login route
        $response = $this->post('/login', $auth);
        
        // Assert the user was authenticated
        $this->assertAuthenticatedAs($user);

        // Assert the user was redirected to the intended page
        $response->assertRedirect('/');
    }
}