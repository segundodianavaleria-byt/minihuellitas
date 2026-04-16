<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Servicio;
use Illuminate\Http\Request;

class ServicioController extends Controller
{
    public function index()
    {
        // Obtener servicios por categoría
        $cortes = Servicio::where('categoria', 'corte')
                          ->where('activo', true)
                          ->where('es_paquete', false)
                          ->get();
        
        $banos = Servicio::where('categoria', 'baño')
                         ->where('activo', true)
                         ->where('es_paquete', false)
                         ->get();
        
        $spas = Servicio::where('categoria', 'spa')
                        ->where('activo', true)
                        ->where('es_paquete', false)
                        ->get();
        
        $salud = Servicio::where('categoria', 'salud')
                         ->where('activo', true)
                         ->where('es_paquete', false)
                         ->get();
        
        $urgencias = Servicio::where('categoria', 'urgencia')
                             ->where('activo', true)
                             ->where('es_paquete', false)
                             ->get();
        
        $entrenamiento = Servicio::where('categoria', 'entrenamiento')
                                 ->where('activo', true)
                                 ->where('es_paquete', false)
                                 ->get();
        
        // Obtener paquetes
        $paquetes = Servicio::where('es_paquete', true)
                            ->where('activo', true)
                            ->get();
        
        return view('frontend.servicios.index', compact(
            'cortes', 'banos', 'spas', 'salud', 'urgencias', 'entrenamiento', 'paquetes'
        ));
    }
    
    public function show($id)
    {
        $servicio = Servicio::findOrFail($id);
        return view('frontend.servicios.show', compact('servicio'));
    }
}