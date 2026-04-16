<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Mascota;
use App\Models\Servicio;
use App\Models\Producto;
use App\Models\Cita;
use Carbon\Carbon;

class DashboardAdminController extends Controller
{
    public function index()
    {
        $totalUsuarios = User::count();
        $totalMascotas = Mascota::count();
        $totalServicios = Servicio::count();
        $totalProductos = Producto::count();
        $citasHoy = Cita::whereDate('fecha', Carbon::today())->count();
        $citasPendientes = Cita::where('estado', 'pendiente')->count();
        
        $citasRecientes = Cita::with(['user', 'servicio', 'mascota'])
            ->orderBy('created_at', 'desc')
            ->take(5)
            ->get();
        
        $usuariosRecientes = User::orderBy('created_at', 'desc')->take(5)->get();
        
        return view('admin.dashboard', compact(
            'totalUsuarios', 'totalMascotas', 'totalServicios', 'totalProductos',
            'citasHoy', 'citasPendientes', 'citasRecientes', 'usuariosRecientes'
        ));
    }
}