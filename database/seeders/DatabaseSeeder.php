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

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@gmail.com',
            'password' => bcrypt("password"),
            'permicao' => 1,
        ]);

        $userP = User::factory()->create([
            'name' => 'Paciente Maluco',
            'email' => 'ola@gmail.com',
            'password' => bcrypt("password"),
            'permicao' => 1,
        ]);

        $userBol = User::factory()->create([
            'name' => 'Jair Messias Bolsonaro',
            'email' => 'bol@gmail.com',
            'password' => bcrypt("password"),
            'permicao' => 2,
        ]);

        Appointment::factory(2)
            ->for($userP, 'paciente')
            ->for($userBol, 'psicologo')
            ->create(['paciente_name' => $userP->name,
                      'psicologo_name' => $userBol->name]);
    }
}
