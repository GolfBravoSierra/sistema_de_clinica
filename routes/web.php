<?php

use App\Http\Controllers\EmailController;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Models\User;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Auth\LoginController;

// Route::post('/send_email', 'EmailController@sendEmail');
Route::post('/api/send-email', [EmailController::class, 'sendEmail']);

Route::get('/login',[LoginController::class, 'create'])->name('login');
Route::post('/login',[LoginController::class, 'store']);
Route::post('/logout',[LoginController::class, 'destroy'])->middleware('auth');

Route::get('/home', function () {return Inertia::render('Home');})->middleware('auth');

Route::get('/', function () {return Inertia::render('Index');});
//Route::get('/login', [UserController::class, 'login']);
Route::get('/contact', function () {return Inertia::render('Contact');});
Route::get('/patients', function () {return Inertia::render('Patients');});
Route::get('/about', function () {return Inertia::render('About');});
//Route::get('/home', function () {return Inertia::render('Home');});

