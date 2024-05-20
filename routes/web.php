<?php

use App\Http\Controllers\EmailController;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

// Route::post('/send_email', 'EmailController@sendEmail');
Route::post('/api/send-email', [EmailController::class, 'sendEmail']);


Route::get('/', function () {return Inertia::render('Index');});
Route::get('/login', function () {return Inertia::render('Login');});
Route::get('/contact', function () {return Inertia::render('Contact');});
Route::get('/patients', function () {return Inertia::render('Patients');});
Route::get('/about', function () {return Inertia::render('About');});