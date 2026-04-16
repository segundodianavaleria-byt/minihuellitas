<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Mascota;
use App\Models\User;
use Illuminate\Http\Request;

class MascotaController extends Controller
{
    public function index()
    {
        $mascotas = Mascota::with('user')->orderBy('created_at', 'desc')->paginate(15);
        return view('admin.mascotas.index', compact('mascotas'));
    }
    
    public function show($id)
    {
        $mascota = Mascota::with('user', 'citas')->findOrFail($id);
        return view('admin.mascotas.show', compact('mascota'));
    }
    
    public function destroy($id)
    {
        $mascota = Mascota::findOrFail($id);
        $mascota->delete();
        
        return redirect()->route('admin.mascotas.index')
            ->with('success', 'Mascota eliminada exitosamente.');
    }
}