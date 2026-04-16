@extends('layouts.admin')

@section('header', 'Detalle de Cita')

@section('content')
<div class="bg-white rounded-xl shadow-md p-6 max-w-2xl mx-auto">
    <div class="space-y-3">
        <div><label class="font-semibold">ID:</label> {{ $cita->id }}</div>
        <div><label class="font-semibold">Cliente:</label> {{ $cita->user->name }}</div>
        <div><label class="font-semibold">Mascota:</label> {{ $cita->mascota->nombre }}</div>
        <div><label class="font-semibold">Servicio:</label> {{ $cita->servicio->nombre }}</div>
        <div><label class="font-semibold">Fecha:</label> {{ \Carbon\Carbon::parse($cita->fecha)->format('d/m/Y') }}</div>
        <div><label class="font-semibold">Hora:</label> {{ $cita->hora }}</div>
        <div><label class="font-semibold">Estado:</label> {{ ucfirst($cita->estado) }}</div>
        @if($cita->observaciones)
            <div><label class="font-semibold">Observaciones:</label> {{ $cita->observaciones }}</div>
        @endif
        @if($cita->trashed())
            <div><label class="font-semibold text-red-600">Eliminada:</label> {{ $cita->deleted_at->format('d/m/Y H:i') }}</div>
        @endif
    </div>
    <div class="mt-6">
        <a href="{{ route('admin.citas') }}" class="text-orange-500 hover:underline">← Volver</a>
    </div>
</div>
@endsection