@extends('layouts.admin')

@section('header', 'Editar Servicio')

@section('content')
<div class="bg-white rounded-xl shadow-md p-6 max-w-2xl mx-auto">
    <form method="POST" action="{{ route('admin.servicios.update', $servicio->id) }}">
        @csrf
        @method('PUT')

        <div class="mb-4">
            <label class="block text-gray-700 font-semibold mb-2">Nombre *</label>
            <input type="text" name="nombre" value="{{ old('nombre', $servicio->nombre) }}" class="w-full px-4 py-2 border rounded-lg" required>
        </div>

        <div class="mb-4">
            <label class="block text-gray-700 font-semibold mb-2">Descripción *</label>
            <textarea name="descripcion" rows="4" class="w-full px-4 py-2 border rounded-lg" required>{{ old('descripcion', $servicio->descripcion) }}</textarea>
        </div>

        <div class="mb-4">
            <label class="block text-gray-700 font-semibold mb-2">URL de la imagen</label>
            <input type="text" name="imagen" value="{{ old('imagen', $servicio->imagen) }}" placeholder="https://ejemplo.com/imagen.jpg" class="w-full px-4 py-2 border rounded-lg">
            <p class="text-xs text-gray-500 mt-1">
                <i class="fas fa-info-circle"></i> Puedes usar imágenes de:
                <a href="https://unsplash.com" target="_blank" class="text-blue-500">Unsplash</a>, 
                <a href="https://pixabay.com" target="_blank" class="text-blue-500">Pixabay</a>, 
                o cualquier URL directa de imagen.
            </p>
            @if($servicio->imagen)
                <div class="mt-2 p-2 bg-gray-100 rounded-lg">
                    <p class="text-xs text-gray-500 mb-2">Vista previa:</p>
                    <div class="flex justify-center">
                        <img src="{{ $servicio->imagen }}" class="max-w-full h-32 object-contain rounded" 
                             onerror="this.onerror=null; this.src='https://placehold.co/200x200?text=Imagen+no+disponible'">
                    </div>
                </div>
            @endif
        </div>

        <div class="grid grid-cols-2 gap-4 mb-4">
            <div>
                <label class="block text-gray-700 font-semibold mb-2">Precio *</label>
                <input type="number" step="0.01" name="precio" value="{{ old('precio', $servicio->precio) }}" class="w-full px-4 py-2 border rounded-lg" required>
            </div>
            <div>
                <label class="block text-gray-700 font-semibold mb-2">Duración (minutos) *</label>
                <input type="number" name="duracion_minutos" value="{{ old('duracion_minutos', $servicio->duracion_minutos) }}" class="w-full px-4 py-2 border rounded-lg" required>
            </div>
        </div>

        <div class="grid grid-cols-2 gap-4 mb-4">
            <div>
                <label class="block text-gray-700 font-semibold mb-2">Categoría *</label>
                <select name="categoria" class="w-full px-4 py-2 border rounded-lg" required>
                    <option value="">Seleccionar</option>
                    <option value="corte" {{ $servicio->categoria == 'corte' ? 'selected' : '' }}>Corte</option>
                    <option value="baño" {{ $servicio->categoria == 'baño' ? 'selected' : '' }}>Baño</option>
                    <option value="spa" {{ $servicio->categoria == 'spa' ? 'selected' : '' }}>Spa</option>
                    <option value="salud" {{ $servicio->categoria == 'salud' ? 'selected' : '' }}>Salud</option>
                    <option value="urgencia" {{ $servicio->categoria == 'urgencia' ? 'selected' : '' }}>Urgencia</option>
                    <option value="entrenamiento" {{ $servicio->categoria == 'entrenamiento' ? 'selected' : '' }}>Entrenamiento</option>
                    <option value="paquete" {{ $servicio->categoria == 'paquete' ? 'selected' : '' }}>Paquete</option>
                </select>
            </div>
            <div class="flex items-center pt-6">
                <label class="flex items-center cursor-pointer">
                    <input type="checkbox" name="activo" value="1" {{ $servicio->activo ? 'checked' : '' }} class="w-4 h-4 text-orange-500">
                    <span class="ml-2 text-gray-700">Activo</span>
                </label>
            </div>
        </div>

        <div class="flex justify-end space-x-3">
            <a href="{{ route('admin.servicios') }}" class="px-4 py-2 border rounded-lg hover:bg-gray-50">Cancelar</a>
            <button type="submit" class="px-4 py-2 bg-orange-500 text-white rounded-lg hover:bg-orange-600">Actualizar</button>
        </div>
    </form>
</div>
@endsection