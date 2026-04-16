@extends('layouts.app')

@section('title', ' - Contacto')

@section('content')
<div class="bg-cream">
    <!-- Hero Section -->
    <div class="bg-gradient-to-r from-orange-500 to-orange-600 text-white py-16">
        <div class="max-w-7xl mx-auto px-4 text-center">
            <h1 class="text-4xl md:text-5xl font-bold mb-4">Contáctanos</h1>
            <p class="text-xl text-orange-100 max-w-2xl mx-auto">
                Estamos aquí para ayudarte y resolver todas tus dudas
            </p>
        </div>
    </div>

    <div class="max-w-7xl mx-auto px-4 py-12">
        
        <!-- ==================== INFORMACIÓN DE CONTACTO ==================== -->
        <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-12">
            <div class="bg-white rounded-2xl shadow-lg p-6 text-center group hover:shadow-xl transition-all hover:-translate-y-1">
                <div class="w-16 h-16 bg-orange-100 rounded-full flex items-center justify-center mx-auto mb-4 group-hover:bg-orange-500 transition-all">
                    <i class="fas fa-map-marker-alt text-orange-500 text-2xl group-hover:text-white"></i>
                </div>
                <h3 class="text-lg font-bold text-gray-800 mb-2">Dirección</h3>
                <p class="text-gray-600 text-sm">Av. Principal #123<br>Colonia Centro, Ciudad</p>
            </div>
            
            <div class="bg-white rounded-2xl shadow-lg p-6 text-center group hover:shadow-xl transition-all hover:-translate-y-1">
                <div class="w-16 h-16 bg-orange-100 rounded-full flex items-center justify-center mx-auto mb-4 group-hover:bg-orange-500 transition-all">
                    <i class="fas fa-phone-alt text-orange-500 text-2xl group-hover:text-white"></i>
                </div>
                <h3 class="text-lg font-bold text-gray-800 mb-2">Teléfono</h3>
                <p class="text-gray-600 text-sm">(55) 1234 5678<br>(55) 8765 4321</p>
            </div>
            
            <div class="bg-white rounded-2xl shadow-lg p-6 text-center group hover:shadow-xl transition-all hover:-translate-y-1">
                <div class="w-16 h-16 bg-orange-100 rounded-full flex items-center justify-center mx-auto mb-4 group-hover:bg-orange-500 transition-all">
                    <i class="fas fa-envelope text-orange-500 text-2xl group-hover:text-white"></i>
                </div>
                <h3 class="text-lg font-bold text-gray-800 mb-2">Email</h3>
                <p class="text-gray-600 text-sm">info@minihuellitas.com<br>citas@minihuellitas.com</p>
            </div>
            
            <div class="bg-white rounded-2xl shadow-lg p-6 text-center group hover:shadow-xl transition-all hover:-translate-y-1">
                <div class="w-16 h-16 bg-orange-100 rounded-full flex items-center justify-center mx-auto mb-4 group-hover:bg-orange-500 transition-all">
                    <i class="fas fa-clock text-orange-500 text-2xl group-hover:text-white"></i>
                </div>
                <h3 class="text-lg font-bold text-gray-800 mb-2">Horario</h3>
                <p class="text-gray-600 text-sm">Lun-Vie: 9:00 - 20:00<br>Sáb: 9:00 - 18:00</p>
            </div>
        </div>
        
        <!-- ==================== FORMULARIO DE CONTACTO Y MAPA ==================== -->
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
            
            <!-- Formulario de contacto -->
            <div class="bg-white rounded-2xl shadow-xl overflow-hidden">
                <div class="bg-gradient-to-r from-orange-500 to-orange-600 px-6 py-4">
                    <h2 class="text-xl font-bold text-white">Envíanos un mensaje</h2>
                    <p class="text-orange-100 text-sm">Te responderemos a la brevedad</p>
                </div>
                
                <form action="{{ route('contacto.enviar') }}" method="POST" class="p-6" id="contactForm">
                    @csrf
                    
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                        <div>
                            <label class="block text-gray-700 text-sm font-semibold mb-2">Nombre completo *</label>
                            <input type="text" 
                                   name="nombre" 
                                   value="{{ old('nombre') }}"
                                   class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-orange-500 focus:ring-2 focus:ring-orange-200 transition-all @error('nombre') border-red-500 @enderror" 
                                   required>
                            @error('nombre')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                        <div>
                            <label class="block text-gray-700 text-sm font-semibold mb-2">Email *</label>
                            <input type="email" 
                                   name="email" 
                                   value="{{ old('email') }}"
                                   class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-orange-500 focus:ring-2 focus:ring-orange-200 transition-all @error('email') border-red-500 @enderror" 
                                   required>
                            @error('email')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                        <div>
                            <label class="block text-gray-700 text-sm font-semibold mb-2">Teléfono</label>
                            <input type="tel" 
                                   name="telefono" 
                                   value="{{ old('telefono') }}"
                                   class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-orange-500 focus:ring-2 focus:ring-orange-200 transition-all">
                        </div>
                        <div>
                            <label class="block text-gray-700 text-sm font-semibold mb-2">Asunto *</label>
                            <select name="asunto" 
                                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-orange-500 focus:ring-2 focus:ring-orange-200 transition-all @error('asunto') border-red-500 @enderror" 
                                    required>
                                <option value="">Selecciona un asunto</option>
                                <option value="consulta" {{ old('asunto') == 'consulta' ? 'selected' : '' }}>Consulta general</option>
                                <option value="cita" {{ old('asunto') == 'cita' ? 'selected' : '' }}>Agendar cita</option>
                                <option value="producto" {{ old('asunto') == 'producto' ? 'selected' : '' }}>Información de productos</option>
                                <option value="servicio" {{ old('asunto') == 'servicio' ? 'selected' : '' }}>Información de servicios</option>
                                <option value="queja" {{ old('asunto') == 'queja' ? 'selected' : '' }}>Sugerencia o queja</option>
                                <option value="otro" {{ old('asunto') == 'otro' ? 'selected' : '' }}>Otro</option>
                            </select>
                            @error('asunto')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    
                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-semibold mb-2">Mensaje *</label>
                        <textarea name="mensaje" 
                                  rows="5" 
                                  class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-orange-500 focus:ring-2 focus:ring-orange-200 transition-all @error('mensaje') border-red-500 @enderror" 
                                  required>{{ old('mensaje') }}</textarea>
                        @error('mensaje')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    
                    <div class="flex items-center mb-4">
                        <input type="checkbox" 
                               id="privacidad" 
                               name="privacidad" 
                               class="w-4 h-4 text-orange-500 border-gray-300 rounded focus:ring-orange-500" 
                               required>
                        <label for="privacidad" class="ml-2 text-sm text-gray-600">
                            He leído y acepto la <a href="#" class="text-orange-500 hover:underline">Política de Privacidad</a> *
                        </label>
                    </div>
                    
                    <button type="submit" 
                            id="submitBtn"
                            class="w-full bg-orange-500 text-white py-3 rounded-lg font-semibold hover:bg-orange-600 transition-all btn-effect flex items-center justify-center">
                        <i class="fas fa-paper-plane mr-2"></i>
                        Enviar mensaje
                    </button>
                </form>
            </div>
            
            <!-- Mapa y redes sociales -->
            <div class="space-y-6">
                <!-- Mapa -->
                <div class="bg-white rounded-2xl shadow-xl overflow-hidden">
                    <div class="bg-gradient-to-r from-orange-500 to-orange-600 px-6 py-4">
                        <h2 class="text-xl font-bold text-white">Ubicación</h2>
                        <p class="text-orange-100 text-sm">Encuéntranos fácilmente</p>
                    </div>
                    <div class="p-0">
                        <iframe 
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3762.712324193772!2d-99.133789!3d19.432608!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x85d1f92b3f4b5b5b%3A0x123456789abcdef!2sCentro%20Hist%C3%B3rico%2C%20Ciudad%20de%20M%C3%A9xico%2C%20CDMX!5e0!3m2!1ses!2smx!4v1700000000000!5m2!1ses!2smx" 
                            width="100%" 
                            height="300" 
                            style="border:0;" 
                            allowfullscreen="" 
                            loading="lazy" 
                            referrerpolicy="no-referrer-when-downgrade"
                            class="w-full">
                        </iframe>
                    </div>
                </div>
                
                <!-- Redes Sociales -->
                <div class="bg-white rounded-2xl shadow-xl p-6">
                    <h2 class="text-xl font-bold text-gray-800 mb-4">Síguenos en redes sociales</h2>
                    <p class="text-gray-600 text-sm mb-4">Mantente conectado con nosotros y conoce todas las novedades</p>
                    
                    <div class="grid grid-cols-2 gap-4">
                        <a href="#" class="flex items-center gap-3 p-3 bg-blue-50 rounded-xl hover:bg-blue-100 transition-all group">
                            <div class="w-10 h-10 bg-blue-500 rounded-full flex items-center justify-center">
                                <i class="fab fa-facebook-f text-white text-xl"></i>
                            </div>
                            <div>
                                <p class="font-semibold text-gray-800">Facebook</p>
                                <p class="text-xs text-gray-500">@minihuellitas</p>
                            </div>
                        </a>
                        <a href="#" class="flex items-center gap-3 p-3 bg-pink-50 rounded-xl hover:bg-pink-100 transition-all group">
                            <div class="w-10 h-10 bg-pink-500 rounded-full flex items-center justify-center">
                                <i class="fab fa-instagram text-white text-xl"></i>
                            </div>
                            <div>
                                <p class="font-semibold text-gray-800">Instagram</p>
                                <p class="text-xs text-gray-500">@minihuellitas</p>
                            </div>
                        </a>
                        <a href="#" class="flex items-center gap-3 p-3 bg-green-50 rounded-xl hover:bg-green-100 transition-all group">
                            <div class="w-10 h-10 bg-green-500 rounded-full flex items-center justify-center">
                                <i class="fab fa-whatsapp text-white text-xl"></i>
                            </div>
                            <div>
                                <p class="font-semibold text-gray-800">WhatsApp</p>
                                <p class="text-xs text-gray-500">+52 55 1234 5678</p>
                            </div>
                        </a>
                        <a href="#" class="flex items-center gap-3 p-3 bg-yellow-50 rounded-xl hover:bg-yellow-100 transition-all group">
                            <div class="w-10 h-10 bg-yellow-500 rounded-full flex items-center justify-center">
                                <i class="fab fa-tiktok text-white text-xl"></i>
                            </div>
                            <div>
                                <p class="font-semibold text-gray-800">TikTok</p>
                                <p class="text-xs text-gray-500">@minihuellitas</p>
                            </div>
                        </a>
                    </div>
                </div>
                
                <!-- Preguntas frecuentes rápidas -->
                <div class="bg-orange-50 rounded-2xl p-6 border border-orange-200">
                    <div class="flex items-center gap-3 mb-4">
                        <i class="fas fa-question-circle text-orange-500 text-2xl"></i>
                        <h3 class="text-lg font-bold text-gray-800">¿Necesitas ayuda rápida?</h3>
                    </div>
                    <div class="space-y-3">
                        <div class="flex items-start gap-2">
                            <i class="fas fa-check-circle text-green-500 text-sm mt-1"></i>
                            <p class="text-sm text-gray-600">¿Cómo agendar una cita? <a href="#" class="text-orange-500 font-semibold">Ver más</a></p>
                        </div>
                        <div class="flex items-start gap-2">
                            <i class="fas fa-check-circle text-green-500 text-sm mt-1"></i>
                            <p class="text-sm text-gray-600">¿Cuáles son los precios de los servicios? <a href="{{ route('servicios.index') }}" class="text-orange-500 font-semibold">Ver catálogo</a></p>
                        </div>
                        <div class="flex items-start gap-2">
                            <i class="fas fa-check-circle text-green-500 text-sm mt-1"></i>
                            <p class="text-sm text-gray-600">¿Realizan envíos a domicilio? <a href="#" class="text-orange-500 font-semibold">Más info</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- ==================== AVISO DE RESPUESTA ==================== -->
        <div class="mt-8 bg-blue-50 border-l-4 border-blue-500 rounded-lg p-4">
            <div class="flex items-center">
                <i class="fas fa-clock text-blue-500 text-xl mr-3"></i>
                <div>
                    <p class="text-blue-800 font-semibold">Tiempo de respuesta</p>
                    <p class="text-blue-600 text-sm">Nos comprometemos a responder tu mensaje en un plazo máximo de 24 horas hábiles.</p>
                </div>
            </div>
        </div>
        
    </div>
</div>

<script>
// Prevenir doble envío del formulario
document.getElementById('contactForm').addEventListener('submit', function(e) {
    const submitBtn = document.getElementById('submitBtn');
    if (submitBtn.disabled) {
        e.preventDefault();
        return false;
    }
    submitBtn.disabled = true;
    submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin mr-2"></i> Enviando...';
    return true;
});

// Mostrar mensajes de éxito/error
@if(session('success'))
    document.addEventListener('DOMContentLoaded', function() {
        const notification = document.createElement('div');
        notification.className = 'fixed bottom-4 right-4 bg-green-500 text-white px-6 py-3 rounded-lg shadow-lg z-50 animate-slide-up';
        notification.innerHTML = `
            <div class="flex items-center gap-3">
                <i class="fas fa-check-circle text-xl"></i>
                <p>{{ session('success') }}</p>
                <button onclick="this.parentElement.parentElement.remove()" class="ml-4 text-white hover:text-gray-200">
                    <i class="fas fa-times"></i>
                </button>
            </div>
        `;
        document.body.appendChild(notification);
        setTimeout(() => notification.remove(), 5000);
    });
@endif

@if($errors->any())
    document.addEventListener('DOMContentLoaded', function() {
        const notification = document.createElement('div');
        notification.className = 'fixed bottom-4 right-4 bg-red-500 text-white px-6 py-3 rounded-lg shadow-lg z-50 animate-slide-up';
        notification.innerHTML = `
            <div class="flex items-center gap-3">
                <i class="fas fa-exclamation-circle text-xl"></i>
                <p>Por favor corrige los errores en el formulario</p>
                <button onclick="this.parentElement.parentElement.remove()" class="ml-4 text-white hover:text-gray-200">
                    <i class="fas fa-times"></i>
                </button>
            </div>
        `;
        document.body.appendChild(notification);
        setTimeout(() => notification.remove(), 5000);
    });
@endif
</script>

<style>
.animate-slide-up {
    animation: slideUp 0.3s ease-out forwards;
}

@keyframes slideUp {
    from {
        opacity: 0;
        transform: translateY(20px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}
</style>
@endsection