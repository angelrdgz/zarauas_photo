<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login()
    {
        return view('auth.login');
    }

    public function loginPost(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ], [
            'email.required' => 'El email es requerido',
            'email.email' => 'El email debe tener un formato válido',
            'password.required' => 'La contraseña es requerida',
        ]);

        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            if (Auth::user()->email_verified_at == NULL) {
                Auth::logout();
                return redirect()->back()->with('unverified', 'Su cuenta aun no ha sido verificada.');
            }

            return redirect()->intended('admin/albumes');
        } else {
            return redirect()->back()->with('error', 'Email y/o contraseña incorrectos');
        }
    }

    public function logout(Request $request)
    {
        Auth::logout();
        return redirect('/')->with('success', 'Cerró sesión correctamente.');
    }
}
