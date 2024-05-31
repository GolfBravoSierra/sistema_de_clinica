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
            'password' => bcrypt($password = 'i-love-laravel'),
            'name' => 'testuser',
            'email' => 'test@example.com',
            'email_verified_at' => now(),
            'permicao' => 0,
            'cep' => 12345678,
        ]);

        // Attempt to login
        $response = $this->post('/login', $user->toArray());
        
        //dd($user);

        // Check if the user is authenticated
        $this->assertAuthenticatedAs($user);

        // Check if the user was redirected (logged in successfully)
        $response->assertRedirect('/home'); // Replace '/home' with the path the user should be redirected to after login
    }
}