<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UsuarioController extends Controller
{
    public function index()
    {
        $usuarios = User::with('mascotas')->orderBy('created_at', 'desc')->paginate(10);
        return view('admin.usuarios.index', compact('usuarios'));
    }
    
    public function show($id)
    {
        $usuario = User::with('mascotas', 'citas')->findOrFail($id);
        return view('admin.usuarios.show', compact('usuario'));
    }
    
    public function destroy($id)
    {
        $usuario = User::findOrFail($id);
        if ($usuario->hasRole('admin')) {
            return redirect()->back()->with('error', 'No puedes eliminar un administrador.');
        }
        $usuario->delete();
        return redirect()->route('admin.usuarios.index')->with('success', 'Usuario eliminado.');
    }
}