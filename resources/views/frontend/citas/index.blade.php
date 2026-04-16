@extends('layouts.app')

@section('title', ' - Mis Citas')

@section('content')
<div class="bg-gradient-to-br from-gray-50 to-gray-100 min-h-screen py-8">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        @if(session('success'))
            <div class="mb-6 bg-green-50 border-l-4 border-green-500 rounded-xl p-4 animate-fade-in">
                <div class="flex items-center">
                    <svg class="w-5 h-5 text-green-500 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                    <p class="text-green-700">{{ session('success') }}</p>
                </div>
            </div>
        @endif
        
        @if(session('error'))
            <div class="mb-6 bg-red-50 border-l-4 border-red-500 rounded-xl p-4 animate-fade-in">
                <div class="flex items-center">
                    <svg class="w-5 h-5 text-red-500 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                    <p class="text-red-700">{{ session('error') }}</p>
                </div>
            </div>
        @endif
        
        <div class="bg-white rounded-2xl shadow-xl overflow-hidden">
            <div class="bg-gradient-to-r from-orange-500 to-orange-600 px-6 py-5">
                <div class="flex items-center justify-between flex-wrap gap-4">
                    <div>
                        <h1 class="text-2xl font-bold text-white">Mis Citas</h1>
                        <p class="text-orange-100 mt-1">Historial y gestión de tus citas</p>
                    </div>
                    <a href="{{ route('servicios.index') }}" class="bg-white/20 backdrop-blur-sm text-white px-4 py-2 rounded-lg hover:bg-white/30 transition-all duration-300 flex items-center gap-2">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                        </svg>
                        Nueva Cita
                    </a>
                </div>
            </div>
            
            <div class="p-6">
                @if($citas->isEmpty())
                    <div class="text-center py-12">
                        <svg class="w-24 h-24 mx-auto text-gray-300 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                        </svg>
                        <p class="text-gray-500 text-lg">No tienes citas agendadas</p>
                        <p class="text-gray-400 text-sm mt-1">Comienza agendando tu primera cita</p>
                        <a href="{{ route('servicios.index') }}" class="inline-flex items-center mt-6 bg-gradient-to-r from-orange-500 to-orange-600 text-white px-6 py-2 rounded-lg hover:shadow-lg transition-all duration-300 transform hover:scale-105">
                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                            </svg>
                            Agendar primera cita
                        </a>
                    </div>
                @else
                    <div class="space-y-4">
                        @foreach($citas as $cita)
                        @php
                            $fechaCita = \Carbon\Carbon::parse($cita->fecha);
                            $isPast = $fechaCita->isPast() && $cita->estado != 'cancelada';
                        @endphp
                        <div class="group bg-white border border-gray-200 rounded-xl p-5 hover:shadow-xl transition-all duration-300 hover:border-orange-200">
                            <div class="flex flex-col sm:flex-row sm:items-start justify-between gap-4">
                                <div class="flex-1">
                                    <div class="flex items-center gap-3 flex-wrap mb-3">
                                        <h3 class="font-bold text-lg text-gray-800">{{ $cita->servicio->nombre }}</h3>
                                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-semibold
                                            {{ $cita->estado == 'pendiente' ? 'bg-yellow-100 text-yellow-800' : '' }}
                                            {{ $cita->estado == 'confirmada' ? 'bg-green-100 text-green-800' : '' }}
                                            {{ $cita->estado == 'completada' ? 'bg-blue-100 text-blue-800' : '' }}
                                            {{ $cita->estado == 'cancelada' ? 'bg-red-100 text-red-800' : '' }}">
                                            @if($cita->estado == 'pendiente') ⏳ @endif
                                            @if($cita->estado == 'confirmada') ✅ @endif
                                            @if($cita->estado == 'completada') ✓ @endif
                                            @if($cita->estado == 'cancelada') ✗ @endif
                                            {{ ucfirst($cita->estado) }}
                                        </span>
                                        @if($isPast)
                                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-semibold bg-gray-100 text-gray-600">
                                                📅 Pasada
                                            </span>
                                        @endif
                                    </div>
                                    
                                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-3">
                                        <div class="flex items-center text-sm text-gray-600">
                                            <svg class="w-4 h-4 text-orange-500 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                                            </svg>
                                            <span class="font-medium">Mascota:</span>
                                            <span class="ml-1">{{ $cita->mascota->nombre }}</span>
                                        </div>
                                        <div class="flex items-center text-sm text-gray-600">
                                            <svg class="w-4 h-4 text-orange-500 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                            </svg>
                                            <span class="font-medium">Fecha:</span>
                                            <span class="ml-1">{{ $fechaCita->translatedFormat('l j \\d\\e F, Y') }}</span>
                                        </div>
                                        <div class="flex items-center text-sm text-gray-600">
                                            <svg class="w-4 h-4 text-orange-500 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                            </svg>
                                            <span class="font-medium">Hora:</span>
                                            <span class="ml-1">{{ $cita->hora }}</span>
                                        </div>
                                        <div class="flex items-center text-sm text-gray-600">
                                            <svg class="w-4 h-4 text-orange-500 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                            </svg>
                                            <span class="font-medium">Precio:</span>
                                            <span class="ml-1 text-orange-600 font-semibold">${{ number_format($cita->servicio->precio, 2) }}</span>
                                        </div>
                                    </div>
                                    
                                    @if($cita->observaciones)
                                        <div class="mt-3 bg-gray-50 rounded-lg p-3 text-sm text-gray-600">
                                            <svg class="w-4 h-4 inline mr-1 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 8h10M7 12h4m1 8l-4-4H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-3l-4 4z"></path>
                                            </svg>
                                            {{ Str::limit($cita->observaciones, 100) }}
                                        </div>
                                    @endif
                                </div>
                                
                                <div class="flex sm:flex-col gap-2">
                                    <a href="{{ route('citas.show', $cita->id) }}" class="inline-flex items-center justify-center px-4 py-2 text-sm font-medium text-blue-700 bg-blue-50 rounded-lg hover:bg-blue-100 transition-all duration-300">
                                        <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                                        </svg>
                                        Ver detalles
                                    </a>
                                    @if($cita->estado != 'cancelada' && !$isPast)
                                        <form method="POST" action="{{ route('citas.cancel', $cita->id) }}" class="inline" onsubmit="return confirm('¿Estás seguro de cancelar esta cita?')">
                                            @csrf
                                            @method('PUT')
                                            <button type="submit" class="inline-flex items-center justify-center px-4 py-2 text-sm font-medium text-red-700 bg-red-50 rounded-lg hover:bg-red-100 transition-all duration-300">
                                                <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                                                </svg>
                                                Cancelar
                                            </button>
                                        </form>
                                    @endif
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    <div class="mt-6">
                        {{ $citas->links() }}
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>

<style>
    @keyframes fade-in {
        from { opacity: 0; transform: translateY(-10px); }
        to { opacity: 1; transform: translateY(0); }
    }
    .animate-fade-in {
        animation: fade-in 0.5s ease-out;
    }
</style>
@endsections