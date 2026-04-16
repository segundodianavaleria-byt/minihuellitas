@extends('layouts.admin')

@section('header', 'Servicios')

@section('content')
<div class="bg-white rounded-xl shadow-md overflow-hidden">
    <div class="p-4 border-b flex justify-between items-center">
        <h3 class="text-lg font-semibold">Lista de Servicios</h3>
        <a href="{{ route('admin.servicios.create') }}" class="bg-orange-500 text-white px-4 py-2 rounded-lg hover:bg-orange-600">+ Nuevo Servicio</a>
    </div>
    <div class="overflow-x-auto">
        <table class="w-full">
            <thead class="bg-gray-50">
                <tr>
                    <th class="px-4 py-2 text-left">ID</th>
                    <th class="px-4 py-2 text-left">Imagen</th>
                    <th class="px-4 py-2 text-left">Nombre</th>
                    <th class="px-4 py-2 text-left">Categoría</th>
                    <th class="px-4 py-2 text-left">Precio</th>
                    <th class="px-4 py-2 text-left">Duración</th>
                    <th class="px-4 py-2 text-left">Estado</th>
                    <th class="px-4 py-2 text-left">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($servicios as $servicio)
                <tr class="border-t {{ $servicio->trashed() ? 'bg-gray-50 opacity-60' : '' }}">
                    <td class="px-4 py-2">{{ $servicio->id }}</td>
                    <td class="px-4 py-2">
                        @if($servicio->imagen)
                            <img src="{{ $servicio->imagen }}" class="w-10 h-10 object-cover rounded" 
                                 onerror="this.onerror=null; this.src='https://placehold.co/40x40?text=No+Imagen'">
                        @else
                            <i class="fas fa-image text-gray-400 text-2xl"></i>
                        @endif
                    </td>
                    <td class="px-4 py-2">{{ $servicio->nombre }}</td>
                    <td class="px-4 py-2">{{ ucfirst($servicio->categoria) }}</td>
                    <td class="px-4 py-2">${{ number_format($servicio->precio, 2) }}</td>
                    <td class="px-4 py-2">{{ $servicio->duracion_minutos }} min</td>
                    <td class="px-4 py-2">
                        @if($servicio->trashed())
                            <span class="bg-red-100 text-red-800 px-2 py-1 rounded-full text-xs">Eliminado</span>
                        @else
                            <form method="POST" action="{{ route('admin.servicios.toggle', $servicio->id) }}" class="inline">
                                @csrf
                                <button type="submit" class="px-2 py-1 rounded-full text-xs font-semibold {{ $servicio->activo ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }}">
                                    {{ $servicio->activo ? 'Activo' : 'Inactivo' }}
                                </button>
                            </form>
                        @endif
                    </td>
                    <td class="px-4 py-2 whitespace-nowrap">
                        @if($servicio->trashed())
                            <form method="POST" action="{{ route('admin.servicios.restore', $servicio->id) }}" class="inline">
                                @csrf
                                <button type="submit" class="text-green-600 hover:text-green-800 mr-2"><i class="fas fa-trash-restore"></i></button>
                            </form>
                            <form method="POST" action="{{ route('admin.servicios.forceDelete', $servicio->id) }}" class="inline" onsubmit="return confirm('¿Eliminar permanentemente?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-600 hover:text-red-800"><i class="fas fa-skull-crossbones"></i></button>
                            </form>
                        @else
                            <a href="{{ route('admin.servicios.edit', $servicio->id) }}" class="text-blue-600 hover:text-blue-800 mr-2"><i class="fas fa-edit"></i></a>
                            <form method="POST" action="{{ route('admin.servicios.destroy', $servicio->id) }}" class="inline" onsubmit="return confirm('¿Mover a papelera?')">
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
    <div class="p-4 border-t">{{ $servicios->links() }}</div>
</div>
@endsection