@extends('layouts.admin')

@section('header', 'Detalle de Mascota')

@section('content')
<div class="bg-white rounded-xl shadow-md p-6">
    <div class="grid grid-cols-2 gap-4 mb-6">
        <div><label class="font-semibold">ID:</label> {{ $mascota->id }}</div>
        <div><label class="font-semibold">Nombre:</label> {{ $mascota->nombre }}</div>
        <div><label class="font-semibold">Dueño:</label> {{ $mascota->user->name }}</div>
        <div><label class="font-semibold">Especie:</label> {{ ucfirst($mascota->especie) }}</div>
        <div><label class="font-semibold">Raza:</label> {{ $mascota->raza ?? '-' }}</div>
        <div><label class="font-semibold">Edad:</label> {{ $mascota->edad ?? '-' }} años</div>
        <div><label class="font-semibold">Sexo:</label> {{ $mascota->sexo == 'macho' ? 'Macho' : ($mascota->sexo == 'hembra' ? 'Hembra' : '-') }}</div>
        <div><label class="font-semibold">Peso:</label> {{ $mascota->peso ?? '-' }} kg</div>
        @if($mascota->trashed())
            <div><label class="font-semibold text-red-600">Eliminada:</label> {{ $mascota->deleted_at->format('d/m/Y H:i') }}</div>
        @endif
    </div>
    <a href="{{ route('admin.mascotas') }}" class="text-orange-500 hover:underline">← Volver</a>
</div>
@endsection