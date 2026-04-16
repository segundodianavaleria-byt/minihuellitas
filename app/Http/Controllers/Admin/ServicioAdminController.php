<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Servicio;
use Illuminate\Http\Request;

class ServicioAdminController extends Controller
{
    public function index()
    {
        $servicios = Servicio::withTrashed()->orderBy('created_at', 'desc')->paginate(10);
        return view('admin.servicios.index', compact('servicios'));
    }

    public function create()
    {
        return view('admin.servicios.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'descripcion' => 'required|string',
            'imagen' => 'nullable|string|max:500',
            'precio' => 'required|numeric|min:0',
            'duracion_minutos' => 'required|integer|min:5',
            'categoria' => 'required|string',
            'activo' => 'nullable|boolean',
        ]);

        $data = $request->all();
        $data['activo'] = $request->has('activo');
        
        Servicio::create($data);
        
        return redirect()->route('admin.servicios')->with('success', 'Servicio creado exitosamente.');
    }

    public function edit($id)
    {
        $servicio = Servicio::findOrFail($id);
        return view('admin.servicios.edit', compact('servicio'));
    }

    public function update(Request $request, $id)
    {
        $servicio = Servicio::findOrFail($id);
        
        $request->validate([
            'nombre' => 'required|string|max:255',
            'descripcion' => 'required|string',
            'imagen' => 'nullable|string|max:500',
            'precio' => 'required|numeric|min:0',
            'duracion_minutos' => 'required|integer|min:5',
            'categoria' => 'required|string',
            'activo' => 'nullable|boolean',
        ]);

        $data = $request->all();
        $data['activo'] = $request->has('activo');
        
        $servicio->update($data);
        
        return redirect()->route('admin.servicios')->with('success', 'Servicio actualizado exitosamente.');
    }

    public function destroy($id)
    {
        $servicio = Servicio::findOrFail($id);
        $servicio->delete();
        return redirect()->route('admin.servicios')->with('success', 'Servicio movido a papelera.');
    }

    public function restore($id)
    {
        $servicio = Servicio::withTrashed()->findOrFail($id);
        $servicio->restore();
        return redirect()->route('admin.servicios')->with('success', 'Servicio restaurado exitosamente.');
    }

    public function forceDelete($id)
    {
        $servicio = Servicio::withTrashed()->findOrFail($id);
        $servicio->forceDelete();
        return redirect()->route('admin.servicios')->with('success', 'Servicio eliminado permanentemente.');
    }

    public function toggle($id)
    {
        $servicio = Servicio::findOrFail($id);
        $servicio->update(['activo' => !$servicio->activo]);
        return redirect()->route('admin.servicios')->with('success', 'Estado actualizado.');
    }
}