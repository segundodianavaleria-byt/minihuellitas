<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials, $request->remember)) {
            $request->session()->regenerate();
            
            if (auth()->user()->hasRole('admin')) {
                return redirect()->intended('admin');
            }
            
            return redirect()->intended('dashboard');
        }

        return back()->withErrors([
            'email' => 'Las credenciales no coinciden con nuestros registros.',
        ])->onlyInput('email');
    }

    public function logout(Request $request)
{
    Auth::logout();
    
    // Invalidar la sesión
    $request->session()->invalidate();
    
    // Regenerar el token CSRF
    $request->session()->regenerateToken();
    
    // Limpiar todas las cookies de sesión
    foreach ($request->cookies as $name => $value) {
        setcookie($name, '', time() - 3600, '/');
    }
    return redirect('/')->with('success', 'Has cerrado sesión correctamente.');
}
}
