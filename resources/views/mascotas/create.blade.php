@extends('layouts.app')

@section('title', ' - Registrar Mascota')

@section('content')
<div class="bg-cream min-h-screen py-12">
    <div class="max-w-2xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="bg-white rounded-2xl shadow-xl overflow-hidden">
            <div class="bg-gradient-to-r from-orange-500 to-orange-600 px-6 py-4">
                <h2 class="text-2xl font-bold text-white">Registrar Mascota</h2>
                <p class="text-orange-100">Ingresa los datos de tu mascota</p>
            </div>
            
            <form method="POST" action="{{ route('mascotas.store') }}" class="p-6">
                @csrf
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                    <div>
                        <label class="block text-gray-700 text-sm font-semibold mb-2">Nombre de la mascota *</label>
                        <input type="text" name="nombre" value="{{ old('nombre') }}" 
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-orange-500 @error('nombre') border-red-500 @enderror" required>
                        @error('nombre') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                    </div>
                    
                    <div>
                        <label class="block text-gray-700 text-sm font-semibold mb-2">Especie *</label>
                        <select name="especie" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-orange-500 @error('especie') border-red-500 @enderror" required>
                            <option value="">Selecciona una especie</option>
                            <option value="perro" {{ old('especie') == 'perro' ? 'selected' : '' }}>🐕 Perro</option>
                            <option value="gato" {{ old('especie') == 'gato' ? 'selected' : '' }}>🐱 Gato</option>
                            <option value="conejo" {{ old('especie') == 'conejo' ? 'selected' : '' }}>🐇 Conejo</option>
                            <option value="ave" {{ old('especie') == 'ave' ? 'selected' : '' }}>🐦 Ave</option>
                            <option value="otro" {{ old('especie') == 'otro' ? 'selected' : '' }}>🦎 Otro</option>
                        </select>
                        @error('especie') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                    </div>
                    
                    <div>
                        <label class="block text-gray-700 text-sm font-semibold mb-2">Raza</label>
                        <input type="text" name="raza" value="{{ old('raza') }}" 
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-orange-500">
                    </div>
                    
                    <div>
                        <label class="block text-gray-700 text-sm font-semibold mb-2">Edad (años)</label>
                        <input type="number" name="edad" step="0.5" value="{{ old('edad') }}" 
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-orange-500">
                        @error('edad') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                    </div>
                    
                    <div>
                        <label class="block text-gray-700 text-sm font-semibold mb-2">Sexo</label>
                        <select name="sexo" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-orange-500">
                            <option value="">Selecciona</option>
                            <option value="macho" {{ old('sexo') == 'macho' ? 'selected' : '' }}>🐕 Macho</option>
                            <option value="hembra" {{ old('sexo') == 'hembra' ? 'selected' : '' }}>🐩 Hembra</option>
                        </select>
                    </div>
                    
                    <div>
                        <label class="block text-gray-700 text-sm font-semibold mb-2">Peso (kg)</label>
                        <input type="text" name="peso" value="{{ old('peso') }}" 
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-orange-500">
                        @error('peso') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                    </div>
                </div>
                
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-semibold mb-2">Observaciones médicas</label>
                    <textarea name="observaciones_medicas" rows="3" 
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-orange-500" 
                        placeholder="Alergias, condiciones médicas, medicamentos, etc.">{{ old('observaciones_medicas') }}</textarea>
                </div>
                
                <div class="flex items-center justify-between">
                    <a href="{{ route('mascotas.index') }}" class="text-gray-600 hover:text-orange-500 transition-all">
                        <i class="fas fa-arrow-left mr-2"></i> Volver
                    </a>
                    <button type="submit" class="bg-orange-500 text-white px-6 py-2 rounded-lg font-semibold hover:bg-orange-600 transition-all btn-effect">
                        <i class="fas fa-save mr-2"></i> Registrar Mascota
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection