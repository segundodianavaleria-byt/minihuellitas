<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function index()
    {
        $user = auth()->user();
        return view('profile.index', compact('user'));
    }
    
    public function update(Request $request)
    {
        $user = auth()->user();
        
        $request->validate([
            'name' => 'required|string|max:255|regex:/^[a-zA-ZáéíóúñÑ\s]+$/',
            'telefono' => 'required|string|max:20|regex:/^[0-9+\-\s]+$/',
            'direccion' => 'nullable|string|max:255',
        ], [
            'name.regex' => 'El nombre solo puede contener letras',
            'telefono.regex' => 'El teléfono solo puede contener números',
        ]);
        
        $user->update($request->only(['name', 'telefono', 'direccion']));
        
        return back()->with('success', 'Perfil actualizado correctamente.');
    }
    
    public function updatePassword(Request $request)
    {
        $request->validate([
            'current_password' => 'required|current_password',
            'password' => 'required|confirmed|min:8|regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)/',
        ], [
            'current_password.current_password' => 'La contraseña actual es incorrecta',
            'password.regex' => 'La contraseña debe contener al menos una mayúscula, una minúscula y un número',
        ]);
        
        auth()->user()->update([
            'password' => Hash::make($request->password),
        ]);
        
        return back()->with('success', 'Contraseña actualizada correctamente.');
    }
}