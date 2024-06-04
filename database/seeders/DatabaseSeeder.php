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

        $bubbles = User::factory()->create([
            'name' => 'Bubbles',
            'email' => 'bubbles@gmail.com',
            'password' => bcrypt("password"),
            'permicao' => 1,
        ]);

        $blossom = User::factory()->create([
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
      
        Appointment::factory(10)
            ->for($bubbles, 'paciente')
            ->for($blossom, 'psicologo')
            ->create(['paciente_nome'=> $bubbles->name,
                      'psicologo_nome' => $blossom->name]);

        Appointment::factory(10)
            ->for($userP, 'paciente')
            ->for($userBol, 'psicologo')
            ->create(['paciente_nome' => $userP->name,
                      'psicologo_nome' => $userBol->name]);
      
        Post::factory()->for($user,'paciente')->create([
            'user_name' => $user->name,
            ]);

        Post::factory()->for($bubbles,'paciente')->create([
             'user_name' => $bubbles->name,
            ]);
        Post::factory()->for($userP,'paciente')->create([
            'user_name' => $userP->name,
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
