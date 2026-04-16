<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $user = auth()->user();
        $mascotas = $user->mascotas;
        $citas = $user->citas()->where('fecha', '>=', now())->orderBy('fecha')->take(5)->get();
        
        return view('dashboard', compact('user', 'mascotas', 'citas'));
    }
}