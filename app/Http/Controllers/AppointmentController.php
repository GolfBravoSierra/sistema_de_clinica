<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
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

    }

    public function store(Request $request)
    {
        $attributes=$request->validate([
            'date'=>'required',
            'time'=>'required',
            'paciente_name'=>'required',
            'psicologo_name'=>'required',   
        ]);

        $attributes = Appointment::Create($appointment);
        return Inertia::render('Appointments/Create');
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
