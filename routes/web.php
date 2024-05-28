<?php

use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Models\User;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\EmailController;

// Route::post('/send_email', 'EmailController@sendEmail');
Route::post('/api/send-email', [EmailController::class, 'sendEmail']);

Route::post('/login-submit', [UserController::class, 'login']);

Route::get('/login',[LoginController::class, 'create'])->name('Login');

Route::middleware('auth')->group(function (){
    Route::get('/home', function () {return Inertia::render('home');});
});

Route::get('/', function () {return Inertia::render('Index');});
//Route::get('/login', [UserController::class, 'login']);
Route::get('/contact', function () {return Inertia::render('Contact');});
Route::get('/patients', function () {return Inertia::render('Patients');});
Route::get('/about', function () {return Inertia::render('About');});
Route::get('/home', function () {return Inertia::render('home');});

