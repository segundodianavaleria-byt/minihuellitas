@extends('layouts.admin')

@section('header', 'Citas')

@section('content')
<div class="bg-white rounded-xl shadow-md overflow-hidden">
    <div class="p-4 border-b">
        <h3 class="text-lg font-semibold">Lista de Citas</h3>
    </div>
    <div class="overflow-x-auto">
        <table class="w-full">
            <thead class="bg-gray-50">
                <tr>
                    <th class="px-4 py-2 text-left">ID</th>
                    <th class="px-4 py-2 text-left">Cliente</th>
                    <th class="px-4 py-2 text-left">Mascota</th>
                    <th class="px-4 py-2 text-left">Servicio</th>
                    <th class="px-4 py-2 text-left">Fecha</th>
                    <th class="px-4 py-2 text-left">Hora</th>
                    <th class="px-4 py-2 text-left">Estado</th>
                    <th class="px-4 py-2 text-left">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($citas as $cita)
                <tr class="border-t {{ $cita->trashed() ? 'bg-gray-50 opacity-60' : '' }}">
                    <td class="px-4 py-2">{{ $cita->id }}</td>
                    <td class="px-4 py-2">{{ $cita->user->name }}</td>
                    <td class="px-4 py-2">{{ $cita->mascota->nombre }}</td>
                    <td class="px-4 py-2">{{ $cita->servicio->nombre }}</td>
                    <td class="px-4 py-2">{{ \Carbon\Carbon::parse($cita->fecha)->format('d/m/Y') }}</td>
                    <td class="px-4 py-2">{{ $cita->hora }}</td>
                    <td class="px-4 py-2">
                        @if($cita->trashed())
                            <span class="bg-red-100 text-red-800 px-2 py-1 rounded-full text-xs">Eliminada</span>
                        @else
                            <form method="POST" action="{{ route('admin.citas.estado', $cita->id) }}" class="inline">
                                @csrf
                                @method('PUT')
                                <select name="estado" onchange="this.form.submit()" class="text-xs rounded-full px-2 py-1 {{ $cita->estado == 'pendiente' ? 'bg-yellow-100 text-yellow-800' : ($cita->estado == 'confirmada' ? 'bg-green-100 text-green-800' : ($cita->estado == 'completada' ? 'bg-blue-100 text-blue-800' : 'bg-red-100 text-red-800')) }}">
                                    <option value="pendiente" {{ $cita->estado == 'pendiente' ? 'selected' : '' }}>Pendiente</option>
                                    <option value="confirmada" {{ $cita->estado == 'confirmada' ? 'selected' : '' }}>Confirmada</option>
                                    <option value="completada" {{ $cita->estado == 'completada' ? 'selected' : '' }}>Completada</option>
                                    <option value="cancelada" {{ $cita->estado == 'cancelada' ? 'selected' : '' }}>Cancelada</option>
                                </select>
                            </form>
                        @endif
                    </td>
                    <td class="px-4 py-2 whitespace-nowrap">
                        @if($cita->trashed())
                            <form method="POST" action="{{ route('admin.citas.restore', $cita->id) }}" class="inline">
                                @csrf
                                <button type="submit" class="text-green-600 hover:text-green-800 mr-2"><i class="fas fa-trash-restore"></i></button>
                            </form>
                            <form method="POST" action="{{ route('admin.citas.forceDelete', $cita->id) }}" class="inline" onsubmit="return confirm('¿Eliminar permanentemente?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-600 hover:text-red-800"><i class="fas fa-skull-crossbones"></i></button>
                            </form>
                        @else
                            <a href="{{ route('admin.citas.show', $cita->id) }}" class="text-blue-600 hover:text-blue-800 mr-2"><i class="fas fa-eye"></i></a>
                            <form method="POST" action="{{ route('admin.citas.destroy', $cita->id) }}" class="inline" onsubmit="return confirm('¿Mover a papelera?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-600 hover:text-red-800"><i class="fas fa-trash-alt"></i></button>
                            </form>
                        @endif
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="p-4 border-t">{{ $citas->links() }}</div>
</div>
@endsection