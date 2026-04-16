@extends('layouts.app')

@section('title', ' - Mi Perfil')

@section('content')
<div class="bg-cream min-h-screen py-12">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
        
        @if(session('success'))
            <div class="mb-6 bg-green-50 border-l-4 border-green-500 rounded-lg p-4">
                <p class="text-green-700">{{ session('success') }}</p>
            </div>
        @endif
        
        <div class="bg-white rounded-2xl shadow-xl overflow-hidden">
            <div class="bg-gradient-to-r from-orange-500 to-orange-600 px-6 py-4">
                <h2 class="text-2xl font-bold text-white">Mi Perfil</h2>
                <p class="text-orange-100">Gestiona tu información personal</p>
            </div>
            
            <div class="p-6">
                <form method="POST" action="{{ route('profile.update') }}" class="mb-8">
                    @csrf
                    @method('PUT')
                    
                    <h3 class="text-lg font-semibold text-gray-800 mb-4">Información Personal</h3>
                    
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-6">
                        <div>
                            <label class="block text-gray-700 text-sm font-semibold mb-2">Nombre completo</label>
                            <input type="text" name="name" value="{{ old('name', $user->name) }}" 
                                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-orange-500 @error('name') border-red-500 @enderror" required>
                            @error('name') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                        </div>
                        
                        <div>
                            <label class="block text-gray-700 text-sm font-semibold mb-2">Email</label>
                            <input type="email" value="{{ $user->email }}" class="w-full px-4 py-2 border border-gray-300 rounded-lg bg-gray-100" disabled>
                        </div>
                        
                        <div>
                            <label class="block text-gray-700 text-sm font-semibold mb-2">Teléfono</label>
                            <input type="tel" name="telefono" value="{{ old('telefono', $user->telefono) }}" 
                                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-orange-500 @error('telefono') border-red-500 @enderror" required>
                            @error('telefono') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                        </div>
                        
                        <div>
                            <label class="block text-gray-700 text-sm font-semibold mb-2">Dirección</label>
                            <input type="text" name="direccion" value="{{ old('direccion', $user->direccion) }}" 
                                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-orange-500">
                        </div>
                    </div>
                    
                    <button type="submit" class="bg-orange-500 text-white px-6 py-2 rounded-lg font-semibold hover:bg-orange-600 transition-all">
                        Actualizar Perfil
                    </button>
                </form>
                
                <div class="border-t border-gray-200 pt-6">
                    <form method="POST" action="{{ route('profile.password') }}">
                        @csrf
                        @method('PUT')
                        
                        <h3 class="text-lg font-semibold text-gray-800 mb-4">Cambiar Contraseña</h3>
                        
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-6">
                            <div>
                                <label class="block text-gray-700 text-sm font-semibold mb-2">Contraseña actual</label>
                                <input type="password" name="current_password" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-orange-500" required>
                            </div>
                            <div>
                                <label class="block text-gray-700 text-sm font-semibold mb-2">Nueva contraseña</label>
                                <input type="password" name="password" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-orange-500" required>
                            </div>
                            <div>
                                <label class="block text-gray-700 text-sm font-semibold mb-2">Confirmar nueva contraseña</label>
                                <input type="password" name="password_confirmation" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-orange-500" required>
                            </div>
                        </div>
                        
                        <button type="submit" class="bg-orange-500 text-white px-6 py-2 rounded-lg font-semibold hover:bg-orange-600 transition-all">
                            Cambiar Contraseña
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection