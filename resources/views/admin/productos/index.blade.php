@extends('layouts.admin')

@section('header', 'Productos')

@section('content')
<div class="bg-white rounded-xl shadow-md overflow-hidden">
    <div class="p-4 border-b flex justify-between items-center">
        <h3 class="text-lg font-semibold">Lista de Productos</h3>
        <a href="{{ route('admin.productos.create') }}" class="bg-orange-500 text-white px-4 py-2 rounded-lg hover:bg-orange-600">+ Nuevo Producto</a>
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
                    <th class="px-4 py-2 text-left">Stock</th>
                    <th class="px-4 py-2 text-left">Estado</th>
                    <th class="px-4 py-2 text-left">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($productos as $producto)
                <tr class="border-t {{ $producto->trashed() ? 'bg-gray-50 opacity-60' : '' }}">
                    <td class="px-4 py-2">{{ $producto->id }}</td>
                    <td class="px-4 py-2">
                        @php
                            $imgUrl = $producto->imagen ? \App\Helpers\ImageHelper::processUrl($producto->imagen) : \App\Helpers\ImageHelper::getPlaceholder($producto->categoria);
                        @endphp
                        <img src="{{ $imgUrl }}" class="w-10 h-10 object-cover rounded" 
                             onerror="this.src='https://placehold.co/40x40?text=Error'">
                    </td>
                    <td class="px-4 py-2">{{ $producto->nombre }}</td>
                    <td class="px-4 py-2">{{ ucfirst($producto->categoria) }}</td>
                    <td class="px-4 py-2">${{ number_format($producto->precio, 2) }}
                        @if($producto->en_oferta) <span class="text-red-500 text-xs"> -{{ $producto->descuento_porcentaje }}%</span>@endif
                    </td>
                    <td class="px-4 py-2">
                        <form method="POST" action="{{ route('admin.productos.stock', $producto->id) }}" class="inline-flex">
                            @csrf
                            <input type="number" name="stock" value="{{ $producto->stock }}" class="w-20 px-2 py-1 border rounded text-sm">
                            <button type="submit" class="ml-1 text-blue-600"><i class="fas fa-save"></i></button>
                        </form>
                    </td>
                    <td class="px-4 py-2">
                        @if($producto->trashed())
                            <span class="bg-red-100 text-red-800 px-2 py-1 rounded-full text-xs">Eliminado</span>
                        @else
                            <span class="bg-green-100 text-green-800 px-2 py-1 rounded-full text-xs">Activo</span>
                        @endif
                    </td>
                    <td class="px-4 py-2 whitespace-nowrap">
                        @if($producto->trashed())
                            <form method="POST" action="{{ route('admin.productos.restore', $producto->id) }}" class="inline">
                                @csrf
                                <button type="submit" class="text-green-600 hover:text-green-800 mr-2"><i class="fas fa-trash-restore"></i></button>
                            </form>
                            <form method="POST" action="{{ route('admin.productos.forceDelete', $producto->id) }}" class="inline" onsubmit="return confirm('¿Eliminar permanentemente?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-600 hover:text-red-800"><i class="fas fa-skull-crossbones"></i></button>
                            </form>
                        @else
                            <a href="{{ route('admin.productos.edit', $producto->id) }}" class="text-blue-600 hover:text-blue-800 mr-2"><i class="fas fa-edit"></i></a>
                            <form method="POST" action="{{ route('admin.productos.destroy', $producto->id) }}" class="inline" onsubmit="return confirm('¿Mover a papelera?')">
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
    <div class="p-4 border-t">{{ $productos->links() }}</div>
</div>
@endsection