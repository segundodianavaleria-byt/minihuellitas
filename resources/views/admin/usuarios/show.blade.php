@extends('layouts.admin')

@section('header', 'Detalle de Usuario')

@section('content')
<div class="bg-white rounded-xl shadow-md p-6">
    <div class="grid grid-cols-2 gap-4 mb-6">
        <div><label class="font-semibold">ID:</label> {{ $usuario->id }}</div>
        <div><label class="font-semibold">Nombre:</label> {{ $usuario->name }}</div>
        <div><label class="font-semibold">Email:</label> {{ $usuario->email }}</div>
        <div><label class="font-semibold">Teléfono:</label> {{ $usuario->telefono ?? '-' }}</div>
        <div><label class="font-semibold">Dirección:</label> {{ $usuario->direccion ?? '-' }}</div>
        <div><label class="font-semibold">Registro:</label> {{ $usuario->created_at->format('d/m/Y H:i') }}</div>
        @if($usuario->trashed())
            <div><label class="font-semibold text-red-600">Eliminado:</label> {{ $usuario->deleted_at->format('d/m/Y H:i') }}</div>
        @endif
    </div>
    
    <h3 class="font-semibold text-lg mb-3">Mascotas ({{ $usuario->mascotas->count() }})</h3>
    <div class="grid grid-cols-1 md:grid-cols-2 gap-3 mb-6">
        @foreach($usuario->mascotas as $mascota)
            <div class="border p-3 rounded-lg">
                <p class="font-medium">{{ $mascota->nombre }}</p>
                <p class="text-sm text-gray-500">{{ ucfirst($mascota->especie) }} {{ $mascota->raza ? '- '.$mascota->raza : '' }}</p>
            </div>
        @endforeach
    </div>
    
    <a href="{{ route('admin.usuarios') }}" class="text-orange-500 hover:underline">← Volver</a>
</div>
@endsection