<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Cita;
use Illuminate\Http\Request;

class CitaController extends Controller
{
    public function index()
    {
        $citas = Cita::with(['user', 'servicio', 'mascota'])->orderBy('created_at', 'desc')->paginate(15);
        return view('admin.citas.index', compact('citas'));
    }
    
    public function show($id)
    {
        $cita = Cita::with(['user', 'servicio', 'mascota'])->findOrFail($id);
        return view('admin.citas.show', compact('cita'));
    }
    
    public function updateEstado(Request $request, $id)
    {
        $cita = Cita::findOrFail($id);
        $request->validate(['estado' => 'required|in:pendiente,confirmada,completada,cancelada']);
        $cita->update(['estado' => $request->estado]);
        return redirect()->back()->with('success', 'Estado actualizado.');
    }
    
    public function destroy($id)
    {
        $cita = Cita::findOrFail($id);
        $cita->delete();
        return redirect()->route('admin.citas.index')->with('success', 'Cita eliminada.');
    }
}