@extends('layouts.admin')

@section('header', 'Mascotas')

@section('content')
<div class="bg-white rounded-xl shadow-md overflow-hidden">
    <div class="p-4 border-b">
        <h3 class="text-lg font-semibold">Lista de Mascotas</h3>
    </div>
    <div class="overflow-x-auto">
        <table class="w-full">
            <thead class="bg-gray-50">
                <tr>
                    <th class="px-4 py-2 text-left">ID</th>
                    <th class="px-4 py-2 text-left">Nombre</th>
                    <th class="px-4 py-2 text-left">Dueño</th>
                    <th class="px-4 py-2 text-left">Especie</th>
                    <th class="px-4 py-2 text-left">Raza</th>
                    <th class="px-4 py-2 text-left">Edad</th>
                    <th class="px-4 py-2 text-left">Estado</th>
                    <th class="px-4 py-2 text-left">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($mascotas as $mascota)
                <tr class="border-t {{ $mascota->trashed() ? 'bg-gray-50 opacity-60' : '' }}">
                    <td class="px-4 py-2">{{ $mascota->id }}</td>
                    <td class="px-4 py-2">{{ $mascota->nombre }}</td>
                    <td class="px-4 py-2">{{ $mascota->user->name }}</td>
                    <td class="px-4 py-2">{{ ucfirst($mascota->especie) }}</td>
                    <td class="px-4 py-2">{{ $mascota->raza ?? '-' }}</td>
                    <td class="px-4 py-2">{{ $mascota->edad ?? '-' }} años</td>
                    <td class="px-4 py-2">
                        @if($mascota->trashed())
                            <span class="bg-red-100 text-red-800 px-2 py-1 rounded-full text-xs">Eliminada</span>
                        @else
                            <span class="bg-green-100 text-green-800 px-2 py-1 rounded-full text-xs">Activa</span>
                        @endif
                    </td>
                    <td class="px-4 py-2 whitespace-nowrap">
                        <a href="{{ route('admin.mascotas.show', $mascota->id) }}" class="text-blue-600 hover:text-blue-800 mr-2"><i class="fas fa-eye"></i></a>
                        @if(!$mascota->trashed())
                            <form method="POST" action="{{ route('admin.mascotas.destroy', $mascota->id) }}" class="inline" onsubmit="return confirm('¿Mover a papelera?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-600 hover:text-red-800"><i class="fas fa-trash-alt"></i></button>
                            </form>
                        @else
                            <form method="POST" action="{{ route('admin.mascotas.restore', $mascota->id) }}" class="inline">
                                @csrf
                                <button type="submit" class="text-green-600 hover:text-green-800 mr-2"><i class="fas fa-trash-restore"></i></button>
                            </form>
                            <form method="POST" action="{{ route('admin.mascotas.forceDelete', $mascota->id) }}" class="inline" onsubmit="return confirm('¿Eliminar permanentemente?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-600 hover:text-red-800"><i class="fas fa-skull-crossbones"></i></button>
                            </form>
                        @endif
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="p-4 border-t">{{ $mascotas->links() }}</div>
</div>
@endsection