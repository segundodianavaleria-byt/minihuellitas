@extends('layouts.admin')

@section('header', 'Dashboard')

@section('content')
<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
    <div class="bg-white rounded-xl shadow-md p-6 border-l-4 border-orange-500">
        <p class="text-gray-500 text-sm">Total Usuarios</p>
        <p class="text-2xl font-bold">{{ $totalUsuarios }}</p>
    </div>
    <div class="bg-white rounded-xl shadow-md p-6 border-l-4 border-green-500">
        <p class="text-gray-500 text-sm">Total Mascotas</p>
        <p class="text-2xl font-bold">{{ $totalMascotas }}</p>
    </div>
    <div class="bg-white rounded-xl shadow-md p-6 border-l-4 border-blue-500">
        <p class="text-gray-500 text-sm">Total Servicios</p>
        <p class="text-2xl font-bold">{{ $totalServicios }}</p>
    </div>
    <div class="bg-white rounded-xl shadow-md p-6 border-l-4 border-purple-500">
        <p class="text-gray-500 text-sm">Total Productos</p>
        <p class="text-2xl font-bold">{{ $totalProductos }}</p>
    </div>
</div>

<div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
    <div class="bg-white rounded-xl shadow-md p-6">
        <h3 class="text-lg font-semibold mb-4">Citas Recientes</h3>
        @foreach($citasRecientes as $cita)
        <div class="flex justify-between items-center p-3 border-b">
            <div>
                <p class="font-medium">{{ $cita->user->name }}</p>
                <p class="text-sm text-gray-500">{{ $cita->servicio->nombre }} - {{ \Carbon\Carbon::parse($cita->fecha)->format('d/m/Y') }}</p>
            </div>
            <span class="px-2 py-1 rounded-full text-xs font-semibold
                {{ $cita->estado == 'pendiente' ? 'bg-yellow-100 text-yellow-800' : '' }}
                {{ $cita->estado == 'confirmada' ? 'bg-green-100 text-green-800' : '' }}
                {{ $cita->estado == 'completada' ? 'bg-blue-100 text-blue-800' : '' }}
                {{ $cita->estado == 'cancelada' ? 'bg-red-100 text-red-800' : '' }}">
                {{ ucfirst($cita->estado) }}
            </span>
        </div>
        @endforeach
    </div>
    
    <div class="bg-white rounded-xl shadow-md p-6">
        <h3 class="text-lg font-semibold mb-4">Usuarios Recientes</h3>
        @foreach($usuariosRecientes as $usuario)
        <div class="flex justify-between items-center p-3 border-b">
            <div>
                <p class="font-medium">{{ $usuario->name }}</p>
                <p class="text-sm text-gray-500">{{ $usuario->email }}</p>
            </div>
            <span class="text-xs text-gray-400">{{ $usuario->created_at->diffForHumans() }}</span>
        </div>
        @endforeach
    </div>
</div>
@endsection