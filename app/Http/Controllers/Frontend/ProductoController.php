<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Producto;
use Illuminate\Http\Request;

class ProductoController extends Controller
{
    public function index()
    {
        // Obtener productos por categoría
        $alimentos = Producto::where('categoria', 'alimento')
                             ->where('disponible_online', true)
                             ->get();
        
        $aseo = Producto::where('categoria', 'aseo')
                        ->where('disponible_online', true)
                        ->get();
        
        $juguetes = Producto::where('categoria', 'juguete')
                            ->where('disponible_online', true)
                            ->get();
        
        $accesorios = Producto::where('categoria', 'accesorio')
                              ->where('disponible_online', true)
                              ->get();
        
        $snacks = Producto::where('categoria', 'snack')
                          ->where('disponible_online', true)
                          ->get();
        
        // Obtener productos en oferta
        $ofertas = Producto::where('en_oferta', true)
                           ->where('disponible_online', true)
                           ->get();
        
        return view('frontend.productos.index', compact(
            'alimentos', 'aseo', 'juguetes', 'accesorios', 'snacks', 'ofertas'
        ));
    }
    
    public function show($id)
    {
        $producto = Producto::findOrFail($id);
        return view('frontend.productos.show', compact('producto'));
    }
}