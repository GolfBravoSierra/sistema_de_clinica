<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Appointment;
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
        Appointment::factory(5)->create([]);
    }
}
