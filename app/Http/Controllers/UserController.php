<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function create(Request $request)
    {
        return Inertia::render('login');
    }

    public function login(Request $request)
    {

        // $user = DB::table('users')
        //         ->where('name', '=', $request->username)
        //         ->where('password', '=', $request->password)
        //         ->findOrFail();
        // ddd($user);

        // return Inertia::render('home');
        return response()->json(['message' => $request.username], 200);
    }
}
