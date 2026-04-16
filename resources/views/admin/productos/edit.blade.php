@extends('layouts.admin')

@section('header', 'Editar Producto')

@section('content')
<div class="bg-white rounded-xl shadow-md p-6 max-w-2xl mx-auto">
    <form method="POST" action="{{ route('admin.productos.update', $producto->id) }}">
        @csrf
        @method('PUT')

        <div class="mb-4">
            <label class="block text-gray-700 font-semibold mb-2">Nombre *</label>
            <input type="text" name="nombre" value="{{ old('nombre', $producto->nombre) }}" class="w-full px-4 py-2 border rounded-lg" required>
        </div>

        <div class="mb-4">
            <label class="block text-gray-700 font-semibold mb-2">Descripción *</label>
            <textarea name="descripcion" rows="3" class="w-full px-4 py-2 border rounded-lg" required>{{ old('descripcion', $producto->descripcion) }}</textarea>
        </div>

        <div class="mb-4">
            <label class="block text-gray-700 font-semibold mb-2">URL de la imagen</label>
            <input type="text" name="imagen" value="{{ old('imagen', $producto->imagen) }}" placeholder="https://ejemplo.com/imagen.jpg" class="w-full px-4 py-2 border rounded-lg">
            <p class="text-xs text-gray-500 mt-1">
                <i class="fas fa-info-circle"></i> Puedes usar:
                <a href="https://unsplash.com" target="_blank" class="text-blue-500">Unsplash</a>, 
                <a href="https://pixabay.com" target="_blank" class="text-blue-500">Pixabay</a>, 
                o URL directa de imagen.
            </p>
            @if($producto->imagen)
                <div class="mt-2 p-2 bg-gray-100 rounded-lg">
                    <p class="text-xs text-gray-500 mb-2">Vista previa:</p>
                    <div class="flex justify-center">
                        @php
                            $imgUrl = \App\Helpers\ImageHelper::processUrl($producto->imagen);
                        @endphp
                        <img src="{{ $imgUrl }}" class="max-w-full h-32 object-contain rounded" 
                             onerror="this.src='https://placehold.co/200x200?text=Imagen+no+disponible'">
                    </div>
                </div>
            @endif
        </div>

        <div class="grid grid-cols-2 gap-4 mb-4">
            <div>
                <label class="block text-gray-700 font-semibold mb-2">Precio *</label>
                <input type="number" step="0.01" name="precio" value="{{ old('precio', $producto->precio) }}" class="w-full px-4 py-2 border rounded-lg" required>
            </div>
            <div>
                <label class="block text-gray-700 font-semibold mb-2">Stock *</label>
                <input type="number" name="stock" value="{{ old('stock', $producto->stock) }}" class="w-full px-4 py-2 border rounded-lg" required>
            </div>
        </div>

        <div class="grid grid-cols-2 gap-4 mb-4">
            <div>
                <label class="block text-gray-700 font-semibold mb-2">Categoría *</label>
                <select name="categoria" class="w-full px-4 py-2 border rounded-lg" required>
                    <option value="">Seleccionar</option>
                    <option value="alimento" {{ $producto->categoria == 'alimento' ? 'selected' : '' }}>Alimento</option>
                    <option value="aseo" {{ $producto->categoria == 'aseo' ? 'selected' : '' }}>Aseo</option>
                    <option value="juguete" {{ $producto->categoria == 'juguete' ? 'selected' : '' }}>Juguete</option>
                    <option value="accesorio" {{ $producto->categoria == 'accesorio' ? 'selected' : '' }}>Accesorio</option>
                    <option value="snack" {{ $producto->categoria == 'snack' ? 'selected' : '' }}>Snack</option>
                </select>
            </div>
            <div class="flex items-center space-x-4">
                <label class="flex items-center">
                    <input type="checkbox" name="en_oferta" value="1" {{ $producto->en_oferta ? 'checked' : '' }} class="w-4 h-4 text-orange-500"> En oferta
                </label>
                <input type="number" name="descuento_porcentaje" placeholder="%" value="{{ old('descuento_porcentaje', $producto->descuento_porcentaje) }}" class="w-20 px-2 py-1 border rounded">
            </div>
        </div>

        <div class="flex justify-end space-x-3">
            <a href="{{ route('admin.productos') }}" class="px-4 py-2 border rounded-lg hover:bg-gray-50">Cancelar</a>
            <button type="submit" class="px-4 py-2 bg-orange-500 text-white rounded-lg hover:bg-orange-600">Actualizar</button>
        </div>
    </form>
</div>
@endsection