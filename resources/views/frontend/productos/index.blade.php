@extends('layouts.app')

@section('title', ' - Productos')

@section('content')
<div class="bg-cream">
    <!-- Hero de Productos -->
    <div class="bg-gradient-to-r from-orange-500 to-orange-600 text-white py-16">
        <div class="max-w-7xl mx-auto px-4 text-center">
            <h1 class="text-4xl md:text-5xl font-bold mb-4">Nuestros Productos</h1>
            <p class="text-xl text-orange-100 max-w-2xl mx-auto">
                Productos de alta calidad para el bienestar de tu mascota
            </p>
        </div>
    </div>

    <div class="max-w-7xl mx-auto px-4 py-12">
        
        <!-- ==================== AVISO IMPORTANTE ==================== -->
        <div class="mb-8 bg-blue-50 border-l-4 border-blue-500 rounded-lg p-4">
            <div class="flex items-center">
                <i class="fas fa-store text-blue-500 text-xl mr-3"></i>
                <div>
                    <p class="text-blue-800 font-semibold">📢 Compra en Tienda Física</p>
                    <p class="text-blue-600 text-sm">Todos nuestros productos están disponibles exclusivamente en nuestra sucursal. 
                    Visítanos para conocer nuestra variedad de productos y recibir asesoría personalizada.</p>
                </div>
            </div>
        </div>
        
        <!-- ==================== FILTROS DE BÚSQUEDA ==================== -->
        <div class="mb-8 bg-white rounded-xl shadow-md p-4">
            <div class="flex flex-wrap gap-4 items-center justify-between">
                <div class="flex-1 min-w-[200px]">
                    <div class="relative">
                        <i class="fas fa-search absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-400"></i>
                        <input type="text" 
                               id="searchInput" 
                               placeholder="Buscar productos..." 
                               class="w-full pl-10 pr-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-orange-500">
                    </div>
                </div>
                <div class="flex gap-2 flex-wrap">
                    <button class="filter-btn active px-4 py-2 rounded-full text-sm font-medium transition-all" data-filter="all">
                        Todos
                    </button>
                    <button class="filter-btn px-4 py-2 rounded-full text-sm font-medium transition-all" data-filter="ofertas">
                        🔥 Ofertas
                    </button>
                    <button class="filter-btn px-4 py-2 rounded-full text-sm font-medium transition-all" data-filter="alimento">
                        🍖 Alimentos
                    </button>
                    <button class="filter-btn px-4 py-2 rounded-full text-sm font-medium transition-all" data-filter="aseo">
                        🧴 Aseo
                    </button>
                    <button class="filter-btn px-4 py-2 rounded-full text-sm font-medium transition-all" data-filter="juguete">
                        🎾 Juguetes
                    </button>
                    <button class="filter-btn px-4 py-2 rounded-full text-sm font-medium transition-all" data-filter="accesorio">
                        🐕 Accesorios
                    </button>
                    <button class="filter-btn px-4 py-2 rounded-full text-sm font-medium transition-all" data-filter="snack">
                        🍪 Snacks
                    </button>
                </div>
            </div>
        </div>
        
        <!-- ==================== SECCIÓN DE OFERTAS ==================== -->
        @if(count($ofertas) > 0)
        <div class="mb-16 category-section" data-category="ofertas">
            <div class="text-center mb-10">
                <div class="inline-flex items-center bg-red-100 text-red-600 px-4 py-2 rounded-full mb-4">
                    <i class="fas fa-fire mr-2"></i>
                    <span class="font-semibold">No te las pierdas</span>
                </div>
                <h2 class="text-3xl md:text-4xl font-bold text-gray-800 mb-3">
                    Productos en <span class="text-red-500">Oferta</span>
                </h2>
                <p class="text-gray-600 max-w-2xl mx-auto">
                    Aprovecha estos increíbles descuentos por tiempo limitado
                </p>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                @foreach($ofertas as $producto)
                <div class="product-card bg-white rounded-2xl shadow-lg hover:shadow-2xl transition-all duration-300 overflow-hidden group relative" 
                     data-name="{{ strtolower($producto->nombre) }}">
                    <div class="absolute top-2 right-2 bg-red-500 text-white px-3 py-1 rounded-full text-xs font-bold z-10">
                        -{{ $producto->descuento_porcentaje }}%
                    </div>
                    <div class="relative h-48 overflow-hidden">
                        @if($producto->imagen)
                            <img src="{{ $producto->imagen }}" 
                                 alt="{{ $producto->nombre }}"
                                 class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                        @else
                            <div class="w-full h-full bg-gradient-to-br from-orange-100 to-orange-200 flex items-center justify-center">
                                <i class="fas fa-{{ $producto->categoria == 'alimento' ? 'bone' : ($producto->categoria == 'aseo' ? 'soap' : 'paw') }} text-5xl text-orange-400"></i>
                            </div>
                        @endif
                        <div class="absolute bottom-0 left-0 right-0 bg-gradient-to-t from-black/70 to-transparent p-4">
                            <span class="text-white text-sm font-semibold">Disponible en tienda</span>
                        </div>
                    </div>
                    <div class="p-4">
                        <div class="flex items-center justify-between mb-2">
                            <span class="text-xs font-semibold bg-green-100 text-green-700 px-2 py-1 rounded-full">
                                <i class="fas fa-store mr-1"></i> Tienda física
                            </span>
                            @if($producto->stock > 0)
                                <span class="text-xs text-green-600">✓ En stock</span>
                            @else
                                <span class="text-xs text-red-600">✗ Agotado</span>
                            @endif
                        </div>
                        <h3 class="text-lg font-bold text-gray-800 mb-2">{{ $producto->nombre }}</h3>
                        <p class="text-gray-600 text-sm mb-2">{{ Str::limit($producto->descripcion, 60) }}</p>
                        <div class="flex items-center justify-between mt-3">
                            <div>
                                @if($producto->en_oferta)
                                    <span class="text-sm text-gray-500 line-through">${{ number_format($producto->precio, 2) }}</span>
                                    <span class="text-2xl font-bold text-red-500 ml-2">${{ number_format($producto->getPrecioConDescuentoAttribute(), 2) }}</span>
                                @else
                                    <span class="text-2xl font-bold text-orange-500">${{ number_format($producto->precio, 2) }}</span>
                                @endif
                            </div>
                            <button onclick="mostrarMensajeTienda('{{ $producto->nombre }}')" 
                                    class="bg-orange-500 text-white px-4 py-2 rounded-full text-sm hover:bg-orange-600 transition-all btn-effect">
                                <i class="fas fa-store mr-1"></i> Consultar
                            </button>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
        @endif
        
        <!-- ==================== SECCIÓN DE ALIMENTOS ==================== -->
        @if(count($alimentos) > 0)
        <div class="mb-16 category-section" data-category="alimento">
            <div class="flex items-center justify-between mb-8">
                <div>
                    <div class="inline-flex items-center bg-orange-100 text-orange-600 px-4 py-2 rounded-full mb-2">
                        <i class="fas fa-bone mr-2"></i>
                        <span class="font-semibold">Nutrición de Calidad</span>
                    </div>
                    <h2 class="text-3xl font-bold text-gray-800">Alimentos Premium</h2>
                    <p class="text-gray-600">Nutrición balanceada para todas las etapas de vida</p>
                </div>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                @foreach($alimentos as $producto)
                <div class="product-card bg-white rounded-2xl shadow-lg hover:shadow-xl transition-all duration-300 overflow-hidden group" data-name="{{ strtolower($producto->nombre) }}">
                    <div class="relative h-48 overflow-hidden">
                        @if($producto->imagen)
                            <img src="{{ $producto->imagen }}" 
                                 alt="{{ $producto->nombre }}"
                                 class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                        @else
                            <div class="w-full h-full bg-gradient-to-br from-orange-100 to-orange-200 flex items-center justify-center">
                                <i class="fas fa-bone text-5xl text-orange-400"></i>
                            </div>
                        @endif
                    </div>
                    <div class="p-4">
                        <div class="flex items-center justify-between mb-2">
                            <span class="text-xs font-semibold bg-green-100 text-green-700 px-2 py-1 rounded-full">
                                <i class="fas fa-store mr-1"></i> Tienda física
                            </span>
                            @if($producto->stock > 0)
                                <span class="text-xs text-green-600">✓ En stock</span>
                            @else
                                <span class="text-xs text-red-600">✗ Agotado</span>
                            @endif
                        </div>
                        <h3 class="text-lg font-bold text-gray-800 mb-2">{{ $producto->nombre }}</h3>
                        <p class="text-gray-600 text-sm mb-2">{{ Str::limit($producto->descripcion, 60) }}</p>
                        <div class="flex items-center justify-between mt-3">
                            <div>
                                <span class="text-2xl font-bold text-orange-500">${{ number_format($producto->precio, 2) }}</span>
                            </div>
                            <button onclick="mostrarMensajeTienda('{{ $producto->nombre }}')" 
                                    class="bg-orange-500 text-white px-4 py-2 rounded-full text-sm hover:bg-orange-600 transition-all btn-effect">
                                <i class="fas fa-store mr-1"></i> Consultar
                            </button>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
        @endif
        
        <!-- ==================== SECCIÓN DE ASEO ==================== -->
        @if(count($aseo) > 0)
        <div class="mb-16 category-section" data-category="aseo">
            <div class="flex items-center justify-between mb-8">
                <div>
                    <div class="inline-flex items-center bg-blue-100 text-blue-600 px-4 py-2 rounded-full mb-2">
                        <i class="fas fa-soap mr-2"></i>
                        <span class="font-semibold">Higiene y Cuidado</span>
                    </div>
                    <h2 class="text-3xl font-bold text-gray-800">Productos de Aseo</h2>
                    <p class="text-gray-600">Mantén a tu mascota limpia y saludable</p>
                </div>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                @foreach($aseo as $producto)
                <div class="product-card bg-white rounded-2xl shadow-lg hover:shadow-xl transition-all duration-300 overflow-hidden group" data-name="{{ strtolower($producto->nombre) }}">
                    <div class="relative h-48 overflow-hidden">
                        @if($producto->imagen)
                            <img src="{{ $producto->imagen }}" 
                                 alt="{{ $producto->nombre }}"
                                 class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                        @else
                            <div class="w-full h-full bg-gradient-to-br from-blue-100 to-blue-200 flex items-center justify-center">
                                <i class="fas fa-soap text-5xl text-blue-400"></i>
                            </div>
                        @endif
                    </div>
                    <div class="p-4">
                        <div class="flex items-center justify-between mb-2">
                            <span class="text-xs font-semibold bg-green-100 text-green-700 px-2 py-1 rounded-full">
                                <i class="fas fa-store mr-1"></i> Tienda física
                            </span>
                            @if($producto->stock > 0)
                                <span class="text-xs text-green-600">✓ En stock</span>
                            @else
                                <span class="text-xs text-red-600">✗ Agotado</span>
                            @endif
                        </div>
                        <h3 class="text-lg font-bold text-gray-800 mb-2">{{ $producto->nombre }}</h3>
                        <p class="text-gray-600 text-sm mb-2">{{ Str::limit($producto->descripcion, 60) }}</p>
                        <div class="flex items-center justify-between mt-3">
                            <div>
                                @if($producto->en_oferta)
                                    <span class="text-sm text-gray-500 line-through">${{ number_format($producto->precio, 2) }}</span>
                                    <span class="text-2xl font-bold text-red-500 ml-2">${{ number_format($producto->getPrecioConDescuentoAttribute(), 2) }}</span>
                                @else
                                    <span class="text-2xl font-bold text-orange-500">${{ number_format($producto->precio, 2) }}</span>
                                @endif
                            </div>
                            <button onclick="mostrarMensajeTienda('{{ $producto->nombre }}')" 
                                    class="bg-orange-500 text-white px-4 py-2 rounded-full text-sm hover:bg-orange-600 transition-all btn-effect">
                                <i class="fas fa-store mr-1"></i> Consultar
                            </button>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
        @endif
        
        <!-- ==================== SECCIÓN DE JUGUETES ==================== -->
        @if(count($juguetes) > 0)
        <div class="mb-16 category-section" data-category="juguete">
            <div class="flex items-center justify-between mb-8">
                <div>
                    <div class="inline-flex items-center bg-purple-100 text-purple-600 px-4 py-2 rounded-full mb-2">
                        <i class="fas fa-puzzle-piece mr-2"></i>
                        <span class="font-semibold">Diversión Asegurada</span>
                    </div>
                    <h2 class="text-3xl font-bold text-gray-800">Juguetes</h2>
                    <p class="text-gray-600">Entretenimiento y estimulación para tu mascota</p>
                </div>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                @foreach($juguetes as $producto)
                <div class="product-card bg-white rounded-2xl shadow-lg hover:shadow-xl transition-all duration-300 overflow-hidden group" data-name="{{ strtolower($producto->nombre) }}">
                    <div class="relative h-48 overflow-hidden">
                        @if($producto->imagen)
                            <img src="{{ $producto->imagen }}" 
                                 alt="{{ $producto->nombre }}"
                                 class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                        @else
                            <div class="w-full h-full bg-gradient-to-br from-purple-100 to-purple-200 flex items-center justify-center">
                                <i class="fas fa-puzzle-piece text-5xl text-purple-400"></i>
                            </div>
                        @endif
                    </div>
                    <div class="p-4">
                        <div class="flex items-center justify-between mb-2">
                            <span class="text-xs font-semibold bg-green-100 text-green-700 px-2 py-1 rounded-full">
                                <i class="fas fa-store mr-1"></i> Tienda física
                            </span>
                            @if($producto->stock > 0)
                                <span class="text-xs text-green-600">✓ En stock</span>
                            @else
                                <span class="text-xs text-red-600">✗ Agotado</span>
                            @endif
                        </div>
                        <h3 class="text-lg font-bold text-gray-800 mb-2">{{ $producto->nombre }}</h3>
                        <p class="text-gray-600 text-sm mb-2">{{ Str::limit($producto->descripcion, 60) }}</p>
                        <div class="flex items-center justify-between mt-3">
                            <div>
                                @if($producto->en_oferta)
                                    <span class="text-sm text-gray-500 line-through">${{ number_format($producto->precio, 2) }}</span>
                                    <span class="text-2xl font-bold text-red-500 ml-2">${{ number_format($producto->getPrecioConDescuentoAttribute(), 2) }}</span>
                                @else
                                    <span class="text-2xl font-bold text-orange-500">${{ number_format($producto->precio, 2) }}</span>
                                @endif
                            </div>
                            <button onclick="mostrarMensajeTienda('{{ $producto->nombre }}')" 
                                    class="bg-orange-500 text-white px-4 py-2 rounded-full text-sm hover:bg-orange-600 transition-all btn-effect">
                                <i class="fas fa-store mr-1"></i> Consultar
                            </button>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
        @endif
        
        <!-- ==================== SECCIÓN DE ACCESORIOS ==================== -->
        @if(count($accesorios) > 0)
        <div class="mb-16 category-section" data-category="accesorio">
            <div class="flex items-center justify-between mb-8">
                <div>
                    <div class="inline-flex items-center bg-green-100 text-green-600 px-4 py-2 rounded-full mb-2">
                        <i class="fas fa-couch mr-2"></i>
                        <span class="font-semibold">Comodidad y Estilo</span>
                    </div>
                    <h2 class="text-3xl font-bold text-gray-800">Accesorios</h2>
                    <p class="text-gray-600">Todo lo que tu mascota necesita para estar cómoda</p>
                </div>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                @foreach($accesorios as $producto)
                <div class="product-card bg-white rounded-2xl shadow-lg hover:shadow-xl transition-all duration-300 overflow-hidden group" data-name="{{ strtolower($producto->nombre) }}">
                    <div class="relative h-48 overflow-hidden">
                        @if($producto->imagen)
                            <img src="{{ $producto->imagen }}" 
                                 alt="{{ $producto->nombre }}"
                                 class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                        @else
                            <div class="w-full h-full bg-gradient-to-br from-green-100 to-green-200 flex items-center justify-center">
                                <i class="fas fa-couch text-5xl text-green-400"></i>
                            </div>
                        @endif
                    </div>
                    <div class="p-4">
                        <div class="flex items-center justify-between mb-2">
                            <span class="text-xs font-semibold bg-green-100 text-green-700 px-2 py-1 rounded-full">
                                <i class="fas fa-store mr-1"></i> Tienda física
                            </span>
                            @if($producto->stock > 0)
                                <span class="text-xs text-green-600">✓ En stock</span>
                            @else
                                <span class="text-xs text-red-600">✗ Agotado</span>
                            @endif
                        </div>
                        <h3 class="text-lg font-bold text-gray-800 mb-2">{{ $producto->nombre }}</h3>
                        <p class="text-gray-600 text-sm mb-2">{{ Str::limit($producto->descripcion, 60) }}</p>
                        <div class="flex items-center justify-between mt-3">
                            <div>
                                @if($producto->en_oferta)
                                    <span class="text-sm text-gray-500 line-through">${{ number_format($producto->precio, 2) }}</span>
                                    <span class="text-2xl font-bold text-red-500 ml-2">${{ number_format($producto->getPrecioConDescuentoAttribute(), 2) }}</span>
                                @else
                                    <span class="text-2xl font-bold text-orange-500">${{ number_format($producto->precio, 2) }}</span>
                                @endif
                            </div>
                            <button onclick="mostrarMensajeTienda('{{ $producto->nombre }}')" 
                                    class="bg-orange-500 text-white px-4 py-2 rounded-full text-sm hover:bg-orange-600 transition-all btn-effect">
                                <i class="fas fa-store mr-1"></i> Consultar
                            </button>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
        @endif
        
        <!-- ==================== SECCIÓN DE SNACKS ==================== -->
        @if(count($snacks) > 0)
        <div class="mb-16 category-section" data-category="snack">
            <div class="flex items-center justify-between mb-8">
                <div>
                    <div class="inline-flex items-center bg-yellow-100 text-yellow-600 px-4 py-2 rounded-full mb-2">
                        <i class="fas fa-cookie-bite mr-2"></i>
                        <span class="font-semibold">Premios Saludables</span>
                    </div>
                    <h2 class="text-3xl font-bold text-gray-800">Snacks y Premios</h2>
                    <p class="text-gray-600">Recompensas deliciosas y nutritivas</p>
                </div>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                @foreach($snacks as $producto)
                <div class="product-card bg-white rounded-2xl shadow-lg hover:shadow-xl transition-all duration-300 overflow-hidden group" data-name="{{ strtolower($producto->nombre) }}">
                    <div class="relative h-48 overflow-hidden">
                        @if($producto->imagen)
                            <img src="{{ $producto->imagen }}" 
                                 alt="{{ $producto->nombre }}"
                                 class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                        @else
                            <div class="w-full h-full bg-gradient-to-br from-yellow-100 to-yellow-200 flex items-center justify-center">
                                <i class="fas fa-cookie-bite text-5xl text-yellow-400"></i>
                            </div>
                        @endif
                    </div>
                    <div class="p-4">
                        <div class="flex items-center justify-between mb-2">
                            <span class="text-xs font-semibold bg-green-100 text-green-700 px-2 py-1 rounded-full">
                                <i class="fas fa-store mr-1"></i> Tienda física
                            </span>
                            @if($producto->stock > 0)
                                <span class="text-xs text-green-600">✓ En stock</span>
                            @else
                                <span class="text-xs text-red-600">✗ Agotado</span>
                            @endif
                        </div>
                        <h3 class="text-lg font-bold text-gray-800 mb-2">{{ $producto->nombre }}</h3>
                        <p class="text-gray-600 text-sm mb-2">{{ Str::limit($producto->descripcion, 60) }}</p>
                        <div class="flex items-center justify-between mt-3">
                            <div>
                                @if($producto->en_oferta)
                                    <span class="text-sm text-gray-500 line-through">${{ number_format($producto->precio, 2) }}</span>
                                    <span class="text-2xl font-bold text-red-500 ml-2">${{ number_format($producto->getPrecioConDescuentoAttribute(), 2) }}</span>
                                @else
                                    <span class="text-2xl font-bold text-orange-500">${{ number_format($producto->precio, 2) }}</span>
                                @endif
                            </div>
                            <button onclick="mostrarMensajeTienda('{{ $producto->nombre }}')" 
                                    class="bg-orange-500 text-white px-4 py-2 rounded-full text-sm hover:bg-orange-600 transition-all btn-effect">
                                <i class="fas fa-store mr-1"></i> Consultar
                            </button>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
        @endif
        
    </div>
</div>

<!-- JavaScript para filtros, búsqueda y mensajes -->
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Filtros por categoría
    const filterBtns = document.querySelectorAll('.filter-btn');
    const sections = document.querySelectorAll('.category-section');
    const productCards = document.querySelectorAll('.product-card');
    
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
    
    function searchProducts() {
        const searchTerm = searchInput.value.toLowerCase().trim();
        
        productCards.forEach(card => {
            const productName = card.dataset.name || '';
            if (searchTerm === '' || productName.includes(searchTerm)) {
                card.style.display = 'block';
            } else {
                card.style.display = 'none';
            }
        });
    }
    
    searchInput.addEventListener('input', searchProducts);
});

// Función para mostrar mensaje de tienda física
function mostrarMensajeTienda(productoNombre) {
    // Crear elemento de notificación
    const notification = document.createElement('div');
    notification.className = 'fixed bottom-4 right-4 bg-blue-500 text-white px-6 py-3 rounded-lg shadow-lg z-50 animate-slide-up';
    notification.innerHTML = `
        <div class="flex items-center gap-3">
            <i class="fas fa-store text-xl"></i>
            <div>
                <p class="font-semibold">Producto disponible en tienda física</p>
                <p class="text-sm opacity-90">"${productoNombre}" - Visítanos para conocer precios y disponibilidad</p>
            </div>
            <button onclick="this.parentElement.parentElement.remove()" class="ml-4 text-white hover:text-gray-200">
                <i class="fas fa-times"></i>
            </button>
        </div>
    `;
    
    document.body.appendChild(notification);
    
    // Eliminar notificación después de 5 segundos
    setTimeout(() => {
        notification.style.opacity = '0';
        notification.style.transform = 'translateY(20px)';
        setTimeout(() => notification.remove(), 300);
    }, 5000);
}

// Estilo para la animación
const style = document.createElement('style');
style.textContent = `
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
    .animate-slide-up {
        animation: slideUp 0.3s ease-out forwards;
    }
`;
document.head.appendChild(style);
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