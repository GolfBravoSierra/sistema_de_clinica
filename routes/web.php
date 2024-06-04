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

Route::post('/api/send-email', [EmailController::class, 'sendEmail']);

Route::get('/login',[LoginController::class, 'create'])->name('login');
Route::post('/login',[LoginController::class, 'store']);
Route::post('/logout',[LoginController::class, 'destroy'])->middleware('auth');

Route::middleware('auth')->group(function (){
    Route::get('/{user}/patient',[AppointmentController::class, 'index'])->can('view', Auth::user());
    Route::post('/{user}/patient',[AppointmentController::class, 'destroy'])->can('destroy', Auth::user());
    Route::get('/home', function () {return Inertia::render('Home');}); // Tirar isso e deixar só o index de cima como a area logada?

    // Route::get('/{user}/appointments/create',[AppointmentController::class, 'create'])->can('create', Auth::user());
    // Route::post('/{user}/appointments/create',[AppointmentController::class, 'store'])->can('create', Auth::user());
    // Route::get('/{user}/appointments/update',[AppointmentController::class, 'edit'])->can('update', Auth::user());
    // Route::post('/{user}/appointments/update',[AppointmentController::class, 'update'])->can('update', Auth::user());

    Route::post('/patients/post',[PostController::class, 'store'])->can('create', Auth::user());
    Route::post('/patients/post/update',[PostController::class, 'update'])->can('update', Auth::user());
    Route::post('/patients/post/destroy',[PostController::class, 'destroy'])->can('destroy', Auth::user());

    // Secretária, que trabalha o dia inteiro comigo    //
    // Estou correndo um grande perigo                  //
    // De ir parar no tribunal                          //
    // Secretária, às vezes penso em falar contigo      //
    // Mas tenho medo de ser confundido                 //
    Route::get('/seggs', function () {return Inertia::render('Secretaria');}); //temporario para testar a area da secretaria
    Route::get('/add-patients', [UserController::class, 'secretaria_addpatients']);
    Route::get('/manage-appointments', [UserController::class, 'secretaria_appointments']);
    Route::post('/onGoingAppointment', [UserController::class, 'secretaria_onGoingAppointment']);
    Route::post('/newPatient', [UserController::class, 'secretaria_newPatient']);

});

Route::get('/', function () {return Inertia::render('Index');});
//Route::get('/login', [UserController::class, 'login']);
Route::get('/contact', function () {return Inertia::render('Contact');});
Route::get('/patients', function () {return Inertia::render('Patients');});
Route::get('/about', function () {return Inertia::render('About');});
//Route::get('/home', function () {return Inertia::render('Home');});

