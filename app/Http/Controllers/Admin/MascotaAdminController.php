<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Mascota;
use Illuminate\Http\Request;

class MascotaAdminController extends Controller
{
    public function index()
    {
        $mascotas = Mascota::withTrashed()->with('user')->orderBy('created_at', 'desc')->paginate(10);
        return view('admin.mascotas.index', compact('mascotas'));
    }

    public function show($id)
    {
        $mascota = Mascota::withTrashed()->with('user', 'citas')->findOrFail($id);
        return view('admin.mascotas.show', compact('mascota'));
    }

    public function destroy($id)
    {
        $mascota = Mascota::findOrFail($id);
        $mascota->delete();
        return redirect()->route('admin.mascotas')->with('success', 'Mascota movida a papelera.');
    }

    public function restore($id)
    {
        $mascota = Mascota::withTrashed()->findOrFail($id);
        $mascota->restore();
        return redirect()->route('admin.mascotas')->with('success', 'Mascota restaurada exitosamente.');
    }

    public function forceDelete($id)
    {
        $mascota = Mascota::withTrashed()->findOrFail($id);
        $mascota->forceDelete();
        return redirect()->route('admin.mascotas')->with('success', 'Mascota eliminada permanentemente.');
    }
}