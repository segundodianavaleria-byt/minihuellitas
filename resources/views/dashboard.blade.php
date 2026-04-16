@extends('layouts.app')

@section('title', ' - Dashboard')

@section('content')
<div class="bg-cream min-h-screen py-12">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        @if(session('success'))
            <div class="mb-6 bg-green-50 border-l-4 border-green-500 rounded-lg p-4">
                <p class="text-green-700">{{ session('success') }}</p>
            </div>
        @endif
        
        <div class="bg-white rounded-2xl shadow-xl overflow-hidden">
            <div class="bg-gradient-to-r from-orange-500 to-orange-600 px-6 py-4">
                <h1 class="text-2xl font-bold text-white">Mi Dashboard</h1>
                <p class="text-orange-100">Bienvenido, {{ Auth::user()->name }}</p>
            </div>
            
            <div class="p-6">
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
                    <div class="bg-orange-50 rounded-xl p-4 text-center hover:shadow-lg transition-all">
                        <i class="fas fa-dog text-orange-500 text-3xl mb-2"></i>
                        <p class="text-2xl font-bold text-gray-800">{{ $mascotas->count() }}</p>
                        <p class="text-gray-600">Mascotas registradas</p>
                        <a href="{{ route('mascotas.index') }}" class="text-orange-500 text-sm hover:underline">Ver todas →</a>
                    </div>
                    <div class="bg-orange-50 rounded-xl p-4 text-center hover:shadow-lg transition-all">
                        <i class="fas fa-calendar-alt text-orange-500 text-3xl mb-2"></i>
                        <p class="text-2xl font-bold text-gray-800">{{ $citas->count() }}</p>
                        <p class="text-gray-600">Citas próximas</p>
                        <a href="{{ route('citas.index') }}" class="text-orange-500 text-sm hover:underline">Ver todas →</a>
                    </div>
                    <div class="bg-orange-50 rounded-xl p-4 text-center hover:shadow-lg transition-all">
                        <i class="fas fa-star text-orange-500 text-3xl mb-2"></i>
                        <p class="text-2xl font-bold text-gray-800">Nuevo</p>
                        <p class="text-gray-600">Nivel de fidelidad</p>
                        <a href="#" class="text-orange-500 text-sm hover:underline">Más información →</a>
                    </div>
                </div>
                
                <div class="border-t border-gray-200 pt-6">
                    <h2 class="text-xl font-bold text-gray-800 mb-4">Acciones rápidas</h2>
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                        <a href="{{ route('servicios.index') }}" class="bg-orange-100 hover:bg-orange-200 rounded-xl p-4 text-center transition-all">
                            <i class="fas fa-scissors text-orange-500 text-2xl mb-2"></i>
                            <p class="font-semibold text-gray-700">Agendar cita</p>
                        </a>
                        <a href="{{ route('mascotas.create') }}" class="bg-orange-100 hover:bg-orange-200 rounded-xl p-4 text-center transition-all">
                            <i class="fas fa-plus-circle text-orange-500 text-2xl mb-2"></i>
                            <p class="font-semibold text-gray-700">Registrar mascota</p>
                        </a>
                        <a href="{{ route('profile.index') }}" class="bg-orange-100 hover:bg-orange-200 rounded-xl p-4 text-center transition-all">
                            <i class="fas fa-user-edit text-orange-500 text-2xl mb-2"></i>
                            <p class="font-semibold text-gray-700">Actualizar perfil</p>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection