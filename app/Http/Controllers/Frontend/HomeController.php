<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Servicio;
use App\Models\Producto;

class HomeController extends Controller
{
    /**
     * Muestra la página principal
     */
    public function index()
    {
        // Obtener servicios activos (los primeros 4 para mostrar)
        $servicios = Servicio::where('activo', true)
            ->take(4)
            ->get();
        
        // Obtener productos disponibles (los primeros 4 para mostrar)
        $productos = Producto::where('disponible_online', true)
            ->take(4)
            ->get();
        
        // Pasar los datos a la vista
        return view('frontend.home', compact('servicios', 'productos'));
    }
    
    /**
     * Muestra la página "Nosotros"
     */
    public function nosotros()
    {
        return view('frontend.nosotros');
    }
    
    /**
     * Muestra la página de contacto
     */
    public function contacto()
    {
        return view('frontend.contacto');
    }
    
    /**
     * Procesa el formulario de contacto
     */
    public function enviarContacto(Request $request)
    {
        // Validar los datos del formulario
        $request->validate([
            'nombre' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'telefono' => 'nullable|string|max:20',
            'mensaje' => 'required|string|min:10',
        ]);
        
        // Aquí puedes guardar en la base de datos o enviar email
        // Por ahora solo redirigimos con mensaje de éxito
        
        return redirect()->route('contacto')
            ->with('success', '¡Mensaje enviado con éxito! Te contactaremos pronto.');
    }
}