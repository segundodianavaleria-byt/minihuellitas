@extends('layouts.app')

@section('title', ' - Nosotros')

@section('content')
<div class="bg-cream">
    <!-- Hero Section -->
    <div class="bg-gradient-to-r from-orange-500 to-orange-600 text-white py-16">
        <div class="max-w-7xl mx-auto px-4 text-center">
            <h1 class="text-4xl md:text-5xl font-bold mb-4">Sobre Nosotros</h1>
            <p class="text-xl text-orange-100 max-w-2xl mx-auto">
                Conoce la historia de MiniHuellitas y nuestro amor por los animales
            </p>
        </div>
    </div>

    <div class="max-w-7xl mx-auto px-4 py-12">
        
        <!-- ==================== NUESTRA HISTORIA ==================== -->
        <div class="mb-20">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
                <div>
                    <div class="inline-flex items-center bg-orange-100 text-orange-600 px-4 py-2 rounded-full mb-4">
                        <i class="fas fa-heart mr-2"></i>
                        <span class="font-semibold">Nuestra Historia</span>
                    </div>
                    <h2 class="text-3xl md:text-4xl font-bold text-gray-800 mb-6">
                        Una historia de <span class="text-orange-500">amor y dedicación</span>
                    </h2>
                    <div class="space-y-4 text-gray-600">
                        <p>
                            MiniHuellitas nació en 2016 con un sueño: crear un espacio donde cada mascota sea tratada 
                            con el amor, respeto y profesionalismo que merece. Lo que comenzó como una pequeña estética 
                            canina, hoy es un lugar de referencia en el cuidado integral de mascotas.
                        </p>
                        <p>
                            Nuestro fundador, apasionado por los animales desde niño, decidió convertir su vocación 
                            en un servicio de calidad, rodeándose de un equipo de profesionales igualmente comprometidos 
                            con el bienestar animal.
                        </p>
                        <p>
                            En MiniHuellitas no solo ofrecemos servicios de estética, sino que también nos preocupamos 
                            por la salud, la nutrición y la felicidad de tu mejor amigo.
                        </p>
                    </div>
                    
                    <div class="grid grid-cols-2 gap-4 mt-8">
                        <div class="text-center p-4 bg-orange-50 rounded-xl">
                            <i class="fas fa-calendar-alt text-orange-500 text-3xl mb-2"></i>
                            <div class="text-2xl font-bold text-gray-800">2016</div>
                            <div class="text-sm text-gray-500">Año de fundación</div>
                        </div>
                        <div class="text-center p-4 bg-orange-50 rounded-xl">
                            <i class="fas fa-dog text-orange-500 text-3xl mb-2"></i>
                            <div class="text-2xl font-bold text-gray-800">500+</div>
                            <div class="text-sm text-gray-500">Mascotas felices</div>
                        </div>
                        <div class="text-center p-4 bg-orange-50 rounded-xl">
                            <i class="fas fa-star text-orange-500 text-3xl mb-2"></i>
                            <div class="text-2xl font-bold text-gray-800">4.9</div>
                            <div class="text-sm text-gray-500">Calificación promedio</div>
                        </div>
                        <div class="text-center p-4 bg-orange-50 rounded-xl">
                            <i class="fas fa-users text-orange-500 text-3xl mb-2"></i>
                            <div class="text-2xl font-bold text-gray-800">8+</div>
                            <div class="text-sm text-gray-500">Años de experiencia</div>
                        </div>
                    </div>
                </div>
                <div class="relative group">
                    <div class="absolute inset-0 bg-orange-400 rounded-2xl blur-2xl opacity-20 group-hover:opacity-30 transition-opacity"></div>
                    <img src="https://images.unsplash.com/photo-1583511655857-d19b40a7a54e?w=600&h=500&fit=crop" 
                         alt="Nuestro equipo" 
                         class="relative rounded-2xl shadow-2xl w-full object-cover transform group-hover:scale-105 transition-all duration-500">
                </div>
            </div>
        </div>
        
        <!-- ==================== MISIÓN Y VISIÓN ==================== -->
        <div class="mb-20 bg-white rounded-2xl shadow-lg p-8">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                <div class="text-center">
                    <div class="w-20 h-20 bg-orange-100 rounded-full flex items-center justify-center mx-auto mb-4">
                        <i class="fas fa-bullseye text-orange-500 text-3xl"></i>
                    </div>
                    <h3 class="text-2xl font-bold text-gray-800 mb-4">Nuestra Misión</h3>
                    <p class="text-gray-600">
                        Brindar bienestar, belleza y salud a las mascotas a través de servicios profesionales 
                        de alta calidad, en un ambiente cálido, seguro y lleno de amor, garantizando la 
                        satisfacción y confianza de nuestros clientes.
                    </p>
                </div>
                <div class="text-center">
                    <div class="w-20 h-20 bg-orange-100 rounded-full flex items-center justify-center mx-auto mb-4">
                        <i class="fas fa-eye text-orange-500 text-3xl"></i>
                    </div>
                    <h3 class="text-2xl font-bold text-gray-800 mb-4">Nuestra Visión</h3>
                    <p class="text-gray-600">
                        Ser la estética canina líder en la región, reconocida por nuestro compromiso con 
                        el bienestar animal, la innovación en servicios y la excelencia en el cuidado integral 
                        de las mascotas.
                    </p>
                </div>
            </div>
        </div>
        
        <!-- ==================== VALORES ==================== -->
        <div class="mb-20">
            <div class="text-center mb-12">
                <div class="inline-flex items-center bg-orange-100 text-orange-600 px-4 py-2 rounded-full mb-4">
                    <i class="fas fa-gem mr-2"></i>
                    <span class="font-semibold">Nuestros Principios</span>
                </div>
                <h2 class="text-3xl md:text-4xl font-bold text-gray-800 mb-3">
                    Nuestros <span class="text-orange-500">Valores</span>
                </h2>
                <p class="text-gray-600 max-w-2xl mx-auto">
                    Los principios que guían nuestro trabajo y nuestra relación con las mascotas y sus familias
                </p>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <div class="text-center group p-6 bg-white rounded-2xl shadow-lg hover:shadow-xl transition-all">
                    <div class="w-16 h-16 bg-orange-100 rounded-full flex items-center justify-center mx-auto mb-4 group-hover:bg-orange-500 transition-all">
                        <i class="fas fa-heart text-orange-500 text-2xl group-hover:text-white"></i>
                    </div>
                    <h3 class="text-xl font-bold text-gray-800 mb-2">Amor y Respeto</h3>
                    <p class="text-gray-600 text-sm">Cada mascota es tratada con el mismo cariño que merece un miembro de la familia.</p>
                </div>
                <div class="text-center group p-6 bg-white rounded-2xl shadow-lg hover:shadow-xl transition-all">
                    <div class="w-16 h-16 bg-orange-100 rounded-full flex items-center justify-center mx-auto mb-4 group-hover:bg-orange-500 transition-all">
                        <i class="fas fa-certificate text-orange-500 text-2xl group-hover:text-white"></i>
                    </div>
                    <h3 class="text-xl font-bold text-gray-800 mb-2">Profesionalismo</h3>
                    <p class="text-gray-600 text-sm">Contamos con personal capacitado y en constante actualización.</p>
                </div>
                <div class="text-center group p-6 bg-white rounded-2xl shadow-lg hover:shadow-xl transition-all">
                    <div class="w-16 h-16 bg-orange-100 rounded-full flex items-center justify-center mx-auto mb-4 group-hover:bg-orange-500 transition-all">
                        <i class="fas fa-hand-holding-heart text-orange-500 text-2xl group-hover:text-white"></i>
                    </div>
                    <h3 class="text-xl font-bold text-gray-800 mb-2">Compromiso</h3>
                    <p class="text-gray-600 text-sm">Nos comprometemos con la salud y bienestar de cada mascota que llega a nosotros.</p>
                </div>
                <div class="text-center group p-6 bg-white rounded-2xl shadow-lg hover:shadow-xl transition-all">
                    <div class="w-16 h-16 bg-orange-100 rounded-full flex items-center justify-center mx-auto mb-4 group-hover:bg-orange-500 transition-all">
                        <i class="fas fa-shield-alt text-orange-500 text-2xl group-hover:text-white"></i>
                    </div>
                    <h3 class="text-xl font-bold text-gray-800 mb-2">Seguridad</h3>
                    <p class="text-gray-600 text-sm">Utilizamos productos y técnicas seguras para el cuidado de tu mascota.</p>
                </div>
                <div class="text-center group p-6 bg-white rounded-2xl shadow-lg hover:shadow-xl transition-all">
                    <div class="w-16 h-16 bg-orange-100 rounded-full flex items-center justify-center mx-auto mb-4 group-hover:bg-orange-500 transition-all">
                        <i class="fas fa-smile text-orange-500 text-2xl group-hover:text-white"></i>
                    </div>
                    <h3 class="text-xl font-bold text-gray-800 mb-2">Alegría</h3>
                    <p class="text-gray-600 text-sm">Creemos que las mascotas felices hacen hogares felices.</p>
                </div>
                <div class="text-center group p-6 bg-white rounded-2xl shadow-lg hover:shadow-xl transition-all">
                    <div class="w-16 h-16 bg-orange-100 rounded-full flex items-center justify-center mx-auto mb-4 group-hover:bg-orange-500 transition-all">
                        <i class="fas fa-leaf text-orange-500 text-2xl group-hover:text-white"></i>
                    </div>
                    <h3 class="text-xl font-bold text-gray-800 mb-2">Sostenibilidad</h3>
                    <p class="text-gray-600 text-sm">Usamos productos ecológicos y prácticas responsables.</p>
                </div>
            </div>
        </div>
        
        <!-- ==================== COLLAGE DE MASCOTAS FELICES ==================== -->
        <div class="mb-20">
            <div class="text-center mb-12">
                <div class="inline-flex items-center bg-orange-100 text-orange-600 px-4 py-2 rounded-full mb-4">
                    <i class="fas fa-camera-retro mr-2"></i>
                    <span class="font-semibold">Nuestros Consentidos</span>
                </div>
                <h2 class="text-3xl md:text-4xl font-bold text-gray-800 mb-3">
                    Ellos son parte de <span class="text-orange-500">nuestra familia</span>
                </h2>
                <p class="text-gray-600 max-w-2xl mx-auto">
                    Conoce a algunas de las mascotas que han pasado por MiniHuellitas y se han convertido en parte de nuestra historia
                </p>
            </div>
            
            <!-- Collage de imágenes -->
            <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">
                <div class="group relative overflow-hidden rounded-2xl shadow-lg aspect-square">
                    <img src="https://images.unsplash.com/photo-1543466835-00a7907e9de1?w=400&h=400&fit=crop" 
                         alt="Mascota feliz" 
                         class="w-full h-full object-cover group-hover:scale-110 transition-all duration-500">
                    <div class="absolute inset-0 bg-gradient-to-t from-black/70 to-transparent opacity-0 group-hover:opacity-100 transition-all duration-300 flex items-end p-4">
                        <div class="text-white">
                            <p class="font-bold">Max</p>
                            <p class="text-xs">Golden Retriever</p>
                        </div>
                    </div>
                </div>
                <div class="group relative overflow-hidden rounded-2xl shadow-lg aspect-square">
                    <img src="https://pixabay.com/images/download/x-1771667_1920.jpg" 
                         alt="Mascota feliz" 
                         class="w-full h-full object-cover group-hover:scale-110 transition-all duration-500">
                    <div class="absolute inset-0 bg-gradient-to-t from-black/70 to-transparent opacity-0 group-hover:opacity-100 transition-all duration-300 flex items-end p-4">
                        <div class="text-white">
                            <p class="font-bold">Luna</p>
                            <p class="text-xs">Husky Siberiano</p>
                        </div>
                    </div>
                </div>
                <div class="group relative overflow-hidden rounded-2xl shadow-lg aspect-square">
                    <img src="https://images.unsplash.com/photo-1589941013453-ec89f33b5e95?w=600&auto=format&fit=crop&q=60&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxzZWFyY2h8M3x8cGFzdG9yJTIwYWxlbWFufGVufDB8fDB8fHww" 
                         alt="Mascota feliz" 
                         class="w-full h-full object-cover group-hover:scale-110 transition-all duration-500">
                    <div class="absolute inset-0 bg-gradient-to-t from-black/70 to-transparent opacity-0 group-hover:opacity-100 transition-all duration-300 flex items-end p-4">
                        <div class="text-white">
                            <p class="font-bold">Rocky</p>
                            <p class="text-xs">Pastor Alemán</p>
                        </div>
                    </div>
                </div>
                <div class="group relative overflow-hidden rounded-2xl shadow-lg aspect-square">
                    <img src="https://images.unsplash.com/photo-1655964107379-3f84335d1334?w=600&auto=format&fit=crop&q=60&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxzZWFyY2h8MTB8fEZyZW5jaCUyMFBvb2RsZXxlbnwwfHwwfHx8MA%3D%3D" 
                         alt="Mascota feliz" 
                         class="w-full h-full object-cover group-hover:scale-110 transition-all duration-500">
                    <div class="absolute inset-0 bg-gradient-to-t from-black/70 to-transparent opacity-0 group-hover:opacity-100 transition-all duration-300 flex items-end p-4">
                        <div class="text-white">
                            <p class="font-bold">Coco</p>
                            <p class="text-xs">French Poodle</p>
                        </div>
                    </div>
                </div>
                <div class="group relative overflow-hidden rounded-2xl shadow-lg aspect-square">
                    <img src="https://images.unsplash.com/photo-1611306133736-56a3b973b2cc?w=600&auto=format&fit=crop&q=60&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxzZWFyY2h8NHx8QmVhZ2xlfGVufDB8fDB8fHww" 
                         alt="Mascota feliz" 
                         class="w-full h-full object-cover group-hover:scale-110 transition-all duration-500">
                    <div class="absolute inset-0 bg-gradient-to-t from-black/70 to-transparent opacity-0 group-hover:opacity-100 transition-all duration-300 flex items-end p-4">
                        <div class="text-white">
                            <p class="font-bold">Toby</p>
                            <p class="text-xs">Beagle</p>
                        </div>
                    </div>
                </div>
                <div class="group relative overflow-hidden rounded-2xl shadow-lg aspect-square">
                    <img src="https://plus.unsplash.com/premium_photo-1683134036144-82b0a3d50f11?w=600&auto=format&fit=crop&q=60&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxzZWFyY2h8MXx8TGFicmFkb3J8ZW58MHx8MHx8fDA%3D" 
                         alt="Mascota feliz" 
                         class="w-full h-full object-cover group-hover:scale-110 transition-all duration-500">
                    <div class="absolute inset-0 bg-gradient-to-t from-black/70 to-transparent opacity-0 group-hover:opacity-100 transition-all duration-300 flex items-end p-4">
                        <div class="text-white">
                            <p class="font-bold">Nala</p>
                            <p class="text-xs">Labrador</p>
                        </div>
                    </div>
                </div>
                <div class="group relative overflow-hidden rounded-2xl shadow-lg aspect-square">
                    <img src="https://images.unsplash.com/photo-1657088746570-0218626e8f55?w=600&auto=format&fit=crop&q=60&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxzZWFyY2h8Mnx8Q29ja2VyJTIwU3BhbmllbHxlbnwwfHwwfHx8MA%3D%3D" 
                         alt="Mascota feliz" 
                         class="w-full h-full object-cover group-hover:scale-110 transition-all duration-500">
                    <div class="absolute inset-0 bg-gradient-to-t from-black/70 to-transparent opacity-0 group-hover:opacity-100 transition-all duration-300 flex items-end p-4">
                        <div class="text-white">
                            <p class="font-bold">Simba</p>
                            <p class="text-xs">Cocker Spaniel</p>
                        </div>
                    </div>
                </div>
                <div class="group relative overflow-hidden rounded-2xl shadow-lg aspect-square">
                    <img src="https://plus.unsplash.com/premium_photo-1681883531336-e3ef2ad60693?w=600&auto=format&fit=crop&q=60&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxzZWFyY2h8MXx8WW9ya3NoaXJlJTIwVGVycmllcnxlbnwwfHwwfHx8MA%3D%3D" 
                         alt="Mascota feliz" 
                         class="w-full h-full object-cover group-hover:scale-110 transition-all duration-500">
                    <div class="absolute inset-0 bg-gradient-to-t from-black/70 to-transparent opacity-0 group-hover:opacity-100 transition-all duration-300 flex items-end p-4">
                        <div class="text-white">
                            <p class="font-bold">Lola</p>
                            <p class="text-xs">Yorkshire Terrier</p>
                        </div>
                    </div>
                </div>
                <div class="group relative overflow-hidden rounded-2xl shadow-lg aspect-square">
                    <img src="https://images.unsplash.com/photo-1571167143301-3e6eb056e8e0?w=600&auto=format&fit=crop&q=60&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxzZWFyY2h8MTB8fERvYmVybWFufGVufDB8fDB8fHww" 
                         alt="Mascota feliz" 
                         class="w-full h-full object-cover group-hover:scale-110 transition-all duration-500">
                    <div class="absolute inset-0 bg-gradient-to-t from-black/70 to-transparent opacity-0 group-hover:opacity-100 transition-all duration-300 flex items-end p-4">
                        <div class="text-white">
                            <p class="font-bold">Zeus</p>
                            <p class="text-xs">Doberman</p>
                        </div>
                    </div>
                </div>
                <div class="group relative overflow-hidden rounded-2xl shadow-lg aspect-square">
                    <img src="https://images.unsplash.com/photo-1610041518868-f9284e7eecfe?w=600&auto=format&fit=crop&q=60&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxzZWFyY2h8Mnx8Y2hpaHVhaHVhfGVufDB8fDB8fHww" 
                         alt="Mascota feliz" 
                         class="w-full h-full object-cover group-hover:scale-110 transition-all duration-500">
                    <div class="absolute inset-0 bg-gradient-to-t from-black/70 to-transparent opacity-0 group-hover:opacity-100 transition-all duration-300 flex items-end p-4">
                        <div class="text-white">
                            <p class="font-bold">Maya</p>
                            <p class="text-xs">Chihuahua</p>
                        </div>
                    </div>
                </div>
                <div class="group relative overflow-hidden rounded-2xl shadow-lg aspect-square">
                    <img src="https://images.unsplash.com/photo-1665619461200-397c34387e43?w=600&auto=format&fit=crop&q=60&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxzZWFyY2h8MTJ8fGNvbmVqbyUyMGdpZ2FudGV8ZW58MHx8MHx8fDA%3D" 
                         alt="Mascota feliz" 
                         class="w-full h-full object-cover group-hover:scale-110 transition-all duration-500">
                    <div class="absolute inset-0 bg-gradient-to-t from-black/70 to-transparent opacity-0 group-hover:opacity-100 transition-all duration-300 flex items-end p-4">
                        <div class="text-white">
                            <p class="font-bold">Bruno</p>
                            <p class="text-xs">Conejo Gijante</p>
                        </div>
                    </div>
                </div>
                <div class="group relative overflow-hidden rounded-2xl shadow-lg aspect-square">
                    <img src="https://plus.unsplash.com/premium_photo-1718652942341-3cbe0512171e?w=600&auto=format&fit=crop&q=60&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxzZWFyY2h8MXx8U2hpYmElMjBJbnV8ZW58MHx8MHx8fDA%3D" 
                         alt="Mascota feliz" 
                         class="w-full h-full object-cover group-hover:scale-110 transition-all duration-500">
                    <div class="absolute inset-0 bg-gradient-to-t from-black/70 to-transparent opacity-0 group-hover:opacity-100 transition-all duration-300 flex items-end p-4">
                        <div class="text-white">
                            <p class="font-bold">Kiara</p>
                            <p class="text-xs">Shiba Inu</p>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="text-center mt-8">
                <p class="text-gray-500 text-sm">
                    <i class="fas fa-camera text-orange-500 mr-1"></i>
                    ¿Quieres que tu mascota aparezca en nuestro collage? 
                    <a href="{{ route('contacto') }}" class="text-orange-500 hover:underline">¡Contáctanos!</a>
                </p>
            </div>
        </div>
        
        <!-- ==================== NUESTRO EQUIPO ==================== -->
        <div class="mb-20">
            <div class="text-center mb-12">
                <div class="inline-flex items-center bg-orange-100 text-orange-600 px-4 py-2 rounded-full mb-4">
                    <i class="fas fa-users mr-2"></i>
                    <span class="font-semibold">Profesionales Apasionados</span>
                </div>
                <h2 class="text-3xl md:text-4xl font-bold text-gray-800 mb-3">
                    Conoce a nuestro <span class="text-orange-500">equipo</span>
                </h2>
                <p class="text-gray-600 max-w-2xl mx-auto">
                    Profesionales dedicados y apasionados por el bienestar animal
                </p>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-4 gap-6">
                <div class="text-center group">
                    <div class="w-32 h-32 mx-auto rounded-full overflow-hidden shadow-lg group-hover:scale-110 transition-all duration-300">
                        <img src="https://randomuser.me/api/portraits/women/44.jpg" alt="Veterinaria" class="w-full h-full object-cover">
                    </div>
                    <h3 class="text-lg font-bold text-gray-800 mt-4">Abigail Damaris</h3>
                    <p class="text-orange-500 text-sm">Directora / Veterinaria</p>
                    <p class="text-gray-500 text-xs mt-2">Especialista en dermatología canina</p>
                </div>
                <div class="text-center group">
                    <div class="w-32 h-32 mx-auto rounded-full overflow-hidden shadow-lg group-hover:scale-110 transition-all duration-300">
                        <img src="https://randomuser.me/api/portraits/men/32.jpg" alt="Estilista" class="w-full h-full object-cover">
                    </div>
                    <h3 class="text-lg font-bold text-gray-800 mt-4">Evelin Liliana</h3>
                    <p class="text-orange-500 text-sm">Estilista Canina</p>
                    <p class="text-gray-500 text-xs mt-2">Programadora profesional</p>
                </div>
                <div class="text-center group">
                    <div class="w-32 h-32 mx-auto rounded-full overflow-hidden shadow-lg group-hover:scale-110 transition-all duration-300">
                        <img src="https://randomuser.me/api/portraits/women/68.jpg" alt="Entrenadora" class="w-full h-full object-cover">
                    </div>
                    <h3 class="text-lg font-bold text-gray-800 mt-4">Diana Valeria</h3>
                    <p class="text-orange-500 text-sm">Entrenadora Canina</p>
                    <p class="text-gray-500 text-xs mt-2">Especialista en diseño</p>
                </div>
            </div>
        </div>
        
        <!-- ==================== TESTIMONIOS ==================== -->
        <div class="bg-white rounded-2xl shadow-lg p-8">
            <div class="text-center mb-8">
                <div class="inline-flex items-center bg-orange-100 text-orange-600 px-4 py-2 rounded-full mb-4">
                    <i class="fas fa-comment-dots mr-2"></i>
                    <span class="font-semibold">Lo que dicen nuestros clientes</span>
                </div>
                <h2 class="text-3xl font-bold text-gray-800">Testimonios</h2>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <div class="p-4 bg-cream rounded-xl">
                    <div class="flex items-center mb-3">
                        <img src="https://randomuser.me/api/portraits/women/1.jpg" class="w-10 h-10 rounded-full mr-3">
                        <div>
                            <p class="font-bold text-gray-800">Laura Méndez</p>
                            <div class="text-yellow-400 text-sm">
                                <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i>
                            </div>
                        </div>
                    </div>
                    <p class="text-gray-600 text-sm">"Excelente servicio, mi perrito Max quedó hermoso y muy feliz. El personal es súper amable y profesional."</p>
                </div>
                <div class="p-4 bg-cream rounded-xl">
                    <div class="flex items-center mb-3">
                        <img src="https://randomuser.me/api/portraits/men/2.jpg" class="w-10 h-10 rounded-full mr-3">
                        <div>
                            <p class="font-bold text-gray-800">Roberto Díaz</p>
                            <div class="text-yellow-400 text-sm">
                                <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i>
                            </div>
                        </div>
                    </div>
                    <p class="text-gray-600 text-sm">"Mi perrita Luna ama ir a MiniHuellitas. Siempre vuelve feliz y con un pelaje espectacular."</p>
                </div>
                <div class="p-4 bg-cream rounded-xl">
                    <div class="flex items-center mb-3">
                        <img src="https://randomuser.me/api/portraits/women/3.jpg" class="w-10 h-10 rounded-full mr-3">
                        <div>
                            <p class="font-bold text-gray-800">Patricia Soto</p>
                            <div class="text-yellow-400 text-sm">
                                <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i>
                            </div>
                        </div>
                    </div>
                    <p class="text-gray-600 text-sm">"El servicio de spa es maravilloso. Mi gato Simón sale relajado y hermoso. ¡Muy recomendado!"</p>
                </div>
            </div>
        </div>
        
    </div>
</div>
@endsection