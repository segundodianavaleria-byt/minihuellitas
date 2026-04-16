@extends('layouts.admin')

@section('header', 'Nuevo Servicio')

@section('content')
<div class="bg-white rounded-xl shadow-md p-6 max-w-2xl mx-auto">
    <form method="POST" action="{{ route('admin.servicios.store') }}">
        @csrf

        <div class="mb-4">
            <label class="block text-gray-700 font-semibold mb-2">Nombre *</label>
            <input type="text" name="nombre" value="{{ old('nombre') }}" class="w-full px-4 py-2 border rounded-lg" required>
        </div>

        <div class="mb-4">
            <label class="block text-gray-700 font-semibold mb-2">Descripción *</label>
            <textarea name="descripcion" rows="4" class="w-full px-4 py-2 border rounded-lg" required>{{ old('descripcion') }}</textarea>
        </div>

        <div class="mb-4">
            <label class="block text-gray-700 font-semibold mb-2">URL de la imagen</label>
            <input type="text" name="imagen" value="{{ old('imagen') }}" placeholder="https://ejemplo.com/imagen.jpg" class="w-full px-4 py-2 border rounded-lg">
            <p class="text-xs text-gray-500 mt-1">
                <i class="fas fa-info-circle"></i> Puedes usar imágenes de:
                <a href="https://unsplash.com" target="_blank" class="text-blue-500">Unsplash</a>, 
                <a href="https://pixabay.com" target="_blank" class="text-blue-500">Pixabay</a>, 
                o cualquier URL directa de imagen.
            </p>
        </div>

        <div class="grid grid-cols-2 gap-4 mb-4">
            <div>
                <label class="block text-gray-700 font-semibold mb-2">Precio *</label>
                <input type="number" step="0.01" name="precio" value="{{ old('precio') }}" class="w-full px-4 py-2 border rounded-lg" required>
            </div>
            <div>
                <label class="block text-gray-700 font-semibold mb-2">Duración (minutos) *</label>
                <input type="number" name="duracion_minutos" value="{{ old('duracion_minutos') }}" class="w-full px-4 py-2 border rounded-lg" required>
            </div>
        </div>

        <div class="grid grid-cols-2 gap-4 mb-4">
            <div>
                <label class="block text-gray-700 font-semibold mb-2">Categoría *</label>
                <select name="categoria" class="w-full px-4 py-2 border rounded-lg" required>
                    <option value="">Seleccionar</option>
                    <option value="corte">Corte</option>
                    <option value="baño">Baño</option>
                    <option value="spa">Spa</option>
                    <option value="salud">Salud</option>
                    <option value="urgencia">Urgencia</option>
                    <option value="entrenamiento">Entrenamiento</option>
                    <option value="paquete">Paquete</option>
                </select>
            </div>
            <div class="flex items-center pt-6">
                <label class="flex items-center cursor-pointer">
                    <input type="checkbox" name="activo" value="1" checked class="w-4 h-4 text-orange-500">
                    <span class="ml-2 text-gray-700">Activo</span>
                </label>
            </div>
        </div>

        <div class="flex justify-end space-x-3">
            <a href="{{ route('admin.servicios') }}" class="px-4 py-2 border rounded-lg hover:bg-gray-50">Cancelar</a>
            <button type="submit" class="px-4 py-2 bg-orange-500 text-white rounded-lg hover:bg-orange-600">Guardar</button>
        </div>
    </form>
</div>
@endsection