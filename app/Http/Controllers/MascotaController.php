<?php

namespace App\Http\Controllers;

use App\Models\Mascota;
use Illuminate\Http\Request;

class MascotaController extends Controller
{
    public function index()
    {
        $mascotas = auth()->user()->mascotas;
        return view('mascotas.index', compact('mascotas'));
    }
    
    public function create()
    {
        return view('mascotas.create');
    }
    
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:100|regex:/^[a-zA-ZáéíóúñÑ\s]+$/',
            'especie' => 'required|in:perro,gato,conejo,ave,otro',
            'raza' => 'nullable|string|max:100',
            'edad' => 'nullable|numeric|min:0|max:30',
            'sexo' => 'nullable|in:macho,hembra',
            'peso' => 'nullable|numeric|min:0|max:100',
            'observaciones_medicas' => 'nullable|string|max:500',
        ], [
            'nombre.regex' => 'El nombre solo puede contener letras',
            'especie.in' => 'Selecciona una especie válida',
            'edad.min' => 'La edad no puede ser negativa',
            'edad.max' => 'La edad no puede ser mayor a 30 años',
            'peso.min' => 'El peso no puede ser negativo',
            'peso.max' => 'El peso no puede ser mayor a 100 kg',
        ]);
        
        Mascota::create([
            'user_id' => auth()->id(),
            'nombre' => $request->nombre,
            'especie' => $request->especie,
            'raza' => $request->raza,
            'edad' => $request->edad,
            'sexo' => $request->sexo,
            'peso' => $request->peso,
            'observaciones_medicas' => $request->observaciones_medicas,
        ]);
        
        return redirect()->route('mascotas.index')
            ->with('success', '¡Mascota registrada exitosamente!');
    }
    
    public function edit($id)
    {
        $mascota = Mascota::where('user_id', auth()->id())->findOrFail($id);
        return view('mascotas.edit', compact('mascota'));
    }
    
    public function update(Request $request, $id)
    {
        $mascota = Mascota::where('user_id', auth()->id())->findOrFail($id);
        
        $request->validate([
            'nombre' => 'required|string|max:100|regex:/^[a-zA-ZáéíóúñÑ\s]+$/',
            'especie' => 'required|in:perro,gato,conejo,ave,otro',
            'raza' => 'nullable|string|max:100',
            'edad' => 'nullable|numeric|min:0|max:30',
            'sexo' => 'nullable|in:macho,hembra',
            'peso' => 'nullable|numeric|min:0|max:100',
            'observaciones_medicas' => 'nullable|string|max:500',
        ]);
        
        $mascota->update($request->all());
        
        return redirect()->route('mascotas.index')
            ->with('success', '¡Mascota actualizada exitosamente!');
    }
    
    public function destroy($id)
    {
        $mascota = Mascota::where('user_id', auth()->id())->findOrFail($id);
        $mascota->delete();
        
        return redirect()->route('mascotas.index')
            ->with('success', '¡Mascota eliminada exitosamente!');
    }
}