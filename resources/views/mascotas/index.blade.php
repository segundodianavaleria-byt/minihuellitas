@extends('layouts.app')

@section('title', ' - Mis Mascotas')

@section('content')
<div class="bg-cream min-h-screen py-12">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        @if(session('success'))
            <div class="mb-6 bg-green-50 border-l-4 border-green-500 rounded-lg p-4">
                <p class="text-green-700">{{ session('success') }}</p>
            </div>
        @endif
        
        <div class="bg-white rounded-2xl shadow-xl overflow-hidden">
            <div class="bg-gradient-to-r from-orange-500 to-orange-600 px-6 py-4 flex justify-between items-center">
                <div>
                    <h2 class="text-2xl font-bold text-white">Mis Mascotas</h2>
                    <p class="text-orange-100">Gestiona las mascotas que tienes registradas</p>
                </div>
                <a href="{{ route('mascotas.create') }}" class="bg-white text-orange-500 px-4 py-2 rounded-lg font-semibold hover:bg-orange-50 transition-all">
                    <i class="fas fa-plus-circle mr-2"></i> Agregar Mascota
                </a>
            </div>
            
            <div class="p-6">
                @if($mascotas->isEmpty())
                    <div class="text-center py-12">
                        <i class="fas fa-dog text-6xl text-gray-300 mb-4"></i>
                        <p class="text-gray-500">No tienes mascotas registradas</p>
                        <a href="{{ route('mascotas.create') }}" class="inline-block mt-4 text-orange-500 hover:underline">Registrar tu primera mascota</a>
                    </div>
                @else
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                        @foreach($mascotas as $mascota)
                        <div class="bg-gray-50 rounded-xl p-4 border border-gray-200 hover:shadow-lg transition-all">
                            <div class="flex items-center mb-3">
                                <div class="w-12 h-12 bg-orange-100 rounded-full flex items-center justify-center">
                                    <i class="fas fa-{{ $mascota->especie == 'perro' ? 'dog' : ($mascota->especie == 'gato' ? 'cat' : 'paw') }} text-orange-500 text-xl"></i>
                                </div>
                                <div class="ml-3">
                                    <h3 class="font-bold text-gray-800">{{ $mascota->nombre }}</h3>
                                    <p class="text-xs text-gray-500">{{ ucfirst($mascota->especie) }} {{ $mascota->raza ? '- ' . $mascota->raza : '' }}</p>
                                </div>
                            </div>
                            <div class="grid grid-cols-2 gap-2 text-sm">
                                <p><span class="text-gray-500">Edad:</span> {{ $mascota->edad ?? 'No especificada' }} años</p>
                                <p><span class="text-gray-500">Sexo:</span> {{ $mascota->sexo == 'macho' ? '🐕 Macho' : ($mascota->sexo == 'hembra' ? '🐩 Hembra' : 'No especificado') }}</p>
                                <p><span class="text-gray-500">Peso:</span> {{ $mascota->peso ?? 'No especificado' }} kg</p>
                            </div>
                            @if($mascota->observaciones_medicas)
                                <p class="text-xs text-gray-500 mt-2 border-t pt-2">📋 {{ Str::limit($mascota->observaciones_medicas, 50) }}</p>
                            @endif
                            <div class="flex justify-end mt-3 space-x-2">
                                <a href="{{ route('mascotas.edit', $mascota->id) }}" class="text-blue-500 hover:text-blue-700 text-sm">
                                    <i class="fas fa-edit"></i> Editar
                                </a>
                                <form method="POST" action="{{ route('mascotas.destroy', $mascota->id) }}" class="inline" onsubmit="return confirm('¿Estás seguro de eliminar esta mascota?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-500 hover:text-red-700 text-sm">
                                        <i class="fas fa-trash"></i> Eliminar
                                    </button>
                                </form>
                            </div>
                        </div>
                        @endforeach
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection