@extends('layouts.app')

@section('title', ' - Términos y Condiciones')

@section('content')
<div class="bg-cream min-h-screen py-12">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <div class="bg-white rounded-2xl shadow-xl overflow-hidden">
            <div class="bg-gradient-to-r from-orange-500 to-orange-600 px-6 py-4">
                <h1 class="text-2xl font-bold text-white">Términos y Condiciones</h1>
                <p class="text-orange-100">Última actualización: 01 de abril de 2026</p>
            </div>
            
            <div class="p-6 space-y-6">
                
                <div>
                    <h2 class="text-xl font-bold text-gray-800 mb-3">1. Aceptación de los Términos</h2>
                    <p class="text-gray-600 leading-relaxed">
                        Al acceder y utilizar el sitio web de MiniHuellitas, usted acepta cumplir y estar sujeto a estos 
                        Términos y Condiciones. Si no está de acuerdo con alguna parte de estos términos, no debe utilizar 
                        nuestros servicios.
                    </p>
                </div>
                
                <div>
                    <h2 class="text-xl font-bold text-gray-800 mb-3">2. Descripción del Servicio</h2>
                    <p class="text-gray-600 leading-relaxed">
                        MiniHuellitas ofrece servicios de estética canina, productos para mascotas y agendamiento de citas. 
                        Todos los productos son exclusivamente para venta en tienda física, no realizamos envíos a domicilio.
                    </p>
                </div>
                
                <div>
                    <h2 class="text-xl font-bold text-gray-800 mb-3">3. Registro de Cuenta</h2>
                    <p class="text-gray-600 leading-relaxed">
                        Para utilizar nuestros servicios de agendamiento de citas, debe crear una cuenta proporcionando 
                        información veraz y actualizada. Usted es responsable de mantener la confidencialidad de su contraseña.
                    </p>
                </div>
                
                <div>
                    <h2 class="text-xl font-bold text-gray-800 mb-3">4. Política de Citas</h2>
                    <ul class="list-disc list-inside text-gray-600 space-y-2 ml-4">
                        <li>Las citas pueden agendarse con hasta 3 meses de anticipación.</li>
                        <li>Las cancelaciones deben realizarse con al menos 24 horas de anticipación.</li>
                        <li>En caso de no presentarse sin aviso, se aplicará una penalización del 50% del servicio.</li>
                        <li>Los precios de los servicios están sujetos a cambios sin previo aviso.</li>
                    </ul>
                </div>
                
                <div>
                    <h2 class="text-xl font-bold text-gray-800 mb-3">5. Política de Privacidad</h2>
                    <p class="text-gray-600 leading-relaxed">
                        Respetamos su privacidad. La información personal que nos proporciona se utiliza únicamente para 
                        gestionar sus citas y mejorar nuestros servicios. No compartimos sus datos con terceros sin su 
                        consentimiento. Para más detalles, consulte nuestra <a href="{{ route('privacy') }}" class="text-orange-500 hover:underline">Política de Privacidad</a>.
                    </p>
                </div>
                
                <div>
                    <h2 class="text-xl font-bold text-gray-800 mb-3">6. Propiedad Intelectual</h2>
                    <p class="text-gray-600 leading-relaxed">
                        Todo el contenido de este sitio web, incluyendo textos, imágenes, logotipos y diseños, es propiedad 
                        de MiniHuellitas y está protegido por las leyes de derechos de autor.
                    </p>
                </div>
                
                <div>
                    <h2 class="text-xl font-bold text-gray-800 mb-3">7. Limitación de Responsabilidad</h2>
                    <p class="text-gray-600 leading-relaxed">
                        MiniHuellitas no se hace responsable por daños indirectos o pérdidas derivadas del uso de nuestros 
                        servicios. Nos esforzamos por brindar un servicio de calidad, pero no garantizamos resultados específicos.
                    </p>
                </div>
                
                <div>
                    <h2 class="text-xl font-bold text-gray-800 mb-3">8. Modificaciones</h2>
                    <p class="text-gray-600 leading-relaxed">
                        Nos reservamos el derecho de modificar estos términos en cualquier momento. Los cambios entrarán en 
                        vigencia inmediatamente después de su publicación en el sitio web.
                    </p>
                </div>
                
                <div>
                    <h2 class="text-xl font-bold text-gray-800 mb-3">9. Contacto</h2>
                    <p class="text-gray-600 leading-relaxed">
                        Si tiene alguna pregunta sobre estos términos, puede contactarnos a través de:
                    </p>
                    <ul class="list-none text-gray-600 mt-2 space-y-1">
                        <li><i class="fas fa-envelope text-orange-500 mr-2"></i> Email: info@minihuellitas.com</li>
                        <li><i class="fas fa-phone text-orange-500 mr-2"></i> Teléfono: (55) 1234 5678</li>
                        <li><i class="fas fa-map-marker-alt text-orange-500 mr-2"></i> Dirección: Av. Principal #123, Ciudad</li>
                    </ul>
                </div>
                
                <div class="bg-orange-50 rounded-lg p-4 mt-6">
                    <p class="text-sm text-gray-600">
                        <i class="fas fa-check-circle text-green-500 mr-2"></i>
                        Al registrarte en MiniHuellitas, aceptas estos términos y condiciones.
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