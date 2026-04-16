<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Mascota;
use App\Models\Servicio;
use App\Models\Producto;
use App\Models\Cita;
use Carbon\Carbon;

class DashboardController extends Controller
{
    public function index()
    {
        $totalUsuarios = User::count();
        $totalMascotas = Mascota::count();
        $totalServicios = Servicio::count();
        $totalProductos = Producto::count();
        $citasHoy = Cita::whereDate('fecha', Carbon::today())->count();
        
        return view('admin.dashboard', compact(
            'totalUsuarios', 'totalMascotas', 'totalServicios', 'totalProductos', 'citasHoy'
        ));
    }
}