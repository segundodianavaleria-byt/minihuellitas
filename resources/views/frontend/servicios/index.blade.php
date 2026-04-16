@extends('layouts.app')

@section('title', ' - Servicios')

@section('content')
<div class="bg-cream">
    <!-- Hero de Servicios -->
    <div class="bg-gradient-to-r from-orange-500 to-orange-600 text-white py-16">
        <div class="max-w-7xl mx-auto px-4 text-center">
            <h1 class="text-4xl md:text-5xl font-bold mb-4">Nuestros Servicios</h1>
            <p class="text-xl text-orange-100 max-w-2xl mx-auto">
                Cuidamos a tu mascota con servicios profesionales y personalizados
            </p>
        </div>
    </div>

    <div class="max-w-7xl mx-auto px-4 py-12">
        
        <!-- ==================== FILTROS DE BÚSQUEDA ==================== -->
        <div class="mb-8 bg-white rounded-xl shadow-md p-4">
            <div class="flex flex-wrap gap-4 items-center justify-between">
                <div class="flex-1 min-w-[200px]">
                    <div class="relative">
                        <i class="fas fa-search absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-400"></i>
                        <input type="text" 
                               id="searchInput" 
                               placeholder="Buscar servicios..." 
                               class="w-full pl-10 pr-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-orange-500">
                    </div>
                </div>
                <div class="flex gap-2 flex-wrap">
                    <button class="filter-btn active px-4 py-2 rounded-full text-sm font-medium transition-all" data-filter="all">
                        Todos
                    </button>
                    <button class="filter-btn px-4 py-2 rounded-full text-sm font-medium transition-all" data-filter="paquetes">
                        🎁 Paquetes
                    </button>
                    <button class="filter-btn px-4 py-2 rounded-full text-sm font-medium transition-all" data-filter="corte">
                        ✂️ Cortes
                    </button>
                    <button class="filter-btn px-4 py-2 rounded-full text-sm font-medium transition-all" data-filter="baño">
                        🛁 Baños
                    </button>
                    <button class="filter-btn px-4 py-2 rounded-full text-sm font-medium transition-all" data-filter="spa">
                        💆 Spa
                    </button>
                    <button class="filter-btn px-4 py-2 rounded-full text-sm font-medium transition-all" data-filter="salud">
                        🏥 Salud
                    </button>
                    <button class="filter-btn px-4 py-2 rounded-full text-sm font-medium transition-all" data-filter="urgencia">
                        🚨 Urgencias
                    </button>
                    <button class="filter-btn px-4 py-2 rounded-full text-sm font-medium transition-all" data-filter="entrenamiento">
                        🎓 Entrenamiento
                    </button>
                </div>
            </div>
        </div>
        
        <!-- ==================== SECCIÓN DE PAQUETES ESPECIALES ==================== -->
        @if(count($paquetes) > 0)
        <div class="mb-16 category-section" data-category="paquetes">
            <div class="text-center mb-10">
                <div class="inline-flex items-center bg-orange-100 text-orange-600 px-4 py-2 rounded-full mb-4">
                    <i class="fas fa-gift mr-2"></i>
                    <span class="font-semibold">Ofertas Especiales</span>
                </div>
                <h2 class="text-3xl md:text-4xl font-bold text-gray-800 mb-3">
                    Paquetes <span class="text-orange-500">Especiales</span>
                </h2>
                <p class="text-gray-600 max-w-2xl mx-auto">
                    Combina varios servicios y obtén descuentos increíbles
                </p>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                @foreach($paquetes as $paquete)
                @php
                    // Decodificar servicios incluidos si es JSON string
                    $serviciosIncluidos = is_string($paquete->servicios_incluidos) 
                        ? json_decode($paquete->servicios_incluidos, true) 
                        : $paquete->servicios_incluidos;
                    
                    $precioNormal = 0;
                    if($serviciosIncluidos && is_array($serviciosIncluidos)) {
                        foreach($serviciosIncluidos as $incluido) {
                            $serv = \App\Models\Servicio::where('nombre', $incluido)->first();
                            if($serv) $precioNormal += $serv->precio;
                        }
                    }
                    $descuento = $precioNormal > 0 ? round((1 - ($paquete->precio / $precioNormal)) * 100) : 0;
                @endphp
                <div class="service-card group relative bg-white rounded-2xl shadow-lg hover:shadow-2xl transition-all duration-300 overflow-hidden" 
                     data-name="{{ strtolower($paquete->nombre) }}">
                    <div class="absolute top-0 right-0 bg-gradient-to-l from-orange-500 to-orange-600 text-white px-4 py-1 rounded-bl-2xl text-sm font-bold">
                        -{{ $descuento }}%
                    </div>
                    
                    <div class="p-6">
                        <div class="w-16 h-16 bg-orange-100 rounded-full flex items-center justify-center mb-4 group-hover:bg-orange-500 transition-all duration-300">
                            <i class="fas fa-{{ $paquete->icono }} text-orange-500 text-2xl group-hover:text-white transition-all"></i>
                        </div>
                        <h3 class="text-xl font-bold text-gray-800 mb-2">{{ $paquete->nombre }}</h3>
                        <p class="text-gray-600 text-sm mb-4">{{ $paquete->descripcion }}</p>
                        
                        <!-- Servicios incluidos -->
                        @if($serviciosIncluidos && is_array($serviciosIncluidos))
                        <div class="mb-4">
                            <p class="text-xs text-gray-500 mb-2">Incluye:</p>
                            <ul class="space-y-1">
                                @foreach($serviciosIncluidos as $incluido)
                                <li class="text-xs text-gray-600 flex items-center">
                                    <i class="fas fa-check-circle text-green-500 mr-1 text-xs"></i>
                                    {{ $incluido }}
                                </li>
                                @endforeach
                            </ul>
                        </div>
                        @endif
                        
                        <div class="flex items-center justify-between mt-4 pt-3 border-t">
                            <div>
                                @if($precioNormal > 0)
                                <span class="text-sm text-gray-500 line-through">${{ number_format($precioNormal, 2) }}</span>
                                @endif
                                <span class="text-2xl font-bold text-orange-500 ml-2">${{ number_format($paquete->precio, 2) }}</span>
                            </div>
                            <a href="{{ route('citas.create', ['servicio' => $paquete->id]) }}" 
                               class="bg-orange-500 text-white px-4 py-2 rounded-full text-sm hover:bg-orange-600 transition-all btn-effect">
                                Reservar
                            </a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
        @endif
        
        <!-- ==================== SECCIÓN DE CORTES ==================== -->
        @if(count($cortes) > 0)
        <div class="mb-16 category-section" data-category="corte">
            <div class="flex items-center justify-between mb-8">
                <div>
                    <div class="inline-flex items-center bg-orange-100 text-orange-600 px-4 py-2 rounded-full mb-2">
                        <i class="fas fa-cut mr-2"></i>
                        <span class="font-semibold">Estilismo Canino</span>
                    </div>
                    <h2 class="text-3xl font-bold text-gray-800">Cortes y Estilos</h2>
                    <p class="text-gray-600">Dale a tu mascota el look que merece</p>
                </div>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                @foreach($cortes as $servicio)
                <div class="service-card bg-white rounded-2xl shadow-lg hover:shadow-xl transition-all duration-300 overflow-hidden group" data-name="{{ strtolower($servicio->nombre) }}">
                    <div class="relative h-48 overflow-hidden">
                        @if($servicio->imagen)
                            <img src="{{ $servicio->imagen }}" 
                                 alt="{{ $servicio->nombre }}"
                                 class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                        @else
                            <div class="w-full h-full bg-gradient-to-br from-orange-100 to-orange-200 flex items-center justify-center">
                                <i class="fas fa-{{ $servicio->icono }} text-5xl text-orange-400"></i>
                            </div>
                        @endif
                    </div>
                    <div class="p-6">
                        <h3 class="text-lg font-bold text-gray-800 mb-2">{{ $servicio->nombre }}</h3>
                        <p class="text-gray-600 text-sm mb-4">{{ Str::limit($servicio->descripcion, 100) }}</p>
                        <div class="flex items-center justify-between">
                            <div>
                                <span class="text-2xl font-bold text-orange-500">${{ number_format($servicio->precio, 2) }}</span>
                                <span class="text-xs text-gray-500 ml-1">/ {{ $servicio->duracion_minutos }} min</span>
                            </div>
                            <a href="{{ route('citas.create', ['servicio' => $servicio->id]) }}" 
                               class="bg-orange-500 text-white px-4 py-2 rounded-full text-sm hover:bg-orange-600 transition-all btn-effect">
                                Reservar
                            </a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
        @endif
        
        <!-- ==================== SECCIÓN DE BAÑOS ==================== -->
        @if(count($banos) > 0)
        <div class="mb-16 category-section" data-category="baño">
            <div class="flex items-center justify-between mb-8">
                <div>
                    <div class="inline-flex items-center bg-orange-100 text-orange-600 px-4 py-2 rounded-full mb-2">
                        <i class="fas fa-bath mr-2"></i>
                        <span class="font-semibold">Higiene y Limpieza</span>
                    </div>
                    <h2 class="text-3xl font-bold text-gray-800">Baños y Tratamientos</h2>
                    <p class="text-gray-600">Mantén a tu mascota limpia y saludable</p>
                </div>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                @foreach($banos as $servicio)
                <div class="service-card bg-white rounded-2xl shadow-lg hover:shadow-xl transition-all duration-300 overflow-hidden group" data-name="{{ strtolower($servicio->nombre) }}">
                    <div class="relative h-48 overflow-hidden">
                        @if($servicio->imagen)
                            <img src="{{ $servicio->imagen }}" 
                                 alt="{{ $servicio->nombre }}"
                                 class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                        @else
                            <div class="w-full h-full bg-gradient-to-br from-blue-100 to-blue-200 flex items-center justify-center">
                                <i class="fas fa-{{ $servicio->icono }} text-5xl text-blue-400"></i>
                            </div>
                        @endif
                    </div>
                    <div class="p-6">
                        <h3 class="text-lg font-bold text-gray-800 mb-2">{{ $servicio->nombre }}</h3>
                        <p class="text-gray-600 text-sm mb-4">{{ Str::limit($servicio->descripcion, 100) }}</p>
                        <div class="flex items-center justify-between">
                            <div>
                                <span class="text-2xl font-bold text-orange-500">${{ number_format($servicio->precio, 2) }}</span>
                                <span class="text-xs text-gray-500 ml-1">/ {{ $servicio->duracion_minutos }} min</span>
                            </div>
                            <a href="{{ route('citas.create', ['servicio' => $servicio->id]) }}" 
                               class="bg-orange-500 text-white px-4 py-2 rounded-full text-sm hover:bg-orange-600 transition-all btn-effect">
                                Reservar
                            </a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
        @endif
        
        <!-- ==================== SECCIÓN DE SPA ==================== -->
        @if(count($spas) > 0)
        <div class="mb-16 category-section" data-category="spa">
            <div class="flex items-center justify-between mb-8">
                <div>
                    <div class="inline-flex items-center bg-orange-100 text-orange-600 px-4 py-2 rounded-full mb-2">
                        <i class="fas fa-spa mr-2"></i>
                        <span class="font-semibold">Bienestar Animal</span>
                    </div>
                    <h2 class="text-3xl font-bold text-gray-800">Spa y Relajación</h2>
                    <p class="text-gray-600">Mimos y cuidados especiales para consentir a tu mascota</p>
                </div>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                @foreach($spas as $servicio)
                <div class="service-card bg-white rounded-2xl shadow-lg hover:shadow-xl transition-all duration-300 overflow-hidden group" data-name="{{ strtolower($servicio->nombre) }}">
                    <div class="relative h-48 overflow-hidden">
                        @if($servicio->imagen)
                            <img src="{{ $servicio->imagen }}" 
                                 alt="{{ $servicio->nombre }}"
                                 class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                        @else
                            <div class="w-full h-full bg-gradient-to-br from-purple-100 to-purple-200 flex items-center justify-center">
                                <i class="fas fa-{{ $servicio->icono }} text-5xl text-purple-400"></i>
                            </div>
                        @endif
                    </div>
                    <div class="p-6">
                        <h3 class="text-lg font-bold text-gray-800 mb-2">{{ $servicio->nombre }}</h3>
                        <p class="text-gray-600 text-sm mb-4">{{ Str::limit($servicio->descripcion, 100) }}</p>
                        <div class="flex items-center justify-between">
                            <div>
                                <span class="text-2xl font-bold text-orange-500">${{ number_format($servicio->precio, 2) }}</span>
                                <span class="text-xs text-gray-500 ml-1">/ {{ $servicio->duracion_minutos }} min</span>
                            </div>
                            <a href="{{ route('citas.create', ['servicio' => $servicio->id]) }}" 
                               class="bg-orange-500 text-white px-4 py-2 rounded-full text-sm hover:bg-orange-600 transition-all btn-effect">
                                Reservar
                            </a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
        @endif
        
        <!-- ==================== SECCIÓN DE SALUD ==================== -->
        @if(count($salud) > 0)
        <div class="mb-16 category-section" data-category="salud">
            <div class="flex items-center justify-between mb-8">
                <div>
                    <div class="inline-flex items-center bg-orange-100 text-orange-600 px-4 py-2 rounded-full mb-2">
                        <i class="fas fa-heartbeat mr-2"></i>
                        <span class="font-semibold">Cuidado Integral</span>
                    </div>
                    <h2 class="text-3xl font-bold text-gray-800">Salud y Prevención</h2>
                    <p class="text-gray-600">Servicios para mantener a tu mascota sana y feliz</p>
                </div>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                @foreach($salud as $servicio)
                <div class="service-card bg-white rounded-2xl shadow-lg hover:shadow-xl transition-all duration-300 overflow-hidden group" data-name="{{ strtolower($servicio->nombre) }}">
                    <div class="relative h-48 overflow-hidden">
                        @if($servicio->imagen)
                            <img src="{{ $servicio->imagen }}" 
                                 alt="{{ $servicio->nombre }}"
                                 class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                        @else
                            <div class="w-full h-full bg-gradient-to-br from-green-100 to-green-200 flex items-center justify-center">
                                <i class="fas fa-{{ $servicio->icono }} text-5xl text-green-400"></i>
                            </div>
                        @endif
                    </div>
                    <div class="p-6">
                        <h3 class="text-lg font-bold text-gray-800 mb-2">{{ $servicio->nombre }}</h3>
                        <p class="text-gray-600 text-sm mb-4">{{ Str::limit($servicio->descripcion, 100) }}</p>
                        <div class="flex items-center justify-between">
                            <div>
                                <span class="text-2xl font-bold text-orange-500">${{ number_format($servicio->precio, 2) }}</span>
                                <span class="text-xs text-gray-500 ml-1">/ {{ $servicio->duracion_minutos }} min</span>
                            </div>
                            <a href="{{ route('citas.create', ['servicio' => $servicio->id]) }}" 
                               class="bg-orange-500 text-white px-4 py-2 rounded-full text-sm hover:bg-orange-600 transition-all btn-effect">
                                Reservar
                            </a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
        @endif
        
        <!-- ==================== SECCIÓN DE URGENCIAS ==================== -->
        @if(isset($urgencias) && count($urgencias) > 0)
        <div class="mb-16 category-section" data-category="urgencia">
            <div class="flex items-center justify-between mb-8">
                <div>
                    <div class="inline-flex items-center bg-red-100 text-red-600 px-4 py-2 rounded-full mb-2">
                        <i class="fas fa-ambulance mr-2"></i>
                        <span class="font-semibold">Atención Inmediata</span>
                    </div>
                    <h2 class="text-3xl font-bold text-gray-800">Urgencias 24/7</h2>
                    <p class="text-gray-600">Atención rápida para emergencias caninas</p>
                </div>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                @foreach($urgencias as $servicio)
                <div class="service-card bg-white rounded-2xl shadow-lg hover:shadow-xl transition-all duration-300 overflow-hidden group" data-name="{{ strtolower($servicio->nombre) }}">
                    <div class="relative h-48 overflow-hidden">
                        @if($servicio->imagen)
                            <img src="{{ $servicio->imagen }}" 
                                 alt="{{ $servicio->nombre }}"
                                 class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                        @else
                            <div class="w-full h-full bg-gradient-to-br from-red-100 to-red-200 flex items-center justify-center">
                                <i class="fas fa-{{ $servicio->icono }} text-5xl text-red-400"></i>
                            </div>
                        @endif
                    </div>
                    <div class="p-6">
                        <h3 class="text-lg font-bold text-gray-800 mb-2">{{ $servicio->nombre }}</h3>
                        <p class="text-gray-600 text-sm mb-4">{{ Str::limit($servicio->descripcion, 100) }}</p>
                        <div class="flex items-center justify-between">
                            <div>
                                <span class="text-2xl font-bold text-orange-500">${{ number_format($servicio->precio, 2) }}</span>
                                <span class="text-xs text-gray-500 ml-1">/ {{ $servicio->duracion_minutos }} min</span>
                            </div>
                            <a href="{{ route('citas.create', ['servicio' => $servicio->id]) }}" 
                               class="bg-red-500 text-white px-4 py-2 rounded-full text-sm hover:bg-red-600 transition-all btn-effect">
                                Emergencia
                            </a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
        @endif
        
        <!-- ==================== SECCIÓN DE ENTRENAMIENTO ==================== -->
        @if(isset($entrenamiento) && count($entrenamiento) > 0)
        <div class="mb-16 category-section" data-category="entrenamiento">
            <div class="flex items-center justify-between mb-8">
                <div>
                    <div class="inline-flex items-center bg-indigo-100 text-indigo-600 px-4 py-2 rounded-full mb-2">
                        <i class="fas fa-graduation-cap mr-2"></i>
                        <span class="font-semibold">Educación Canina</span>
                    </div>
                    <h2 class="text-3xl font-bold text-gray-800">Entrenamiento y Adiestramiento</h2>
                    <p class="text-gray-600">Mejora el comportamiento y habilidades de tu mascota</p>
                </div>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                @foreach($entrenamiento as $servicio)
                <div class="service-card bg-white rounded-2xl shadow-lg hover:shadow-xl transition-all duration-300 overflow-hidden group" data-name="{{ strtolower($servicio->nombre) }}">
                    <div class="relative h-48 overflow-hidden">
                        @if($servicio->imagen)
                            <img src="{{ $servicio->imagen }}" 
                                 alt="{{ $servicio->nombre }}"
                                 class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                        @else
                            <div class="w-full h-full bg-gradient-to-br from-indigo-100 to-indigo-200 flex items-center justify-center">
                                <i class="fas fa-{{ $servicio->icono }} text-5xl text-indigo-400"></i>
                            </div>
                        @endif
                    </div>
                    <div class="p-6">
                        <h3 class="text-lg font-bold text-gray-800 mb-2">{{ $servicio->nombre }}</h3>
                        <p class="text-gray-600 text-sm mb-4">{{ Str::limit($servicio->descripcion, 100) }}</p>
                        <div class="flex items-center justify-between">
                            <div>
                                <span class="text-2xl font-bold text-orange-500">${{ number_format($servicio->precio, 2) }}</span>
                                <span class="text-xs text-gray-500 ml-1">/ {{ $servicio->duracion_minutos }} min</span>
                            </div>
                            <a href="{{ route('citas.create', ['servicio' => $servicio->id]) }}" 
                               class="bg-indigo-500 text-white px-4 py-2 rounded-full text-sm hover:bg-indigo-600 transition-all btn-effect">
                                Reservar
                            </a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
        @endif
        
    </div>
</div>

<!-- JavaScript para filtros y búsqueda -->
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Filtros por categoría
    const filterBtns = document.querySelectorAll('.filter-btn');
    const sections = document.querySelectorAll('.category-section');
    const serviceCards = document.querySelectorAll('.service-card');
    
    function filterByCategory(category) {
        if (category === 'all') {
            sections.forEach(section => {
                section.style.display = 'block';
            });
        } else {
            sections.forEach(section => {
                if (section.dataset.category === category) {
                    section.style.display = 'block';
                } else {
                    section.style.display = 'none';
                }
            });
        }
        
        // Actualizar estilo de botones
        filterBtns.forEach(btn => {
            if (btn.dataset.filter === category) {
                btn.classList.add('active');
            } else {
                btn.classList.remove('active');
            }
        });
    }
    
    filterBtns.forEach(btn => {
        btn.addEventListener('click', () => {
            const category = btn.dataset.filter;
            filterByCategory(category);
        });
    });
    
    // Búsqueda por nombre
    const searchInput = document.getElementById('searchInput');
    
    function searchServices() {
        const searchTerm = searchInput.value.toLowerCase().trim();
        
        serviceCards.forEach(card => {
            const serviceName = card.dataset.name || '';
            if (searchTerm === '' || serviceName.includes(searchTerm)) {
                card.style.display = 'block';
            } else {
                card.style.display = 'none';
            }
        });
    }
    
    searchInput.addEventListener('input', searchServices);
});
</script>

<style>
.filter-btn {
    background-color: #f3f4f6;
    color: #4b5563;
    border: 1px solid #e5e7eb;
}

.filter-btn.active {
    background-color: #f97316;
    color: white;
    border-color: #f97316;
}

.filter-btn:hover:not(.active) {
    background-color: #fed7aa;
    color: #c2410c;
}
</style>
@endsection