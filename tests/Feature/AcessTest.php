<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;

class AcessTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     */
    public function test_home(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }
    public function test_login(): void
    {
        $response = $this->get('/login');

        $response->assertStatus(200);
    }
    public function test_contact(): void
    {
        $response = $this->get('/contact');

        $response->assertStatus(200);
    }
    public function test_patients(): void
    {
        $response = $this->get('/patients');

        $response->assertStatus(200);
    }
    public function test_about(): void
    {
        $response = $this->get('/about');

        $response->assertStatus(200);
    }

    public function test_area_logada(): void
    {
        $user = User::factory()->create(['permicao'=>1]);

        $response = $this->actingAs($user)
                         ->withSession(['banned' => false])
                         ->get('/'. $user->id. '/arealogada');
        
        $response->assertStatus(200);
    }

    


}
