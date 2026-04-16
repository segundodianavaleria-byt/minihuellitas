<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UsuarioAdminController extends Controller
{
    public function index()
    {
        $usuarios = User::withTrashed()->with('mascotas')->orderBy('created_at', 'desc')->paginate(10);
        return view('admin.usuarios.index', compact('usuarios'));
    }

    public function show($id)
    {
        $usuario = User::withTrashed()->with('mascotas', 'citas')->findOrFail($id);
        return view('admin.usuarios.show', compact('usuario'));
    }

    public function destroy($id)
    {
        $usuario = User::findOrFail($id);
        if ($usuario->hasRole('admin')) {
            return redirect()->back()->with('error', 'No puedes eliminar un administrador.');
        }
        $usuario->delete();
        return redirect()->route('admin.usuarios')->with('success', 'Usuario movido a papelera.');
    }

    public function restore($id)
    {
        $usuario = User::withTrashed()->findOrFail($id);
        $usuario->restore();
        return redirect()->route('admin.usuarios')->with('success', 'Usuario restaurado exitosamente.');
    }

    public function forceDelete($id)
    {
        $usuario = User::withTrashed()->findOrFail($id);
        if ($usuario->hasRole('admin')) {
            return redirect()->back()->with('error', 'No puedes eliminar un administrador.');
        }
        $usuario->forceDelete();
        return redirect()->route('admin.usuarios')->with('success', 'Usuario eliminado permanentemente.');
    }
}