@extends('layouts.app')

@section('title', ' - Política de Cookies')

@section('content')
<div class="bg-cream min-h-screen py-12">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <div class="bg-white rounded-2xl shadow-xl overflow-hidden">
            <div class="bg-gradient-to-r from-orange-500 to-orange-600 px-6 py-4">
                <h1 class="text-2xl font-bold text-white">Política de Cookies</h1>
                <p class="text-orange-100">Última actualización: 01 de abril de 2026</p>
            </div>
            
            <div class="p-6 space-y-6">
                <div>
                    <h2 class="text-xl font-bold text-gray-800 mb-3">¿Qué son las cookies?</h2>
                    <p class="text-gray-600 leading-relaxed">
                        Las cookies son pequeños archivos de texto que los sitios web colocan en tu dispositivo mientras navegas. 
                        Son ampliamente utilizadas para hacer que los sitios web funcionen de manera más eficiente y proporcionar 
                        información a los propietarios del sitio.
                    </p>
                </div>
                
                <div>
                    <h2 class="text-xl font-bold text-gray-800 mb-3">Tipos de cookies que utilizamos</h2>
                    <ul class="list-disc list-inside text-gray-600 space-y-2 ml-4">
                        <li><strong class="text-gray-800">Cookies necesarias:</strong> Son esenciales para que el sitio web funcione correctamente. No pueden desactivarse.</li>
                        <li><strong class="text-gray-800">Cookies de preferencias:</strong> Permiten recordar tus preferencias, como idioma o región.</li>
                        <li><strong class="text-gray-800">Cookies de análisis:</strong> Nos ayudan a entender cómo los visitantes interactúan con nuestro sitio.</li>
                        <li><strong class="text-gray-800">Cookies de marketing:</strong> Se utilizan para mostrarte publicidad relevante.</li>
                    </ul>
                </div>
                
                <div>
                    <h2 class="text-xl font-bold text-gray-800 mb-3">Cookies específicas que usamos</h2>
                    <div class="overflow-x-auto">
                        <table class="w-full text-sm">
                            <thead class="bg-gray-50">
                                <tr><th class="px-4 py-2 text-left">Nombre</th><th class="px-4 py-2 text-left">Tipo</th><th class="px-4 py-2 text-left">Duración</th><th class="px-4 py-2 text-left">Propósito</th></tr>
                            </thead>
                            <tbody>
                                <tr class="border-t"><td class="px-4 py-2">cookie_preference</td><td class="px-4 py-2">Necesaria</td><td class="px-4 py-2">365 días</td><td class="px-4 py-2">Guarda tus preferencias de cookies</td></tr>
                                <tr class="border-t"><td class="px-4 py-2">cookies_accepted</td><td class="px-4 py-2">Necesaria</td><td class="px-4 py-2">365 días</td><td class="px-4 py-2">Indica si aceptaste las cookies</td></tr>
                                <tr class="border-t"><td class="px-4 py-2">XSRF-TOKEN</td><td class="px-4 py-2">Necesaria</td><td class="px-4 py-2">2 horas</td><td class="px-4 py-2">Protección contra ataques CSRF</td></tr>
                                <tr class="border-t"><td class="px-4 py-2">laravel_session</td><td class="px-4 py-2">Necesaria</td><td class="px-4 py-2">2 horas</td><td class="px-4 py-2">Mantiene tu sesión activa</td></tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                
                <div>
                    <h2 class="text-xl font-bold text-gray-800 mb-3">¿Cómo gestionar las cookies?</h2>
                    <p class="text-gray-600 leading-relaxed">
                        Puedes configurar tu navegador para bloquear o eliminar cookies. Sin embargo, si bloqueas las cookies 
                        necesarias, algunas partes del sitio pueden no funcionar correctamente.
                    </p>
                </div>
                
                <div class="bg-orange-50 rounded-lg p-4">
                    <p class="text-sm text-gray-600">
                        <i class="fas fa-shield-alt text-orange-500 mr-2"></i>
                        En MiniHuellitas respetamos tu privacidad. Puedes gestionar tus preferencias de cookies en cualquier momento.
                    </p>
                </div>
            </div>
        </div>
        
        <div class="mt-6 text-center">
            <a href="{{ route('home') }}" class="text-orange-500 hover:underline">
                <i class="fas fa-arrow-left mr-2"></i> Volver al inicio
            </a>
        </div>
        
    </div>
</div>
@endsection