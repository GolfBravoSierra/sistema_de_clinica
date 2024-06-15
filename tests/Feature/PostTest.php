<?php

namespace Tests\Feature;

use App\Models\Post;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class PostTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_can_the_posts_table_be_read(): void
    {
        $user=User::factory()->create([
            'permicao' => 1,
        ]);

        $post = Post::factory()->for($user,'paciente')->create([
            'user_name' => $user->name,
        ]);

        $response = $this->get('/patients');

        $response->assertSee($post->user_name);
    }

    public function test_can_create_an_posts(): void
    {
        $user=User::factory()->create([
            'permicao' => 1,
        ]);

        $post = Post::factory()->for($user,'paciente')->make([
            'user_name' => $user->name,
            'paciente_id' => $user->name,
            'id' => 30,
        ]);

        $this->actingAs($user)->withSession(['banned'=>false])->post('/patients/post', $post->toArray());
        

        $this->assertDatabaseHas('posts', ['id' => $post->id]);

    }

}
