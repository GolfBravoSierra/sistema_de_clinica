<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Http\RedirectResponse;

class UserController extends Controller
{
    public function create(Request $request)
    {
        return Inertia::render('login');
    }

    public function login(Request $request): RedirectResponse
    {
        
        $user = $request->validate([
            'name' => 'required|string',
            'password' => 'required|string',
        ]);

        try {
            if(Auth::attempt($user)) {
                $request->session()->regenerate();

                return redirect('/');
                // return response()->json(['message' => (string)$user['name']], 200);
            } else {
                // return response()->json(['message' => 'jovane'], 200);
            }
        } catch (\Exception $e) {
            Log::error('Failed to log in: ' . $e->getMessage());
        }

        // return response()->json(['message' => 'OMAGAH'], 200);
    }
}
