@extends('layouts.app')

@section('title', ' - Registro')

@section('content')
<div class="min-h-screen bg-cream py-12">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
        
       @if($errors->any())
<div class="mb-6 bg-red-50 border-l-4 border-red-500 rounded-lg p-4">
    <div class="flex items-start">
        <i class="fas fa-exclamation-circle text-red-500 text-xl mr-3 mt-0.5"></i>
        <div>
            <p class="text-red-800 font-semibold mb-2">Por favor corrige los siguientes errores:</p>
            <ul class="text-red-600 text-sm space-y-1">
                @foreach($errors->all() as $error)
                    <li>• {{ $error }}</li>
                @endforeach
            </ul>
        </div>
    </div>
</div>
@endif
        
        <div class="bg-white rounded-2xl shadow-xl overflow-hidden">
            <div class="bg-gradient-to-r from-orange-500 to-orange-600 px-6 py-4">
                <h2 class="text-2xl font-bold text-white">Crear una cuenta</h2>
                <p class="text-orange-100">Registra tus datos y las mascotas que tienes</p>
            </div>
            
            <form method="POST" action="{{ route('register') }}" class="p-6" id="registerForm" enctype="multipart/form-data">
                @csrf
                
                <!-- Datos del propietario -->
                <div class="border-b border-gray-200 pb-6 mb-6">
                    <h3 class="text-lg font-semibold text-gray-800 mb-4 flex items-center">
                        <i class="fas fa-user text-orange-500 mr-2"></i>
                        Datos del propietario
                    </h3>
                    
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
    <label class="block text-gray-700 text-sm font-semibold mb-2">Nombre completo *</label>
    <input type="text" name="name" value="{{ old('name') }}" 
        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-orange-500 @error('name') border-red-500 @enderror" 
        placeholder="Ej: Juan Pérez" 
        required
        oninput="this.value = this.value.replace(/[^a-zA-ZáéíóúñÑüÜ\s]/g, '');">
    <p class="text-xs text-gray-500 mt-1">Solo letras, mínimo 3 caracteres</p>
    @error('name') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
</div>
                        
                        <div>
                            <label class="block text-gray-700 text-sm font-semibold mb-2">Email *</label>
                            <input type="email" name="email" value="{{ old('email') }}" 
                                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-orange-500 @error('email') border-red-500 @enderror" 
                                placeholder="ejemplo@correo.com" required>
                            @error('email') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                        </div>
                        
                        <div>
    <label class="block text-gray-700 text-sm font-semibold mb-2">Teléfono *</label>
    <input type="tel" name="telefono" value="{{ old('telefono') }}" 
        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-orange-500 @error('telefono') border-red-500 @enderror" 
        placeholder="55 1234 5678" 
        required
        oninput="this.value = this.value.replace(/[^0-9+\-\s()]/g, '');">
    <p class="text-xs text-gray-500 mt-1">Solo números, guiones o espacios (mínimo 8 dígitos)</p>
    @error('telefono') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
</div>
                        
                        <div>
                            <label class="block text-gray-700 text-sm font-semibold mb-2">Dirección</label>
                            <input type="text" name="direccion" value="{{ old('direccion') }}" 
                                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-orange-500">
                        </div>
                        
                        <div>
                            <label class="block text-gray-700 text-sm font-semibold mb-2">Contraseña *</label>
                            <input type="password" name="password" 
                                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-orange-500 @error('password') border-red-500 @enderror" required>
                            <p class="text-xs text-gray-500 mt-1">Mínimo 8 caracteres: una mayúscula, una minúscula, un número y un carácter especial (@$!%*?&)</p>
                            @error('password') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                        </div>
                        
                        <div>
                            <label class="block text-gray-700 text-sm font-semibold mb-2">Confirmar contraseña *</label>
                            <input type="password" name="password_confirmation" 
                                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-orange-500" required>
                        </div>
                    </div>
                </div>
                
                <!-- Datos de la mascota -->
                <div class="border-b border-gray-200 pb-6 mb-6">
                    <div class="flex justify-between items-center mb-4">
                        <h3 class="text-lg font-semibold text-gray-800 flex items-center">
                            <i class="fas fa-dog text-orange-500 mr-2"></i>
                            Datos de tu mascota
                        </h3>
                        <button type="button" id="addPetBtn" class="text-orange-500 hover:text-orange-600 text-sm font-semibold">
                            <i class="fas fa-plus-circle mr-1"></i> Agregar otra mascota
                        </button>
                    </div>
                    
                    <div id="petsContainer">
                        <div class="pet-card bg-gray-50 rounded-lg p-4 mb-4">
                            <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                                <div>
                                    <label class="block text-gray-700 text-sm font-semibold mb-2">Nombre de la mascota *</label>
                                    <input type="text" name="mascotas[0][nombre]" value="{{ old('mascotas.0.nombre') }}" 
                                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-orange-500" 
                                        placeholder="Ej: Max" required>
                                    <p class="text-xs text-gray-500 mt-1">Solo letras, mínimo 2 caracteres</p>
                                </div>
                                <div>
                                    <label class="block text-gray-700 text-sm font-semibold mb-2">Especie *</label>
                                    <select name="mascotas[0][especie]" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-orange-500" required>
                                        <option value="">Selecciona</option>
                                        <option value="perro" {{ old('mascotas.0.especie') == 'perro' ? 'selected' : '' }}>🐕 Perro</option>
                                        <option value="gato" {{ old('mascotas.0.especie') == 'gato' ? 'selected' : '' }}>🐱 Gato</option>
                                        <option value="conejo" {{ old('mascotas.0.especie') == 'conejo' ? 'selected' : '' }}>🐇 Conejo</option>
                                        <option value="ave" {{ old('mascotas.0.especie') == 'ave' ? 'selected' : '' }}>🐦 Ave</option>
                                        <option value="otro" {{ old('mascotas.0.especie') == 'otro' ? 'selected' : '' }}>🦎 Otro</option>
                                    </select>
                                </div>
                                <div>
                                    <label class="block text-gray-700 text-sm font-semibold mb-2">Raza</label>
                                    <input type="text" name="mascotas[0][raza]" value="{{ old('mascotas.0.raza') }}" 
                                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-orange-500"
                                        placeholder="Ej: Golden Retriever">
                                    <p class="text-xs text-gray-500 mt-1">Solo letras</p>
                                </div>
                                <div>
                                    <label class="block text-gray-700 text-sm font-semibold mb-2">Edad (años)</label>
                                    <input type="number" name="mascotas[0][edad]" step="0.5" value="{{ old('mascotas.0.edad') }}" 
                                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-orange-500"
                                        placeholder="Ej: 2.5">
                                    <p class="text-xs text-gray-500 mt-1">Número entre 0 y 30</p>
                                </div>
                                <div>
                                    <label class="block text-gray-700 text-sm font-semibold mb-2">Sexo</label>
                                    <select name="mascotas[0][sexo]" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-orange-500">
                                        <option value="">Selecciona</option>
                                        <option value="macho" {{ old('mascotas.0.sexo') == 'macho' ? 'selected' : '' }}>🐕 Macho</option>
                                        <option value="hembra" {{ old('mascotas.0.sexo') == 'hembra' ? 'selected' : '' }}>🐩 Hembra</option>
                                    </select>
                                </div>
                                <div>
    <label class="block text-gray-700 text-sm font-semibold mb-2">Peso (kg)</label>
    <input type="number" name="mascotas[0][peso]" value="{{ old('mascotas.0.peso') }}" 
        step="0.01" 
        min="0" 
        max="100"
        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-orange-500"
        placeholder="Ej: 15.5"
        oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');">
    <p class="text-xs text-gray-500 mt-1">Número entre 0 y 100 (ejemplo: 15.5)</p>
</div>
                                <div class="md:col-span-3">
                                    <label class="block text-gray-700 text-sm font-semibold mb-2">Foto de la mascota</label>
                                    <input type="file" name="mascotas[0][foto]" accept="image/*" 
                                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-orange-500">
                                    <p class="text-xs text-gray-500 mt-1">Formatos: JPG, PNG, GIF (máx. 2MB)</p>
                                </div>
                                <div class="md:col-span-3">
                                    <label class="block text-gray-700 text-sm font-semibold mb-2">Observaciones médicas</label>
                                    <textarea name="mascotas[0][observaciones]" rows="2" 
                                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-orange-500" 
                                        placeholder="Alergias, condiciones médicas, medicamentos, etc.">{{ old('mascotas.0.observaciones') }}</textarea>
                                </div>
                            </div>
                            <button type="button" class="remove-pet text-red-500 text-sm mt-3 hidden">Eliminar mascota</button>
                        </div>
                    </div>
                </div>
                
                <div class="flex items-center justify-between">
                    <div class="flex items-center">
                        <input type="checkbox" name="terms" id="terms" class="w-4 h-4 text-orange-500 border-gray-300 rounded" {{ old('terms') ? 'checked' : '' }} required>
                        <label for="terms" class="ml-2 text-sm text-gray-600">
    Acepto los <a href="{{ route('terms') }}" target="_blank" class="text-orange-500 hover:underline">términos y condiciones</a> *
</label>
                    </div>
                    <div>
                        <a href="{{ route('login') }}" class="text-gray-600 hover:text-orange-500 mr-4">¿Ya tienes cuenta?</a>
                        <button type="submit" id="submitBtn" class="bg-orange-500 text-white px-6 py-2 rounded-lg font-semibold hover:bg-orange-600 transition-all btn-effect">
                            Registrarse
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
let petCount = 1;

function removePet(e) {
    const petCard = e.target.closest('.pet-card');
    if (document.querySelectorAll('.pet-card').length > 1) {
        petCard.remove();
    } else {
        alert('Debes tener al menos una mascota registrada');
    }
}

document.getElementById('addPetBtn').addEventListener('click', function() {
    const container = document.getElementById('petsContainer');
    const newPet = document.createElement('div');
    newPet.className = 'pet-card bg-gray-50 rounded-lg p-4 mb-4';
    newPet.innerHTML = `
        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
            <div>
                <label class="block text-gray-700 text-sm font-semibold mb-2">Nombre de la mascota *</label>
                <input type="text" name="mascotas[${petCount}][nombre]" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-orange-500" required>
                <p class="text-xs text-gray-500 mt-1">Solo letras, mínimo 2 caracteres</p>
            </div>
            <div>
                <label class="block text-gray-700 text-sm font-semibold mb-2">Especie *</label>
                <select name="mascotas[${petCount}][especie]" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-orange-500" required>
                    <option value="">Selecciona</option>
                    <option value="perro">🐕 Perro</option>
                    <option value="gato">🐱 Gato</option>
                    <option value="conejo">🐇 Conejo</option>
                    <option value="ave">🐦 Ave</option>
                    <option value="otro">🦎 Otro</option>
                </select>
            </div>
            <div>
                <label class="block text-gray-700 text-sm font-semibold mb-2">Raza</label>
                <input type="text" name="mascotas[${petCount}][raza]" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-orange-500">
                <p class="text-xs text-gray-500 mt-1">Solo letras</p>
            </div>
            <div>
                <label class="block text-gray-700 text-sm font-semibold mb-2">Edad (años)</label>
                <input type="number" name="mascotas[${petCount}][edad]" step="0.5" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-orange-500">
                <p class="text-xs text-gray-500 mt-1">Número entre 0 y 30</p>
            </div>
            <div>
                <label class="block text-gray-700 text-sm font-semibold mb-2">Sexo</label>
                <select name="mascotas[${petCount}][sexo]" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-orange-500">
                    <option value="">Selecciona</option>
                    <option value="macho">🐕 Macho</option>
                    <option value="hembra">🐩 Hembra</option>
                </select>
            </div>
            <div>
                <label class="block text-gray-700 text-sm font-semibold mb-2">Peso (kg)</label>
                <input type="text" name="mascotas[${petCount}][peso]" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-orange-500">
                <p class="text-xs text-gray-500 mt-1">Número entre 0 y 100</p>
            </div>
            <div class="md:col-span-3">
                <label class="block text-gray-700 text-sm font-semibold mb-2">Foto de la mascota</label>
                <input type="file" name="mascotas[${petCount}][foto]" accept="image/*" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-orange-500">
                <p class="text-xs text-gray-500 mt-1">Formatos: JPG, PNG, GIF (máx. 2MB)</p>
            </div>
            <div class="md:col-span-3">
                <label class="block text-gray-700 text-sm font-semibold mb-2">Observaciones médicas</label>
                <textarea name="mascotas[${petCount}][observaciones]" rows="2" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-orange-500" placeholder="Alergias, condiciones médicas, medicamentos, etc."></textarea>
            </div>
        </div>
        <button type="button" class="remove-pet text-red-500 text-sm mt-3">Eliminar mascota</button>
    `;
    container.appendChild(newPet);
    petCount++;
    
    document.querySelectorAll('.remove-pet').forEach(btn => {
        btn.removeEventListener('click', removePet);
        btn.addEventListener('click', removePet);
    });
});

document.querySelectorAll('.remove-pet').forEach(btn => {
    btn.addEventListener('click', removePet);
});

document.getElementById('registerForm').addEventListener('submit', function(e) {
    const submitBtn = document.getElementById('submitBtn');
    if (submitBtn.disabled) {
        e.preventDefault();
        return false;
    }
    submitBtn.disabled = true;
    submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin mr-2"></i> Registrando...';
    return true;
});
</script>
@endsection