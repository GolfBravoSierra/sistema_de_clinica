<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use Illuminate\Support\Facades\Log;
use App\Models\Appointment;
use App\Models\User; 

class UserController extends Controller
{
    public function secretaria_addpatients()
    {
        return Inertia::render('AddPatients');
    }

    public function secretaria_appointments()
    {   
        return Inertia::render('ApointmentsSecretaria', ['appointments' => Appointment::all()]);
    }

    public function secretaria_onGoingAppointment(Request $request)
    {
        $appointment = Appointment::find($request->id);
        $appointment->status = 1;
        $appointment->save();
        return Inertia::render('ApointmentsSecretaria', ['appointments' => Appointment::all()]);
    }

    public function secretaria_newPatient(Request $request)
    {
        try {
            User::factory()->create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => bcrypt($request->password),
                'cep' => (int)$request->cep,
                'permicao' => 1,
            ]);
        } catch (\Exception $e) {
            Log::error('Failed to send email: ' . $e->getMessage());
        }
        return response()->json(['message' => 'usuario cadastrado!'], 200);
    }

    public function index()
    {
        //
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function edit()
    {
        //
    }

    public function update(Request $request)
    {
        //
    }

    public function destroy(Request $request)
    {
        //
    }
}
