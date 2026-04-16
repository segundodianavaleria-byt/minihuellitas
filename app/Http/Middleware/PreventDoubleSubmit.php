<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class PreventDoubleSubmit
{
    public function handle($request, Closure $next)
    {
        $key = 'form_submit_' . md5(
            auth()->id() . 
            $request->ip() . 
            $request->path() . 
            $request->input('_token')
        );

        if (Cache::has($key)) {
            return back()->with('error', 'Por favor espera unos segundos antes de enviar nuevamente.');
        }

        Cache::put($key, true, 10); // Bloqueo por 10 segundos

        $response = $next($request);

        // Opcional: eliminar cache después de procesar
        // Cache::forget($key);

        return $response;
    }
}
