<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Test User',
<<<<<<< Updated upstream
            'email' => 'test@example.com',
            'password' => bcrypt('password'),
            'permicao' => 1,
            'cep' => '12345678',
=======
            'email' => 'test@gmail.com',
            'password' => bcrypt("password"),
            'permicao' => 1,
            'cep' => 23456789,
>>>>>>> Stashed changes
        ]);
    }
}
