@extends('layouts.app')

@section('content')
<!-- SECCIÓN HERO (Principal) -->
<section class="relative bg-gradient-to-br from-orange-50 via-cream to-white overflow-hidden py-20">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
            
            <!-- Lado izquierdo: Texto y botones -->
            <div class="text-center lg:text-left">
                <div class="inline-flex items-center space-x-2 bg-orange-100 text-orange-600 px-4 py-2 rounded-full mb-6">
                    <i class="fas fa-heart text-sm"></i>
                    <span class="text-sm font-semibold">Amor y cuidado profesional</span>
                </div>
                
                <h1 class="text-4xl md:text-5xl lg:text-6xl font-bold text-gray-800 mb-6">
                    <span class="text-orange-custom">Tu mejor amigo</span>
                    <br>
                    merece lo mejor
                </h1>
                
                <p class="text-xl text-gray-600 mb-8">
                    En MiniHuellitas cuidamos a tu mascota con el amor y la dedicación que se merece. 
                    Servicios profesionales y productos de calidad.
                </p>
                
            </div>
            
            <!-- Lado derecho: Imagen de mascota -->
            <div class="relative flex justify-center">
                <div class="relative flex justify-center items-center py-8">
                    <!-- Múltiples capas de glow para más profundidad -->
                    <div class="absolute w-80 h-80 bg-orange-300 blur-3xl opacity-20 rounded-full animate-pulse"></div>
                    <div class="absolute w-64 h-64 bg-orange-400 blur-2xl opacity-30 rounded-full"></div>
                    <div class="absolute w-48 h-48 bg-amber-400 blur-xl opacity-20 rounded-full"></div>

                    <!-- Imagen con efectos mejorados -->
                    <img src="https://guausedavi.es/wp-content/uploads/perro-feliz.png" 
                        alt="Perro feliz" 
                        class="relative w-full max-w-md mx-auto drop-shadow-2xl transform hover:scale-105 transition-all duration-500 ease-out"
                        style="filter: drop-shadow(0 20px 30px rgba(249, 115, 22, 0.3));">

                    <!-- Detalles decorativos sutiles -->
                    <div class="absolute -z-10 w-40 h-40 bg-gradient-to-br from-orange-200/20 to-transparent rounded-full -top-4 -right-4"></div>
                    <div class="absolute -z-10 w-32 h-32 bg-gradient-to-tl from-amber-200/20 to-transparent rounded-full -bottom-4 -left-4"></div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- SECCIÓN DE SERVICIOS DESTACADOS -->
<section class="py-20 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-12">
            <h2 class="text-3xl md:text-4xl font-bold text-gray-800 mb-4">
                Nuestros <span class="text-orange-custom">Servicios</span>
            </h2>
            <p class="text-gray-600 max-w-2xl mx-auto">
                Ofrecemos servicios profesionales para el cuidado de tu mascota
            </p>
        </div>
        
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
            @forelse($servicios as $servicio)
            <div class="group bg-white rounded-2xl shadow-lg hover:shadow-2xl transition-all duration-300 p-6 text-center transform hover:-translate-y-2">
                <div class="w-20 h-20 bg-orange-100 rounded-full flex items-center justify-center mx-auto mb-4 group-hover:bg-orange-custom transition-all">
                    <i class="fas fa-{{ $servicio->icono ?? 'paw' }} text-orange-custom text-2xl group-hover:text-white transition-all"></i>
                </div>
                <h3 class="text-xl font-bold text-gray-800 mb-2">{{ $servicio->nombre }}</h3>
                <p class="text-gray-600 mb-4 text-sm">{{ Str::limit($servicio->descripcion, 60) }}</p>
                <span class="text-2xl font-bold text-orange-custom">${{ number_format($servicio->precio, 2) }}</span>
            </div>
            @empty
            <div class="group bg-white rounded-2xl shadow-lg hover:shadow-2xl transition-all duration-300 p-6 text-center">
                <div class="w-20 h-20 bg-orange-100 rounded-full flex items-center justify-center mx-auto mb-4">
                    <i class="fas fa-bath text-orange-custom text-2xl"></i>
                </div>
                <h3 class="text-xl font-bold text-gray-800 mb-2">Baño Completo</h3>
                <p class="text-gray-600 mb-4">Baño con shampoo especializado</p>
                <span class="text-2xl font-bold text-orange-custom">$350</span>
            </div>
            
            <div class="group bg-white rounded-2xl shadow-lg hover:shadow-2xl transition-all duration-300 p-6 text-center">
                <div class="w-20 h-20 bg-orange-100 rounded-full flex items-center justify-center mx-auto mb-4">
                    <i class="fas fa-cut text-orange-custom text-2xl"></i>
                </div>
                <h3 class="text-xl font-bold text-gray-800 mb-2">Corte de Pelo</h3>
                <p class="text-gray-600 mb-4">Corte profesional</p>
                <span class="text-2xl font-bold text-orange-custom">$450</span>
            </div>
            
            <div class="group bg-white rounded-2xl shadow-lg hover:shadow-2xl transition-all duration-300 p-6 text-center">
                <div class="w-20 h-20 bg-orange-100 rounded-full flex items-center justify-center mx-auto mb-4">
                    <i class="fas fa-spa text-orange-custom text-2xl"></i>
                </div>
                <h3 class="text-xl font-bold text-gray-800 mb-2">Spa Premium</h3>
                <p class="text-gray-600 mb-4">Experiencia completa</p>
                <span class="text-2xl font-bold text-orange-custom">$800</span>
            </div>
            
            <div class="group bg-white rounded-2xl shadow-lg hover:shadow-2xl transition-all duration-300 p-6 text-center">
                <div class="w-20 h-20 bg-orange-100 rounded-full flex items-center justify-center mx-auto mb-4">
                    <i class="fas fa-hand-peace text-orange-custom text-2xl"></i>
                </div>
                <h3 class="text-xl font-bold text-gray-800 mb-2">Corte de Uñas</h3>
                <p class="text-gray-600 mb-4">Corte profesional</p>
                <span class="text-2xl font-bold text-orange-custom">$150</span>
            </div>
            @endforelse
        </div>
        
        <div class="text-center mt-12">
            <a href="{{ route('servicios.index') }}" 
               class="inline-flex items-center bg-orange-custom text-white px-8 py-3 rounded-full font-semibold hover:bg-orange-600 transition-all btn-effect">
                Ver todos los servicios
                <i class="fas fa-arrow-right ml-2"></i>
            </a>
        </div>
    </div>
</section>

<!-- SECCIÓN DE PRODUCTOS DESTACADOS -->
<section class="py-20 bg-cream">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-12">
            <h2 class="text-3xl md:text-4xl font-bold text-gray-800 mb-4">
                Productos <span class="text-orange-custom">Destacados</span>
            </h2>
            <p class="text-gray-600 max-w-2xl mx-auto">
                Los mejores productos para tu mascota, disponibles solo en Tienda fisica
            </p>
        </div>
        
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
            @forelse($productos as $producto)
            <div class="group bg-white rounded-2xl shadow-lg overflow-hidden hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-2">
                <div class="h-48 overflow-hidden">
                    @if($producto->imagen)
                        <img src="{{ $producto->imagen }}" 
                             alt="{{ $producto->nombre }}"
                             class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                    @else
                        <div class="w-full h-full bg-orange-100 flex items-center justify-center">
                            <i class="fas fa-dog text-6xl text-orange-300"></i>
                        </div>
                    @endif
                </div>
                <div class="p-4">
                    <h3 class="text-lg font-bold text-gray-800 mb-2">{{ $producto->nombre }}</h3>
                    <p class="text-gray-600 text-sm mb-3">{{ Str::limit($producto->descripcion, 50) }}</p>
                    <div class="flex items-center justify-between">
                        <span class="text-2xl font-bold text-orange-custom">${{ number_format($producto->precio, 2) }}</span>
                        <span class="bg-green-100 text-green-700 px-3 py-1 rounded-full text-xs font-semibold">
                            <i class="fas fa-store mr-1"></i> Disponible en tienda
                        </span>
                    </div>
                </div>
            </div>
            @empty
            <div class="bg-white rounded-2xl shadow-lg overflow-hidden">
                <div class="h-48 bg-orange-100 flex items-center justify-center">
                    <i class="fas fa-dog text-6xl text-orange-300"></i>
                </div>
                <div class="p-4">
                    <h3 class="text-lg font-bold text-gray-800">Shampoo Hipoalergénico</h3>
                    <p class="text-gray-600 text-sm mb-3">Para pieles sensibles</p>
                    <div class="flex justify-between items-center">
                        <span class="text-2xl font-bold text-orange-custom">$180</span>
                        <span class="bg-green-100 text-green-700 px-3 py-1 rounded-full text-xs font-semibold">
                            <i class="fas fa-store mr-1"></i> Disponible en tienda
                        </span>
                    </div>
                </div>
            </div>

            <div class="bg-white rounded-2xl shadow-lg overflow-hidden">
                <div class="h-48 bg-orange-100 flex items-center justify-center">
                    <i class="fas fa-brush text-6xl text-orange-300"></i>
                </div>
                <div class="p-4">
                    <h3 class="text-lg font-bold text-gray-800">Cepillo Deslanador</h3>
                    <p class="text-gray-600 text-sm mb-3">Elimina pelo muerto</p>
                    <div class="flex justify-between items-center">
                        <span class="text-2xl font-bold text-orange-custom">$250</span>
                        <span class="bg-green-100 text-green-700 px-3 py-1 rounded-full text-xs font-semibold">
                            <i class="fas fa-store mr-1"></i> Disponible en tienda
                        </span>
                    </div>
                </div>
            </div>
            @endforelse
        </div>
        
        <div class="text-center mt-12">
            <a href="{{ route('productos.index') }}" 
               class="inline-flex items-center bg-orange-custom text-white px-8 py-3 rounded-full font-semibold hover:bg-orange-600 transition-all btn-effect">
                Ver todos los productos
                <i class="fas fa-arrow-right ml-2"></i>
            </a>
        </div>
    </div>
</section>

<!-- SECCIÓN POR QUÉ ELEGIRNOS -->
<section class="py-20 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-12">
            <h2 class="text-3xl md:text-4xl font-bold text-gray-800 mb-4">
                ¿Por qué <span class="text-orange-custom">elegirnos</span>?
            </h2>
        </div>
        
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <div class="text-center group">
                <div class="w-20 h-20 bg-orange-100 rounded-full flex items-center justify-center mx-auto mb-4 group-hover:bg-orange-custom transition-all duration-300">
                    <i class="fas fa-heart text-orange-custom text-3xl group-hover:text-white transition-all"></i>
                </div>
                <h3 class="text-xl font-bold text-gray-800 mb-2">Amor y Dedicación</h3>
                <p class="text-gray-600">Tratamos a cada mascota con el cariño que merece</p>
            </div>
            
            <div class="text-center group">
                <div class="w-20 h-20 bg-orange-100 rounded-full flex items-center justify-center mx-auto mb-4 group-hover:bg-orange-custom transition-all duration-300">
                    <i class="fas fa-certificate text-orange-custom text-3xl group-hover:text-white transition-all"></i>
                </div>
                <h3 class="text-xl font-bold text-gray-800 mb-2">Profesionales</h3>
                <p class="text-gray-600">Personal capacitado y con experiencia</p>
            </div>
            
            <div class="text-center group">
                <div class="w-20 h-20 bg-orange-100 rounded-full flex items-center justify-center mx-auto mb-4 group-hover:bg-orange-custom transition-all duration-300">
                    <i class="fas fa-shield-alt text-orange-custom text-3xl group-hover:text-white transition-all"></i>
                </div>
                <h3 class="text-xl font-bold text-gray-800 mb-2">Productos de Calidad</h3>
                <p class="text-gray-600">Usamos productos premium y seguros</p>
            </div>
        </div>
    </div>
</section>

<!-- SECCIÓN DE MARCAS CON LAS QUE TRABAJAMOS -->
<section class="py-16 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-12">
            <div class="inline-flex items-center bg-orange-100 text-orange-600 px-4 py-2 rounded-full mb-4">
                <i class="fas fa-handshake mr-2"></i>
                <span class="font-semibold">Nuestros Aliados</span>
            </div>
            <h2 class="text-3xl md:text-4xl font-bold text-gray-800 mb-3">
                Marcas que <span class="text-orange-500">confían en nosotros</span>
            </h2>
            <p class="text-gray-600 max-w-2xl mx-auto">
                Trabajamos con las mejores marcas para garantizar la calidad y bienestar de tu mascota
            </p>
        </div>
        
        <div class="relative overflow-hidden py-4">
            <div class="flex animate-marquee whitespace-nowrap">
                <!-- Royal Canin -->
                <div class="flex flex-col items-center mx-6 group cursor-pointer">
                    <div class="w-24 h-24 bg-white rounded-2xl shadow-lg flex items-center justify-center group-hover:shadow-xl transition-all group-hover:scale-110 duration-300 p-2">
                        <img src="https://www.forrajeralanacional.com/cdn/shop/files/PAGINAWEB_c73fa112-f02b-4c5c-b644-5c96be657744.png?v=1773766329" alt="Royal Canin" class="w-16 h-16 object-contain">
                    </div>
                    <span class="mt-2 text-xs font-semibold text-gray-600">Royal Canin</span>
                </div>
                
                <!-- Purina -->
                <div class="flex flex-col items-center mx-6 group cursor-pointer">
                    <div class="w-24 h-24 bg-white rounded-2xl shadow-lg flex items-center justify-center group-hover:shadow-xl transition-all group-hover:scale-110 duration-300 p-2">
                        <img src="https://purina.com.mx/sites/default/files/2023-09/Empaque_Seleccio%CC%81n_de_proteina_Diversity.png" alt="Purina" class="w-16 h-16 object-contain">
                    </div>
                    <span class="mt-2 text-xs font-semibold text-gray-600">Purina</span>
                </div>
                
                <!-- Hill's -->
                <div class="flex flex-col items-center mx-6 group cursor-pointer">
                    <div class="w-24 h-24 bg-white rounded-2xl shadow-lg flex items-center justify-center group-hover:shadow-xl transition-all group-hover:scale-110 duration-300 p-2">
                        <img src="https://casaluna.com.mx/cdn/shop/products/10450.png?v=1752003109" alt="Hill's" class="w-16 h-16 object-contain">
                    </div>
                    <span class="mt-2 text-xs font-semibold text-gray-600">Hill's</span>
                </div>
                
                <!-- Pedigree -->
                <div class="flex flex-col items-center mx-6 group cursor-pointer">
                    <div class="w-24 h-24 bg-white rounded-2xl shadow-lg flex items-center justify-center group-hover:shadow-xl transition-all group-hover:scale-110 duration-300 p-2">
                        <img src="https://hebmx.vtexassets.com/arquivos/ids/838965-800-800?v=638428396808600000&width=800&height=800&aspect=true" alt="Pedigree" class="w-16 h-16 object-contain">
                    </div>
                    <span class="mt-2 text-xs font-semibold text-gray-600">Pedigree</span>
                </div>
                
                <!-- Eukanuba -->
                <div class="flex flex-col items-center mx-6 group cursor-pointer">
                    <div class="w-24 h-24 bg-white rounded-2xl shadow-lg flex items-center justify-center group-hover:shadow-xl transition-all group-hover:scale-110 duration-300 p-2">
                        <img src="https://estacionmascota.com/58-medium_default/eukanuba-cachorros-razas-medianas.jpg" alt="Eukanuba" class="w-16 h-16 object-contain">
                    </div>
                    <span class="mt-2 text-xs font-semibold text-gray-600">Eukanuba</span>
                </div>
                
                <!-- FURminator -->
                <div class="flex flex-col items-center mx-6 group cursor-pointer">
                    <div class="w-24 h-24 bg-white rounded-2xl shadow-lg flex items-center justify-center group-hover:shadow-xl transition-all group-hover:scale-110 duration-300 p-2">
                        <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcST8r6okZe4CwmYmTKJSXKu3TlcHbqB7D28gw&s" alt="FURminator" class="w-16 h-16 object-contain">
                    </div>
                    <span class="mt-2 text-xs font-semibold text-gray-600">FURminator</span>
                </div>
                
                <!-- Frontline -->
                <div class="flex flex-col items-center mx-6 group cursor-pointer">
                    <div class="w-24 h-24 bg-white rounded-2xl shadow-lg flex items-center justify-center group-hover:shadow-xl transition-all group-hover:scale-110 duration-300 p-2">
                        <img src="https://estacionmascota.com/3299-medium_default/frontline-plus-gatos.jpg" alt="Frontline" class="w-16 h-16 object-contain">
                    </div>
                    <span class="mt-2 text-xs font-semibold text-gray-600">Frontline</span>
                </div>
                
                <!-- KONG -->
                <div class="flex flex-col items-center mx-6 group cursor-pointer">
                    <div class="w-24 h-24 bg-white rounded-2xl shadow-lg flex items-center justify-center group-hover:shadow-xl transition-all group-hover:scale-110 duration-300 p-2">
                        <img src="https://casaluna.com.mx/cdn/shop/products/ID_2317_COD_KOT2_035585111216_JUGUETEPERROKONGCLASICOMEDIANO.png?v=1752002685" alt="KONG" class="w-16 h-16 object-contain">
                    </div>
                    <span class="mt-2 text-xs font-semibold text-gray-600">KONG</span>
                </div>
                
                <!-- Nylabone -->
                <div class="flex flex-col items-center mx-6 group cursor-pointer">
                    <div class="w-24 h-24 bg-white rounded-2xl shadow-lg flex items-center justify-center group-hover:shadow-xl transition-all group-hover:scale-110 duration-300 p-2">
                        <img src="https://www.petconnect.nz/cdn/shop/products/reclipped_for_tradevine__S0223P094954_900x.png?v=1575408287" alt="Nylabone" class="w-16 h-16 object-contain">
                    </div>
                    <span class="mt-2 text-xs font-semibold text-gray-600">Nylabone</span>
                </div>
                
                <!-- PetSafe -->
                <div class="flex flex-col items-center mx-6 group cursor-pointer">
                    <div class="w-24 h-24 bg-white rounded-2xl shadow-lg flex items-center justify-center group-hover:shadow-xl transition-all group-hover:scale-110 duration-300 p-2">
                        <img src="https://m.media-amazon.com/images/I/71k+5+yMawL._AC_UF1000,1000_QL80_.jpg" alt="PetSafe" class="w-16 h-16 object-contain">
                    </div>
                    <span class="mt-2 text-xs font-semibold text-gray-600">PetSafe</span>
                </div>
                
                <!-- Duplicado para efecto infinito -->
                <div class="flex flex-col items-center mx-6 group cursor-pointer">
                    <div class="w-24 h-24 bg-white rounded-2xl shadow-lg flex items-center justify-center group-hover:shadow-xl transition-all group-hover:scale-110 duration-300 p-2">
                        <img src="https://www.mascotasyaccesorios.mx/cdn/shop/products/small-puppy_1_800x.png?v=1562195659" alt="Royal Canin" class="w-16 h-16 object-contain">
                    </div>
                    <span class="mt-2 text-xs font-semibold text-gray-600">Royal Canin</span>
                </div>
            </div>
        </div>
        
        <div class="text-center mt-8">
            <p class="text-gray-500 text-sm">
                <i class="fas fa-store text-orange-500 mr-1"></i>
                Productos disponibles en nuestra tienda física
            </p>
        </div>
    </div>
</section>

<style>
@keyframes marquee {
    0% { transform: translateX(0); }
    100% { transform: translateX(-50%); }
}
.animate-marquee {
    animation: marquee 25s linear infinite;
}
.animate-marquee:hover {
    animation-play-state: paused;
}
</style>

<!-- SECCIÓN LLAMADA A LA ACCIÓN -->
<section class="py-20 bg-gradient-to-r from-orange-custom to-orange-600">
    <div class="max-w-7xl mx-auto px-4 text-center">
        <h2 class="text-3xl md:text-4xl font-bold text-white mb-4">
            ¿Listo para consentir a tu mascota?
        </h2>
        <p class="text-orange-100 text-xl mb-8">
            Agenda una cita hoy mismo
        </p>
        <a href="{{ route('register') }}" 
           class="inline-flex items-center bg-white text-orange-custom px-8 py-4 rounded-full font-bold text-lg hover:bg-orange-50 transition-all btn-effect shadow-xl">
            <i class="fas fa-calendar-alt mr-2"></i>
            Agendar Cita
        </a>
    </div>
</section>

@endsection