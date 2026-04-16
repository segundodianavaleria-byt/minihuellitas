@extends('layouts.admin')

@section('header', 'Usuarios')

@section('content')
<div class="bg-white rounded-xl shadow-md overflow-hidden">
    <div class="p-4 border-b">
        <h3 class="text-lg font-semibold">Lista de Usuarios</h3>
    </div>
    <div class="overflow-x-auto">
        <table class="w-full">
            <thead class="bg-gray-50">
                <tr>
                    <th class="px-4 py-2 text-left">ID</th>
                    <th class="px-4 py-2 text-left">Nombre</th>
                    <th class="px-4 py-2 text-left">Email</th>
                    <th class="px-4 py-2 text-left">Teléfono</th>
                    <th class="px-4 py-2 text-left">Mascotas</th>
                    <th class="px-4 py-2 text-left">Registro</th>
                    <th class="px-4 py-2 text-left">Estado</th>
                    <th class="px-4 py-2 text-left">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($usuarios as $usuario)
                <tr class="border-t {{ $usuario->trashed() ? 'bg-gray-50 opacity-60' : '' }}">
                    <td class="px-4 py-2">{{ $usuario->id }}</td>
                    <td class="px-4 py-2">{{ $usuario->name }}</td>
                    <td class="px-4 py-2">{{ $usuario->email }}</td>
                    <td class="px-4 py-2">{{ $usuario->telefono ?? '-' }}</td>
                    <td class="px-4 py-2">{{ $usuario->mascotas->count() }}</td>
                    <td class="px-4 py-2">{{ $usuario->created_at->format('d/m/Y') }}</td>
                    <td class="px-4 py-2">
                        @if($usuario->trashed())
                            <span class="bg-red-100 text-red-800 px-2 py-1 rounded-full text-xs">Eliminado</span>
                        @else
                            <span class="bg-green-100 text-green-800 px-2 py-1 rounded-full text-xs">Activo</span>
                        @endif
                    </td>
                    <td class="px-4 py-2 whitespace-nowrap">
                        <a href="{{ route('admin.usuarios.show', $usuario->id) }}" class="text-blue-600 hover:text-blue-800 mr-2"><i class="fas fa-eye"></i></a>
                        @if(!$usuario->trashed())
                            <form method="POST" action="{{ route('admin.usuarios.destroy', $usuario->id) }}" class="inline" onsubmit="return confirm('¿Mover a papelera?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-600 hover:text-red-800"><i class="fas fa-trash-alt"></i></button>
                            </form>
                        @else
                            <form method="POST" action="{{ route('admin.usuarios.restore', $usuario->id) }}" class="inline">
                                @csrf
                                <button type="submit" class="text-green-600 hover:text-green-800 mr-2"><i class="fas fa-trash-restore"></i></button>
                            </form>
                            <form method="POST" action="{{ route('admin.usuarios.forceDelete', $usuario->id) }}" class="inline" onsubmit="return confirm('¿Eliminar permanentemente?')">
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
    <div class="p-4 border-t">{{ $usuarios->links() }}</div>
</div>
@endsection