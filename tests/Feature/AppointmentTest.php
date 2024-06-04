<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;
use App\Models\Appointment;

class AppointmentTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_can_the_appointment_be_read(): void
    {
        $user = User::factory()->create([
            'permicao' => 1,
        ]);

        $appointment = Appointment::factory()->for($user, 'paciente')->create([
            'paciente_name' => $user->name, 
            'psicologo_id' => 7,
            'psicologo_name' => 'Cabrau',
        ]);

        $response = $this->actingAs($user)
                         ->withSession(['banned' => false])
                         ->get('/'. $user->id. '/arealogada');

        $response->assertSee($appointment->id);
    }
    public function test_can_create_a_appointment(): void
    {
        $user = User::factory()->create([
            'permicao' => 1,
        ]);

        $appointment = Appointment::factory()->for($user, 'paciente')->make([
            'paciente_name' => $user->name, 
            'psicologo_id' => 7,
            'psicologo_name' => 'Cabrau',
            'id' => 5,
        ]);


        $this->post('/appointments/create', $appointment->toArray());

        $this->assertDatabaseHas('appointments', ['id' => $appointment->id]);

    }


    public function test_can_update_a_appointment(): void
    {
        $user = User::factory()->create([
            'permicao' => 1,
        ]);

        $appointment = Appointment::factory()->for($user, 'paciente')->create([
            'paciente_name' => $user->name, 
            'psicologo_id' => 7,
            'psicologo_name' => 'Cabrau',
        ]);

        $appointment->time ="21:47";
        

        $response = $this->actingAs($user)
        ->withSession(['banned' => false])
        ->post('/appointments/update', $appointment->toArray(), $appointment->toArray());

        $this->assertDatabaseHas('appointments',['id'=> $appointment->id, 'time' => "21:47"]);
    }
    public function test_can_delete_a_appointment(): void
    {
        $user = User::factory()->create([
            'permicao' => 2,
        ]);

        $appointment = Appointment::factory()->for($user, 'paciente')->create([
            'paciente_name' => $user->name, 
            'psicologo_id' => 10,
            'psicologo_name' => 'Cabrau',
        ]);

        $response = $this->actingAs($user)
        ->withSession(['banned' => false])
        ->post('/appointments/destroy', $appointment->toArray());
        $this->assertDatabaseMissing('appointments', ['id' => $appointment->id]);
    }

    
}
