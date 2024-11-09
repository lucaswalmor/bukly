<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            $user = Auth::user();
            $token = $user->createToken('buckly')->plainTextToken;

            session()->put('user', $user);
            session()->put('token', $token);

            // return Inertia::render('Home');
            return redirect()->route('home');
        }

        return Inertia::render('auth/Login', [
            'error' => 'Não autorizado'
        ]);
    }
}
