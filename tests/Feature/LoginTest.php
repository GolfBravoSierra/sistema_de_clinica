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
    public function test_login_is_possible(): void
    {
        // Create a test user
        $user = User::factory()->create([
            'password' => bcrypt($password = 'i-love-laravel'),
        ]);

        // Send a POST request to the login route
        $response = $this->post('/login', [
            'email' => $user->email,
            'password' => $password,
        ]);

        // Assert the user was redirected to the intended page
        $response->assertRedirect('/home');

        // Assert the user was authenticated
        $this->assertAuthenticatedAs($user);
    }
}