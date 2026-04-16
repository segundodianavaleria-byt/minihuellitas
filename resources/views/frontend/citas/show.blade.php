@extends('layouts.app')

@section('title', ' - Detalle de Cita')

@section('content')
<div class="bg-cream min-h-screen py-12">
    <div class="max-w-2xl mx-auto px-4 sm:px-6 lg:px-8">
        
        @if(session('success'))
            <div class="mb-6 bg-green-100 border-l-4 border-green-500 rounded-lg p-4 shadow-md">
                <div class="flex items-center">
                    <i class="fas fa-check-circle text-green-500 text-2xl mr-3"></i>
                    <p class="text-green-700 font-semibold">{{ session('success') }}</p>
                </div>
            </div>
        @endif
        
        @if(session('info'))
            <div class="mb-6 bg-blue-100 border-l-4 border-blue-500 rounded-lg p-4 shadow-md">
                <div class="flex items-center">
                    <i class="fas fa-info-circle text-blue-500 text-2xl mr-3"></i>
                    <p class="text-blue-700">{{ session('info') }}</p>
                </div>
            </div>
        @endif
        
        @if(session('error'))
            <div class="mb-6 bg-red-50 border-l-4 border-red-500 rounded-lg p-4">
                <div class="flex items-center">
                    <i class="fas fa-exclamation-circle text-red-500 text-xl mr-3"></i>
                    <p class="text-red-700">{{ session('error') }}</p>
                </div>
            </div>
        @endif
        
        <div class="bg-white rounded-2xl shadow-xl overflow-hidden">
            <div class="bg-gradient-to-r from-orange-500 to-orange-600 px-6 py-4">
                <h2 class="text-2xl font-bold text-white">Detalle de Cita</h2>
                <p class="text-orange-100">Información de tu cita agendada</p>
            </div>
            
            <div class="p-6">
                <div class="space-y-4">
                    <div class="grid grid-cols-2 gap-4 pb-4 border-b">
                        <div>
                            <p class="text-gray-500 text-sm">Servicio</p>
                            <p class="font-semibold text-gray-800">{{ $cita->servicio->nombre }}</p>
                        </div>
                        <div>
                            <p class="text-gray-500 text-sm">Precio</p>
                            <p class="font-semibold text-orange-500">${{ number_format($cita->servicio->precio, 2) }}</p>
                        </div>
                    </div>
                    
                    <div class="grid grid-cols-2 gap-4 pb-4 border-b">
                        <div>
                            <p class="text-gray-500 text-sm">Mascota</p>
                            <p class="font-semibold text-gray-800">{{ $cita->mascota->nombre }}</p>
                        </div>
                        <div>
                            <p class="text-gray-500 text-sm">Especie</p>
                            <p class="font-semibold text-gray-800">{{ ucfirst($cita->mascota->especie) }}</p>
                        </div>
                    </div>
                    
                    <div class="grid grid-cols-2 gap-4 pb-4 border-b">
                        <div>
                            <p class="text-gray-500 text-sm">Fecha</p>
                            <p class="font-semibold text-gray-800">{{ \Carbon\Carbon::parse($cita->fecha)->translatedFormat('l j \\d\\e F, Y') }}</p>
                        </div>
                        <div>
                            <p class="text-gray-500 text-sm">Hora</p>
                            <p class="font-semibold text-gray-800">{{ $cita->hora }}</p>
                        </div>
                    </div>
                    
                    <div class="pb-4 border-b">
                        <p class="text-gray-500 text-sm">Estado</p>
                        <span class="inline-block px-3 py-1 rounded-full text-sm font-semibold
                            {{ $cita->estado == 'pendiente' ? 'bg-yellow-100 text-yellow-800' : '' }}
                            {{ $cita->estado == 'confirmada' ? 'bg-green-100 text-green-800' : '' }}
                            {{ $cita->estado == 'completada' ? 'bg-blue-100 text-blue-800' : '' }}
                            {{ $cita->estado == 'cancelada' ? 'bg-red-100 text-red-800' : '' }}">
                            {{ ucfirst($cita->estado) }}
                        </span>
                    </div>
                    
                    @if($cita->observaciones)
                    <div class="pb-4">
                        <p class="text-gray-500 text-sm">Observaciones</p>
                        <p class="text-gray-700 bg-gray-50 p-3 rounded-lg">{{ $cita->observaciones }}</p>
                    </div>
                    @endif
                </div>
                
                <div class="mt-6 flex justify-between">
                    <a href="{{ route('citas.index') }}" class="text-gray-600 hover:text-orange-500 transition-all">
                        <i class="fas fa-arrow-left mr-2"></i> Volver a mis citas
                    </a>
                    @if($cita->estado != 'cancelada' && \Carbon\Carbon::parse($cita->fecha)->isFuture())
                        <form method="POST" action="{{ route('citas.cancel', $cita->id) }}" onsubmit="return confirm('¿Estás seguro de cancelar esta cita?')">
                            @csrf
                            @method('PUT')
                            <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded-lg hover:bg-red-600 transition-all">
                                <i class="fas fa-times-circle mr-2"></i> Cancelar Cita
                            </button>
                        </form>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection