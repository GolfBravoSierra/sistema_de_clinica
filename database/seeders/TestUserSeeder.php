<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TestUserSeeder extends Seeder1
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        \App\Models\User::factory()->create([
            'name' => 'testuser',
            'email' => 'test@example.com',
            'password' => bcrypt('password'),
            'permicao' => 1,
            'cep' => '12345678',
        ]);
    }
    
    public function run()
    {
        $this->call(TestUserSeeder::class);
    }

    
}
