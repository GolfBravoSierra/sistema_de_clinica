<?php

namespace App\Http\Controllers\Auth;
use Illuminate\Suport\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
<<<<<<< Updated upstream
use Illuminate\Validation\ValidationException;
=======
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
>>>>>>> Stashed changes
use Inertia\Inertia;

class LoginController extends Controller
{
    public function create()
    {
        return Inertia::render('Auth/Login');
    }

    public function store(): RedirectResponse
    {



        $credentials = request()->validate([
            'name' => ['required'],
            'password' => ['required'],
        ]);
 
        

        if (Auth::attempt($credentials)) {
            session()->regenerate();
            return redirect('/home');
        }
 
        return back()->withErrors([
            'name' => 'The provided credentials do not match our records.',
        ])->onlyInput('name');
    }
    public function store(): RedirectResponse
    {
        $attributes = request()->validate([
            'name' => 'required',
            'password' => 'required',
        ]);
        
        if(Auth::attempt($attributes)){
            request()->session()->regenerate();
            return redirect('/');
        }

        return back()->withErrors([
            'name' => 'The provided credentials do not match our records.',
        ])->onlyInput('name');
    }
}
