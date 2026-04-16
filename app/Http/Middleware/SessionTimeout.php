<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SessionTimeout
{
    public function handle(Request $request, Closure $next)
    {
        // Si el usuario está autenticado
        if (Auth::check()) {
            $lastActivity = session('last_activity');
            $timeout = 30; // 30 minutos de inactividad
            
            if ($lastActivity && (time() - $lastActivity) > ($timeout * 60)) {
                // Cerrar sesión por inactividad
                Auth::logout();
                session()->flush();
                return redirect()->route('login')->with('error', 'Tu sesión ha expirado por inactividad.');
            }
            
            // Actualizar la última actividad
            session(['last_activity' => time()]);
        }
        
        return $next($request);
    }
}