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

// Route::post('/send_email', 'EmailController@sendEmail');
Route::post('/api/send-email', [EmailController::class, 'sendEmail']);

Route::get('/login',[LoginController::class, 'create'])->name('login');
Route::post('/login',[LoginController::class, 'store']);
Route::post('/logout',[LoginController::class, 'destroy'])->middleware('auth');

Route::middleware('auth')->group(function (){
    Route::get('/home',[AppointmentController::class, 'index']);//->can('view', Auth::user());
    Route::post('/{user}/patient',[AppointmentController::class, 'destroy'])->can('destroy', Auth::user());
    //Route::get('/home', function () {return Inertia::render('Home');}); // Tirar isso e deixar só o index de cima como a area logada?

    // Route::get('/{user}/appointments/create',[AppointmentController::class, 'create'])->can('create', Auth::user());
    // Route::post('/{user}/appointments/create',[AppointmentController::class, 'store'])->can('create', Auth::user());
    // Route::get('/{user}/appointments/update',[AppointmentController::class, 'edit'])->can('update', Auth::user());
    // Route::post('/{user}/appointments/update',[AppointmentController::class, 'update'])->can('update', Auth::user());

    Route::post('/patients/post',[PostController::class, 'store'])->can('create', Auth::user());
    Route::post('/patients/post/update',[PostController::class, 'update'])->can('update', Auth::user());
    Route::post('/patients/post/destroy',[PostController::class, 'destroy'])->can('destroy', Auth::user());
});

Route::get('/', function () {return Inertia::render('Index');});
//Route::get('/login', [UserController::class, 'login']);
Route::get('/contact', function () {return Inertia::render('Contact');});
Route::get('/patients', function () {return Inertia::render('Patients');});
Route::get('/about', function () {return Inertia::render('About');});
//Route::get('/home', function () {return Inertia::render('Home');});

