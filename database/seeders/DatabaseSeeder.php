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
            'name' => 'Bubbles',
            'email' => 'bubbles@gmail.com',
            'password' => bcrypt("password"),
            'permicao' => 1,
        ]);

        User::factory()->create([
            'name' => 'Blossom',
            'email' => 'blossom@gmail.com',
            'password' => bcrypt("password"),
            'permicao' => 2,
        ]);

        User::factory()->create([
            'name' => 'Buttercup',
            'email' => 'buttercup@gmail.com',
            'password' => bcrypt("password"),
            'permicao' => 3,
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

        Appointment::factory(5)
            ->for($userP, 'paciente')
            ->for($userBol, 'psicologo')
            ->create(['paciente_nome' => $userP->name,
                      'psicologo_nome' => $userBol->name]);
    }
}
