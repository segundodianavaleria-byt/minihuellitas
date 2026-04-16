@extends('layouts.app')

@section('title', ' - Agendar Cita')

@section('content')
<div class="bg-cream min-h-screen py-12">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
        
        @if(session('error'))
            <div class="mb-6 bg-red-50 border-l-4 border-red-500 rounded-lg p-4">
                <div class="flex items-center">
                    <i class="fas fa-exclamation-circle text-red-500 text-xl mr-3"></i>
                    <p class="text-red-700">{{ session('error') }}</p>
                </div>
            </div>
        @endif
        
        @if(session('success'))
            <div class="mb-6 bg-green-50 border-l-4 border-green-500 rounded-lg p-4">
                <div class="flex items-center">
                    <i class="fas fa-check-circle text-green-500 text-xl mr-3"></i>
                    <p class="text-green-700">{{ session('success') }}</p>
                </div>
            </div>
        @endif
        
        @if(session('info'))
            <div class="mb-6 bg-blue-50 border-l-4 border-blue-500 rounded-lg p-4">
                <div class="flex items-center">
                    <i class="fas fa-info-circle text-blue-500 text-xl mr-3"></i>
                    <p class="text-blue-700">{{ session('info') }}</p>
                </div>
            </div>
        @endif
        
        @if($errors->any())
            <div class="mb-6 bg-red-50 border-l-4 border-red-500 rounded-lg p-4">
                <div class="flex items-start">
                    <i class="fas fa-exclamation-circle text-red-500 text-xl mr-3 mt-0.5"></i>
                    <div>
                        <p class="text-red-700 font-semibold">Por favor corrige los siguientes errores:</p>
                        <ul class="text-red-600 text-sm mt-1">
                            @foreach($errors->all() as $error)
                                <li>• {{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
            <script>
                // ✅ LIMPIAR localStorage CUANDO HAY ERRORES DE VALIDACIÓN
                localStorage.removeItem('cita_mensaje_pendiente');
                localStorage.removeItem('cita_mensaje_texto');
                localStorage.removeItem('cita_mensaje_tipo');
            </script>
        @endif
        
        <div class="bg-white rounded-2xl shadow-xl overflow-hidden">
            <div class="bg-gradient-to-r from-orange-500 to-orange-600 px-6 py-4">
                <h2 class="text-2xl font-bold text-white">Agendar Cita</h2>
                <p class="text-orange-100">Servicio: {{ $servicio->nombre }}</p>
            </div>
            
            <form method="POST" action="{{ route('citas.store') }}" class="p-6" id="citaForm">
                @csrf
                <input type="hidden" name="token_unico" value="{{ md5(uniqid() . rand() . auth()->id() . now()) }}">
                <input type="hidden" name="servicio_id" value="{{ $servicio->id }}">
                
                <div class="mb-6">
                    <label class="block text-gray-700 text-sm font-semibold mb-2">Selecciona tu mascota *</label>
                    <select name="mascota_id" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-orange-500" required>
                        <option value="">Selecciona una mascota</option>
                        @foreach($mascotas as $mascota)
                            <option value="{{ $mascota->id }}">{{ $mascota->nombre }} ({{ ucfirst($mascota->especie) }})</option>
                        @endforeach
                    </select>
                    @if($mascotas->isEmpty())
                        <p class="text-red-500 text-sm mt-1">⚠️ No tienes mascotas registradas. <a href="{{ route('mascotas.create') }}" class="text-orange-500">Registra una mascota</a></p>
                    @endif
                </div>
                
                <div class="mb-6">
                    <div class="flex items-center justify-between mb-2">
                        <label class="block text-gray-700 text-sm font-semibold">Selecciona una fecha *</label>
                        <span class="text-xs text-gray-500 bg-yellow-50 px-2 py-1 rounded">
                            <i class="fas fa-info-circle mr-1"></i> Mínimo 2 días de anticipación
                        </span>
                    </div>
                    <div class="grid grid-cols-2 md:grid-cols-4 gap-3 max-h-96 overflow-y-auto p-2 border rounded-lg bg-gray-50">
                        @foreach($fechasDisponibles as $fecha)
                            <label class="relative cursor-pointer">
                                <input type="radio" name="fecha" value="{{ $fecha['fecha'] }}" 
                                    class="peer sr-only" 
                                    {{ !$fecha['disponible'] ? 'disabled' : '' }}
                                    required>
                                <div class="p-3 text-center rounded-lg border-2 transition-all 
                                    {{ $fecha['disponible'] ? 'border-gray-200 hover:border-orange-500 hover:bg-orange-50 peer-checked:bg-orange-500 peer-checked:text-white peer-checked:border-orange-500 cursor-pointer' : 'bg-gray-100 text-gray-400 cursor-not-allowed border-gray-200' }}">
                                    <p class="font-semibold text-sm">{{ $fecha['texto'] }}</p>
                                    @if(!$fecha['disponible'])
                                        <p class="text-xs mt-1">(Ocupado)</p>
                                    @endif
                                </div>
                            </label>
                        @endforeach
                    </div>
                    <p class="text-xs text-gray-500 mt-2">
                        <i class="fas fa-calendar-alt text-orange-500 mr-1"></i>
                        Las citas requieren al menos 2 días de anticipación. No se aceptan citas para el día actual.
                    </p>
                </div>
                
                <div class="mb-6">
                    <label class="block text-gray-700 text-sm font-semibold mb-2">Selecciona una hora *</label>
                    <div class="grid grid-cols-3 md:grid-cols-6 gap-2" id="horariosContainer">
                        @php
                            $horarios = ['09:00', '10:00', '11:00', '12:00', '13:00', '14:00', '15:00', '16:00', '17:00', '18:00', '19:00'];
                        @endphp
                        @foreach($horarios as $hora)
                            <label class="relative cursor-pointer">
                                <input type="radio" name="hora" value="{{ $hora }}" class="peer sr-only" required>
                                <div class="p-2 text-center rounded-lg border-2 border-gray-200 hover:border-orange-500 peer-checked:bg-orange-500 peer-checked:text-white transition-all cursor-pointer">
                                    {{ $hora }}
                                </div>
                            </label>
                        @endforeach
                    </div>
                    <p class="text-xs text-gray-500 mt-2">
                        <i class="fas fa-clock text-orange-500 mr-1"></i>
                        Horario de atención: Lunes a Sábado de 9:00 a 19:00 hrs.
                    </p>
                </div>
                
                <div class="mb-6">
                    <label class="block text-gray-700 text-sm font-semibold mb-2">Observaciones (opcional)</label>
                    <textarea name="observaciones" rows="3" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-orange-500" placeholder="Indica si tu mascota tiene alguna condición especial, alergias, o cualquier información que debamos saber..."></textarea>
                </div>
                
                <div class="flex items-center justify-between">
                    <a href="{{ route('servicios.index') }}" class="text-gray-600 hover:text-orange-500 transition-all">
                        <i class="fas fa-arrow-left mr-2"></i> Volver a servicios
                    </a>
                    <button type="submit" id="submitBtn" class="bg-orange-500 text-white px-6 py-2 rounded-lg font-semibold hover:bg-orange-600 transition-all btn-effect" style="min-width: 200px;">
                        <i class="fas fa-check-circle mr-2"></i> Confirmar Cita
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    let formularioEnviado = false;
    const form = document.getElementById('citaForm');
    
    if (form) {
        form.addEventListener('submit', function(e) {
            const submitBtn = document.getElementById('submitBtn');
            
            if (formularioEnviado === true) {
                e.preventDefault();
                alert('⚠️ Ya estamos procesando tu cita. Por favor espera.');
                return false;
            }
            
            formularioEnviado = true;
            
            // ✅ GUARDAR MENSAJE EN LOCALSTORAGE ANTES DE ENVIAR
            const fechaSeleccionada = document.querySelector('input[name="fecha"]:checked');
            const horaSeleccionada = document.querySelector('input[name="hora"]:checked');
            
            if (fechaSeleccionada && horaSeleccionada) {
                const fecha = fechaSeleccionada.value;
                const hora = horaSeleccionada.value;
                const partes = fecha.split('-');
                const fechaFormateada = `${partes[2]}/${partes[1]}/${partes[0]}`;
                
                localStorage.setItem('cita_mensaje_pendiente', 'true');
                localStorage.setItem('cita_mensaje_texto', `✅ ¡Cita agendada exitosamente! Te esperamos el ${fechaFormateada} a las ${hora}.`);
                localStorage.setItem('cita_mensaje_tipo', 'success');
            }
            
            if (submitBtn) {
                submitBtn.disabled = true;
                submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin mr-2"></i> Registrando cita...';
                submitBtn.style.opacity = '0.7';
            }
            
            return true;
        });
    }
    
    // ✅ FUNCIÓN PARA MOSTRAR MENSAJE PENDIENTE (SOLO SI NO HAY ERRORES)
    function mostrarMensajePendiente() {
        const mensajePendiente = localStorage.getItem('cita_mensaje_pendiente');
        const mensajeTexto = localStorage.getItem('cita_mensaje_texto');
        
        // Solo mostrar si hay mensaje pendiente Y no hay errores en la página
        const hayErrores = document.querySelector('.bg-red-50');
        
        if (mensajePendiente === 'true' && mensajeTexto && !hayErrores) {
            setTimeout(() => {
                const div = document.createElement('div');
                div.className = 'fixed bottom-4 right-4 bg-green-500 text-white px-6 py-3 rounded-lg shadow-lg z-50 animate-slide-up';
                div.innerHTML = `
                    <div class="flex items-center gap-3">
                        <i class="fas fa-check-circle text-xl"></i>
                        <span>${mensajeTexto}</span>
                        <button onclick="this.parentElement.parentElement.remove()" class="ml-4 text-white hover:text-gray-200">
                            <i class="fas fa-times"></i>
                        </button>
                    </div>
                `;
                document.body.appendChild(div);
                
                // Limpiar localStorage después de mostrar
                localStorage.removeItem('cita_mensaje_pendiente');
                localStorage.removeItem('cita_mensaje_texto');
                localStorage.removeItem('cita_mensaje_tipo');
                
                // Auto-cerrar después de 5 segundos
                setTimeout(() => {
                    if (div && div.parentElement) div.remove();
                }, 5000);
            }, 500);
        }
    }
    
    // ✅ LIMPIAR localStorage SIEMPRE QUE HAY ERRORES
    function limpiarLocalStorageSiHayError() {
        const hayErrores = document.querySelector('.bg-red-50');
        if (hayErrores) {
            localStorage.removeItem('cita_mensaje_pendiente');
            localStorage.removeItem('cita_mensaje_texto');
            localStorage.removeItem('cita_mensaje_tipo');
        }
    }
    
    // Ejecutar al cargar la página
    document.addEventListener('DOMContentLoaded', function() {
        limpiarLocalStorageSiHayError();
        mostrarMensajePendiente();
    });
</script>

<style>
    @keyframes slide-up {
        from {
            opacity: 0;
            transform: translateY(20px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }
    .animate-slide-up {
        animation: slide-up 0.3s ease-out;
    }
</style>
@endsection