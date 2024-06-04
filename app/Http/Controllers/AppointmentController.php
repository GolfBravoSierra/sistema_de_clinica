<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\User;
use Illuminate\Http\Request;

use Inertia\Inertia;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;

class AppointmentController extends Controller
{

    public function index()
    {
        $user = Auth::user();
        $appointments = Appointment::where('paciente_id', $user->id)->get();
        return Inertia::render('Appointment/Index',
            ['user'=> $user,
            'appointments' => $appointments]);
    }

    public function create(Request $request)
    {
        $user = Auth::user();
        return Inertia::render('Appointment/Create',
            ['user'=> $user]);
    }

    public function store(Request $request)
    {
        $user = Auth::user();
        $psicologo = User::first()->where('permicao', 2);
        $attributes=$request->all();

        Appointment::factory()->create([
            'date' => $attributes->date,
            'time' => $attributes->time,
            'paciente_name' => $attributes->paciente_name,
            'paciente_id' => $attributes->paciente_id,
            'psicologo_name' => $psicologo->name,
            'psicologo_id' => $psicologo->id,
            'status'=> 0,
        ]);
    }

    public function edit(Appointment $appointment)
    {
        return Inertia::render('Appointment/Edit', ['appointment' => $appointment]);
    }

    public function update(Request $request, Appointment $appointment): RedirectResponse
    {
        //dd($request->all());
        $appointment = Appointment::findOrFail($request->id);
        $appointment->update($request->all());
        //dd($appointment);
        $user = Auth::user();
        return redirect('/'. $user->id. '/arealogada');
    }

    public function destroy(Request $request): RedirectResponse
    {
        $appointment = Appointment::findOrFail($request->id);
        $appointment->delete();
        $user = Auth::user();
        return redirect('/'. $user->id. '/arealogada');
    }

    
}
