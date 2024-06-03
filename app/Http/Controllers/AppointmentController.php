<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Illuminate\Support\Facades\Auth;



class AppointmentController extends Controller
{

    public function index()
    {
        $appointments = Auth::user()->appointments();
        return Inertia::render('Home',['appointments' => $appointments]);
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
