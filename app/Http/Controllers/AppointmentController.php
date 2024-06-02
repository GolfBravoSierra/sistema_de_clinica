<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use Illuminate\Http\Request;

class AppointmentController extends Controller
{
    public function index()
    {
        return Inertia::render('Appointments/Index',
        ['user' == Auth::user()]
    );
    }

    public function create()
    {
        return Inertia::render('Appointments/Create');
    }

    public function store(Request $request)
    {
        //
    }

    public function edit(Appointments $appointments)
    {
        //
    }

    public function update(Request $request, Appointments $appointments)
    {
        //
    }

    public function destroy(Appointments $appointments)
    {
        //
    }
}
