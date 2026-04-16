@extends('layouts.app')

@section('title', ' - Política de Privacidad')

@section('content')
<div class="bg-cream min-h-screen py-12">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <div class="bg-white rounded-2xl shadow-xl overflow-hidden">
            <div class="bg-gradient-to-r from-orange-500 to-orange-600 px-6 py-4">
                <h1 class="text-2xl font-bold text-white">Política de Privacidad</h1>
                <p class="text-orange-100">Última actualización: 01 de abril de 2026</p>
            </div>
            
            <div class="p-6 space-y-6">
                
                <div>
                    <h2 class="text-xl font-bold text-gray-800 mb-3">1. Información que Recopilamos</h2>
                    <p class="text-gray-600 leading-relaxed">
                        En MiniHuellitas recopilamos la siguiente información personal:
                    </p>
                    <ul class="list-disc list-inside text-gray-600 mt-2 ml-4">
                        <li>Nombre completo</li>
                        <li>Dirección de correo electrónico</li>
                        <li>Número de teléfono</li>
                        <li>Dirección de domicilio (opcional)</li>
                        <li>Información de sus mascotas (nombre, especie, raza, edad, peso, condiciones médicas)</li>
                        <li>Fotos de sus mascotas</li>
                        <li>Historial de citas</li>
                    </ul>
                </div>
                
                <div>
                    <h2 class="text-xl font-bold text-gray-800 mb-3">2. Uso de la Información</h2>
                    <p class="text-gray-600 leading-relaxed">
                        Utilizamos su información personal para:
                    </p>
                    <ul class="list-disc list-inside text-gray-600 mt-2 ml-4">
                        <li>Gestionar sus citas y servicios</li>
                        <li>Comunicarnos con usted sobre sus citas</li>
                        <li>Mejorar nuestros servicios</li>
                        <li>Enviar recordatorios de citas</li>
                        <li>Personalizar la atención a sus mascotas</li>
                    </ul>
                </div>
                
                <div>
                    <h2 class="text-xl font-bold text-gray-800 mb-3">3. Protección de Datos</h2>
                    <p class="text-gray-600 leading-relaxed">
                        Implementamos medidas de seguridad técnicas y organizativas para proteger su información personal 
                        contra acceso no autorizado, pérdida o alteración. Sus datos se almacenan en servidores seguros 
                        y solo personal autorizado tiene acceso a ellos.
                    </p>
                </div>
                
                <div>
                    <h2 class="text-xl font-bold text-gray-800 mb-3">4. Compartir Información</h2>
                    <p class="text-gray-600 leading-relaxed">
                        No vendemos, alquilamos ni compartimos su información personal con terceros, excepto:
                    </p>
                    <ul class="list-disc list-inside text-gray-600 mt-2 ml-4">
                        <li>Cuando sea requerido por ley</li>
                        <li>Para proteger nuestros derechos legales</li>
                        <li>Con su consentimiento explícito</li>
                    </ul>
                </div>
                
                <div>
                    <h2 class="text-xl font-bold text-gray-800 mb-3">5. Cookies</h2>
                    <p class="text-gray-600 leading-relaxed">
                        Utilizamos cookies para mejorar su experiencia en nuestro sitio web. Las cookies nos permiten 
                        recordar sus preferencias y analizar el tráfico del sitio. Puede configurar su navegador para 
                        rechazar las cookies, pero esto puede afectar la funcionalidad del sitio.
                    </p>
                </div>
                
                <div>
                    <h2 class="text-xl font-bold text-gray-800 mb-3">6. Sus Derechos</h2>
                    <p class="text-gray-600 leading-relaxed">
                        Usted tiene derecho a:
                    </p>
                    <ul class="list-disc list-inside text-gray-600 mt-2 ml-4">
                        <li>Acceder a su información personal</li>
                        <li>Rectificar datos incorrectos</li>
                        <li>Solicitar la eliminación de sus datos</li>
                        <li>Oponerse al procesamiento de sus datos</li>
                        <li>Solicitar la portabilidad de sus datos</li>
                    </ul>
                    <p class="text-gray-600 leading-relaxed mt-2">
                        Para ejercer estos derechos, contáctenos a través de info@minihuellitas.com.
                    </p>
                </div>
                
                <div>
                    <h2 class="text-xl font-bold text-gray-800 mb-3">7. Retención de Datos</h2>
                    <p class="text-gray-600 leading-relaxed">
                        Conservamos su información personal mientras mantenga una cuenta activa con nosotros. 
                        Si elimina su cuenta, sus datos serán eliminados de nuestros sistemas activos, aunque 
                        podríamos conservar cierta información por razones legales o fiscales.
                    </p>
                </div>
                
                <div>
                    <h2 class="text-xl font-bold text-gray-800 mb-3">8. Menores de Edad</h2>
                    <p class="text-gray-600 leading-relaxed">
                        Nuestros servicios están dirigidos a mayores de 18 años. No recopilamos conscientemente 
                        información de menores de edad. Si usted es menor de edad, no debe proporcionarnos información 
                        personal sin el consentimiento de sus padres o tutores.
                    </p>
                </div>
                
                <div>
                    <h2 class="text-xl font-bold text-gray-800 mb-3">9. Cambios a esta Política</h2>
                    <p class="text-gray-600 leading-relaxed">
                        Podemos actualizar esta política de privacidad ocasionalmente. Le notificaremos sobre cambios 
                        significativos a través de nuestro sitio web o por correo electrónico.
                    </p>
                </div>
                
                <div>
                    <h2 class="text-xl font-bold text-gray-800 mb-3">10. Contacto</h2>
                    <p class="text-gray-600 leading-relaxed">
                        Si tiene preguntas sobre esta política de privacidad, puede contactarnos:
                    </p>
                    <ul class="list-none text-gray-600 mt-2 space-y-1">
                        <li><i class="fas fa-envelope text-orange-500 mr-2"></i> Email: privacidad@minihuellitas.com</li>
                        <li><i class="fas fa-phone text-orange-500 mr-2"></i> Teléfono: (55) 1234 5678</li>
                        <li><i class="fas fa-map-marker-alt text-orange-500 mr-2"></i> Dirección: Av. Principal #123, Ciudad</li>
                    </ul>
                </div>
                
                <div class="bg-orange-50 rounded-lg p-4 mt-6">
                    <p class="text-sm text-gray-600">
                        <i class="fas fa-shield-alt text-orange-500 mr-2"></i>
                        En MiniHuellitas, tu privacidad y la de tus mascotas es nuestra prioridad.
                    </p>
                </div>
                
            </div>
        </div>
        
        <div class="mt-6 text-center">
            <a href="{{ route('register') }}" class="text-orange-500 hover:underline">
                <i class="fas fa-arrow-left mr-2"></i> Volver al registro
            </a>
        </div>
        
    </div>
</div>
@endsection