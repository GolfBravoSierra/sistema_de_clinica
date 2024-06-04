<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\EmailController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;
use App\Models\User;
use App\Models\Appointment;

Route::post('/api/send-email', [EmailController::class, 'sendEmail']);

Route::get('/login',[LoginController::class, 'create'])->name('login');
Route::post('/login',[LoginController::class, 'store']);
Route::post('/logout',[LoginController::class, 'destroy'])->middleware('auth');

Route::middleware('auth')->group(function (){

    Route::get('/{user}/arealogada',[AppointmentController::class, 'index']);

    Route::get('/appointments/create',[AppointmentController::class, 'create']);
    Route::post('/appointments/create',[AppointmentController::class, 'store']);
    Route::get('/appointments/update',[AppointmentController::class, 'edit']);//->can('update', Auth::user());
    Route::post('/appointments/update',[AppointmentController::class, 'update']);//->can('update', Auth::user());
    Route::post('/appointments/destroy',[AppointmentController::class, 'destroy']);

    // Route::get('/{user}/appointments/create',[AppointmentController::class, 'create'])->can('create', Auth::user());
    // Route::post('/{user}/appointments/create',[AppointmentController::class, 'store'])->can('create', Auth::user());
    // Route::get('/{user}/appointments/update',[AppointmentController::class, 'edit'])->can('update', Auth::user());
    // Route::post('/{user}/appointments/update',[AppointmentController::class, 'update'])->can('update', Auth::user());
    
    Route::post('/patients/post',[PostController::class, 'store']);//->can('create', Auth::user());
    Route::post('/patients/post/update',[PostController::class, 'update']);//->can('update', Auth::user());
    Route::post('/patients/post/destroy',[PostController::class, 'destroy']);//->can('destroy', Auth::user());

    // Secretária, que trabalha o dia inteiro comigo    //
    // Estou correndo um grande perigo                  //
    // De ir parar no tribunal                          //
    // Secretária, às vezes penso em falar contigo      //
    // Mas tenho medo de ser confundido                 //
    Route::get('/secretaria', function () {return Inertia::render('Secretaria');}); //temporario para testar a area da secretaria
    Route::get('/add-patients', [UserController::class, 'secretaria_addpatients']);
    Route::get('/manage-appointments', [UserController::class, 'secretaria_appointments']);
    Route::post('/onGoingAppointment', [UserController::class, 'secretaria_onGoingAppointment']);
    Route::post('/newPatient', [UserController::class, 'secretaria_newPatient']);

});

Route::get('/patients',[PostController::class, 'create']);
Route::get('/', function () {return Inertia::render('Index');});
//Route::get('/login', [UserController::class, 'login']);
Route::get('/contact', function () {return Inertia::render('Contact');});
Route::get('/about', function () {return Inertia::render('About');});
//Route::get('/home', function () {return Inertia::render('Home');});

