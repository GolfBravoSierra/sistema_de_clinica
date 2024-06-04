<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Appointment;
use App\Models\Post;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create(['permicao' => 1]);

        $user = User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@gmail.com',
            'password' => bcrypt("password"),
            'permicao' => 1,
        ]);
        $user2 = User::factory()->create([
            'name' => 'Test User 2',
            'email' => 'test2@gmail.com',
            'password' => bcrypt("password"),
            'permicao' => 1,
        ]);
        $user3 = User::factory()->create([
            'name' => 'Test User 3',
            'email' => 'test3@gmail.com',
            'password' => bcrypt("password"),
            'permicao' => 1,
        ]);
        $user4 = User::factory()->create([
            'name' => 'Test User 4',
            'email' => 'test4@gmail.com',
            'password' => bcrypt("password"),
            'permicao' => 1,
        ]);
        $user5 = User::factory()->create([
            'name' => 'Test User 5',
            'email' => 'test5@gmail.com',
            'password' => bcrypt("password"),
            'permicao' => 1,
        ]);
        $user6 = User::factory()->create([
            'name' => 'Test User 6',
            'email' => 'test6@gmail.com',
            'password' => bcrypt("password"),
            'permicao' => 1,
        ]);

        Post::factory()->for($user,'paciente')->create([
            'user_name' => $user->name,
            ]);
        Post::factory()->for($user2,'paciente')->create([
            'user_name' => $user2->name,
            ]);
        Post::factory()->for($user3,'paciente')->create([
            'user_name' => $user3->name,
            ]);
        Post::factory()->for($user4,'paciente')->create([
            'user_name' => $user4->name,
            ]);
        Post::factory()->for($user5,'paciente')->create([
            'user_name' => $user5->name,
            ]);
        Post::factory()->for($user6,'paciente')->create([
            'user_name' => $user6->name,
            ]);
        
    }
}
