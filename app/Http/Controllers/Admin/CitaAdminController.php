<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Cita;
use Illuminate\Http\Request;

class CitaAdminController extends Controller
{
    public function index()
    {
        $citas = Cita::withTrashed()->with(['user', 'servicio', 'mascota'])->orderBy('created_at', 'desc')->paginate(15);
        return view('admin.citas.index', compact('citas'));
    }

    public function show($id)
    {
        $cita = Cita::withTrashed()->with(['user', 'servicio', 'mascota'])->findOrFail($id);
        return view('admin.citas.show', compact('cita'));
    }

    public function updateEstado(Request $request, $id)
    {
        $cita = Cita::findOrFail($id);
        $request->validate(['estado' => 'required|in:pendiente,confirmada,completada,cancelada']);
        $cita->update(['estado' => $request->estado]);
        return redirect()->route('admin.citas')->with('success', 'Estado de cita actualizado.');
    }

    public function destroy($id)
    {
        $cita = Cita::findOrFail($id);
        $cita->delete();
        return redirect()->route('admin.citas')->with('success', 'Cita movida a papelera.');
    }

    public function restore($id)
    {
        $cita = Cita::withTrashed()->findOrFail($id);
        $cita->restore();
        return redirect()->route('admin.citas')->with('success', 'Cita restaurada exitosamente.');
    }

    public function forceDelete($id)
    {
        $cita = Cita::withTrashed()->findOrFail($id);
        $cita->forceDelete();
        return redirect()->route('admin.citas')->with('success', 'Cita eliminada permanentemente.');
    }
}