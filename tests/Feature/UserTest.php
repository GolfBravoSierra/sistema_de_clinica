<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class UserTest extends TestCase
{
    use RefreshDatabase;

    

    /**
     * A basic feature test example.
     */
    public function test_criação_de_user(): void
    {
        $user = User::factory()->create();

        $this->assertDatabaseConnection('users',[
             'email' => $user->email,
        ]);
    }
}
