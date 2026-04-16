<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Cita;
use App\Models\Servicio;
use App\Models\Mascota;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Database\QueryException;

class CitaController extends Controller
{
    public function index()
    {
        $citas = auth()->user()->citas()
            ->with(['servicio', 'mascota'])
            ->orderBy('fecha', 'desc')
            ->paginate(10);
            
        return view('frontend.citas.index', compact('citas'));
    }
    
    public function create(Request $request)
    {
        $servicioId = $request->get('servicio');
        $servicio = Servicio::findOrFail($servicioId);
        $mascotas = auth()->user()->mascotas;
        
        $fechasDisponibles = $this->generarFechasDisponibles();
        
        return view('frontend.citas.create', compact('servicio', 'mascotas', 'fechasDisponibles'));
    }
    
    public function store(Request $request)
    {
        // ✅ Validar token único (evita duplicados)
        $request->validate([
            'token_unico' => 'required|string|unique:citas,token_unico',
        ], [
            'token_unico.unique' => '⚠️ Esta cita ya fue registrada. No se puede duplicar.',
        ]);
        
        // Generar ID único basado en los datos de la cita
        $uniqueId = md5(
            auth()->id() .
            $request->servicio_id .
            $request->mascota_id .
            $request->fecha .
            $request->hora
        );
        
        // Validaciones originales
        $request->validate([
            'servicio_id' => 'required|exists:servicios,id',
            'mascota_id' => 'required|exists:mascotas,id',
            'fecha' => 'required|date',
            'hora' => 'required|date_format:H:i',
            'observaciones' => 'nullable|string|max:500',
        ], [
            'servicio_id.required' => 'Debes seleccionar un servicio.',
            'servicio_id.exists' => 'El servicio seleccionado no es válido.',
            'mascota_id.required' => 'Debes seleccionar una mascota.',
            'mascota_id.exists' => 'La mascota seleccionada no es válida.',
            'fecha.required' => 'Debes seleccionar una fecha para la cita.',
            'fecha.date' => 'La fecha seleccionada no es válida.',
            'hora.required' => 'Debes seleccionar una hora para la cita.',
            'hora.date_format' => 'La hora seleccionada no es válida.',
        ]);
        
        $fechaSeleccionada = Carbon::parse($request->fecha);
        $fechaActual = Carbon::now()->startOfDay();
        $fechaManana = Carbon::now()->addDay()->startOfDay();
        $fechaMinima = Carbon::now()->addDays(2)->startOfDay();
        
        if ($fechaSeleccionada->format('Y-m-d') == $fechaActual->format('Y-m-d')) {
            return back()->with('error', '❌ NO se pueden agendar citas para el día de HOY.')
                ->withInput();
        }
        
        if ($fechaSeleccionada->format('Y-m-d') == $fechaManana->format('Y-m-d')) {
            return back()->with('error', '❌ NO se pueden agendar citas para MAÑANA.')
                ->withInput();
        }
        
        if ($fechaSeleccionada->lt($fechaActual)) {
            return back()->with('error', '❌ No se pueden agendar citas en fechas pasadas.')
                ->withInput();
        }
        
        if ($fechaSeleccionada->lt($fechaMinima)) {
            return back()->with('error', '❌ Las citas requieren al menos 2 DÍAS de anticipación.')
                ->withInput();
        }
        
        if ($fechaSeleccionada->isSunday()) {
            return back()->with('error', '❌ Los DOMINGOS estamos cerrados.')
                ->withInput();
        }
        
        $citaExistenteHorario = Cita::where('fecha', $request->fecha)
            ->where('hora', $request->hora)
            ->exists();
            
        if ($citaExistenteHorario) {
            return back()->with('error', '❌ Este horario ya está OCUPADO.')
                ->withInput();
        }
        
        // Crear la cita
        try {
            $cita = Cita::create([
                'token_unico' => $request->token_unico,
                'unique_id' => $uniqueId,
                'user_id' => auth()->id(),
                'servicio_id' => $request->servicio_id,
                'mascota_id' => $request->mascota_id,
                'fecha' => $request->fecha,
                'hora' => $request->hora,
                'observaciones' => $request->observaciones,
                'estado' => 'pendiente',
            ]);
        } catch (QueryException $e) {
            if ($e->errorInfo[1] == 1062) {
                return back()->with('error', '⚠️ Esta cita ya fue registrada.')
                    ->withInput();
            }
            throw $e;
        }
        
        // ✅ NO enviamos mensaje de éxito aquí (ya se guardó en localStorage)
        return redirect()->route('citas.show', $cita->id);
    }
    
    public function show($id)
    {
        $cita = Cita::with(['servicio', 'mascota'])->findOrFail($id);
        
        if ($cita->user_id != auth()->id() && !auth()->user()->hasRole('admin')) {
            abort(403);
        }
        
        return view('frontend.citas.show', compact('cita'));
    }
    
    public function cancel($id)
    {
        $cita = Cita::findOrFail($id);
        
        if ($cita->user_id != auth()->id() && !auth()->user()->hasRole('admin')) {
            abort(403);
        }
        
        if (Carbon::parse($cita->fecha)->isPast()) {
            return back()->with('error', '❌ No se pueden cancelar citas que ya han pasado.');
        }
        
        $cita->update(['estado' => 'cancelada']);
        
        return redirect()->route('citas.index')
            ->with('success', '✅ Cita cancelada exitosamente.');
    }
    
    private function generarFechasDisponibles()
    {
        $fechas = [];
        
        $fechasOcupadas = Cita::where('fecha', '>=', now())
            ->where('fecha', '<=', now()->addMonths(3))
            ->pluck('fecha')
            ->toArray();
        
        $dias = ['Domingo', 'Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado'];
        $meses = ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'];
        
        for ($i = 2; $i <= 92; $i++) {
            $fecha = now()->addDays($i);
            
            if ($fecha->isSunday()) {
                continue;
            }
            
            $nombreDia = $dias[$fecha->dayOfWeek];
            $numeroDia = $fecha->day;
            $nombreMes = $meses[$fecha->month - 1];
            
            $fechas[] = [
                'fecha' => $fecha->format('Y-m-d'),
                'texto' => $nombreDia . ' ' . $numeroDia . ' de ' . $nombreMes,
                'disponible' => !in_array($fecha->format('Y-m-d'), $fechasOcupadas)
            ];
        }
        
        return $fechas;
    }
}