<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\Appointment;

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
