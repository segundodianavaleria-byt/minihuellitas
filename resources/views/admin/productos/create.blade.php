@extends('layouts.admin')

@section('header', 'Nuevo Producto')

@section('content')
<div class="bg-white rounded-xl shadow-md p-6 max-w-2xl mx-auto">
    <form method="POST" action="{{ route('admin.productos.store') }}">
        @csrf

        <div class="mb-4">
            <label class="block text-gray-700 font-semibold mb-2">Nombre *</label>
            <input type="text" name="nombre" value="{{ old('nombre') }}" class="w-full px-4 py-2 border rounded-lg" required>
        </div>

        <div class="mb-4">
            <label class="block text-gray-700 font-semibold mb-2">Descripción *</label>
            <textarea name="descripcion" rows="3" class="w-full px-4 py-2 border rounded-lg" required>{{ old('descripcion') }}</textarea>
        </div>

        <div class="mb-4">
            <label class="block text-gray-700 font-semibold mb-2">URL de la imagen</label>
            <input type="text" name="imagen" value="{{ old('imagen') }}" placeholder="https://ejemplo.com/imagen.jpg" class="w-full px-4 py-2 border rounded-lg">
            <p class="text-xs text-gray-500 mt-1">
                <i class="fas fa-info-circle"></i> Puedes usar imágenes de:
                <a href="https://unsplash.com" target="_blank" class="text-blue-500">Unsplash</a>, 
                <a href="https://pixabay.com" target="_blank" class="text-blue-500">Pixabay</a>, 
                <a href="https://placekitten.com" target="_blank" class="text-blue-500">Place Kitten</a>, 
                o cualquier URL directa de imagen.
            </p>
        </div>

        <div class="grid grid-cols-2 gap-4 mb-4">
            <div>
                <label class="block text-gray-700 font-semibold mb-2">Precio *</label>
                <input type="number" step="0.01" name="precio" value="{{ old('precio') }}" class="w-full px-4 py-2 border rounded-lg" required>
            </div>
            <div>
                <label class="block text-gray-700 font-semibold mb-2">Stock *</label>
                <input type="number" name="stock" value="{{ old('stock') }}" class="w-full px-4 py-2 border rounded-lg" required>
            </div>
        </div>

        <div class="grid grid-cols-2 gap-4 mb-4">
            <div>
                <label class="block text-gray-700 font-semibold mb-2">Categoría *</label>
                <select name="categoria" class="w-full px-4 py-2 border rounded-lg" required>
                    <option value="">Seleccionar</option>
                    <option value="alimento">Alimento</option>
                    <option value="aseo">Aseo</option>
                    <option value="juguete">Juguete</option>
                    <option value="accesorio">Accesorio</option>
                    <option value="snack">Snack</option>
                </select>
            </div>
            <div class="flex items-center space-x-4">
                <label class="flex items-center">
                    <input type="checkbox" name="en_oferta" value="1" class="w-4 h-4 text-orange-500"> En oferta
                </label>
                <input type="number" name="descuento_porcentaje" placeholder="%" value="{{ old('descuento_porcentaje') }}" class="w-20 px-2 py-1 border rounded">
            </div>
        </div>

        <div class="flex justify-end space-x-3">
            <a href="{{ route('admin.productos') }}" class="px-4 py-2 border rounded-lg hover:bg-gray-50">Cancelar</a>
            <button type="submit" class="px-4 py-2 bg-orange-500 text-white rounded-lg hover:bg-orange-600">Guardar</button>
        </div>
    </form>
</div>
@endsection