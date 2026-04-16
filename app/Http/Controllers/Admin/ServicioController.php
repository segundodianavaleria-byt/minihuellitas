<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Servicio;
use Illuminate\Http\Request;

class ServicioController extends Controller
{
    public function index()
    {
        $servicios = Servicio::orderBy('created_at', 'desc')->paginate(10);
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
            'precio' => 'required|numeric|min:0',
            'duracion_minutos' => 'required|integer|min:5',
            'categoria' => 'required|string',
        ]);
        
        Servicio::create($request->all());
        return redirect()->route('admin.servicios.index')->with('success', 'Servicio creado.');
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
            'precio' => 'required|numeric|min:0',
            'duracion_minutos' => 'required|integer|min:5',
            'categoria' => 'required|string',
        ]);
        
        $servicio->update($request->all());
        return redirect()->route('admin.servicios.index')->with('success', 'Servicio actualizado.');
    }
    
    public function destroy($id)
    {
        $servicio = Servicio::findOrFail($id);
        $servicio->delete();
        return redirect()->route('admin.servicios.index')->with('success', 'Servicio eliminado.');
    }
    
    public function toggle($id)
    {
        $servicio = Servicio::findOrFail($id);
        $servicio->update(['activo' => !$servicio->activo]);
        return redirect()->back()->with('success', 'Estado actualizado.');
    }
}