<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>MiniHuellitas - Estética Canina</title>
    
    <!-- Fuentes -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    
    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        'orange-custom': '#f97316',
                        'cream': '#fff9f0',
                    },
                    animation: {
                        'bounce-slow': 'bounce 1s ease-in-out',
                        'pulse-slow': 'pulse 2s cubic-bezier(0.4, 0, 0.6, 1) infinite',
                    }
                }
            }
        }
    </script>
    
    <style>
        body {
            font-family: 'Poppins', sans-serif;
        }
        .btn-effect {
            transition: all 0.3s ease;
        }
        .btn-effect:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 25px -5px rgba(249, 115, 22, 0.3);
        }
        html {
            scroll-behavior: smooth;
        }
        [x-cloak] {
            display: none !important;
        }
    </style>
    
    @stack('styles')
</head>
<script>
    // Detectar cuando el usuario usa el botón "atrás" después de cerrar sesión
    window.addEventListener('pageshow', function(event) {
        // Si la página viene de la caché del navegador (botón atrás)
        if (event.persisted) {
            // Verificar si el usuario ya no está autenticado
            fetch('{{ route("check.auth") }}')
                .then(response => response.json())
                .then(data => {
                    if (!data.authenticated) {
                        // Redirigir al login si no está autenticado
                        window.location.href = '{{ route("login") }}';
                    }
                })
                .catch(() => {
                    window.location.href = '{{ route("login") }}';
                });
        }
    });
</script>
<script>
    // ✅ VERIFICAR SESIÓN ACTIVA AL CARGAR LA PÁGINA
    function verificarSesion() {
        fetch('{{ route("check.session") }}', {
            method: 'GET',
            headers: {
                'X-Requested-With': 'XMLHttpRequest',
                'Content-Type': 'application/json'
            }
        })
        .then(response => response.json())
        .then(data => {
            if (!data.authenticated && window.location.pathname !== '/login' && window.location.pathname !== '/register') {
                // Si no hay sesión y no está en login/register, redirigir al login
                window.location.href = '{{ route("login") }}';
            }
        })
        .catch(() => {
            if (window.location.pathname !== '/login' && window.location.pathname !== '/register') {
                window.location.href = '{{ route("login") }}';
            }
        });
    }
    
    // Ejecutar verificación cada 30 segundos
    setInterval(verificarSesion, 30000);
    
    // Verificar al cargar la página
    document.addEventListener('DOMContentLoaded', verificarSesion);
</script>
<body class="bg-cream">

<!-- Spinner de carga centrado -->
<div id="loading-spinner" class="fixed inset-0 bg-white z-[9999] flex items-center justify-center">
    <div class="text-center">
        <div class="relative w-32 h-32 mx-auto">
            <div class="absolute inset-0 border-4 border-orange-200 rounded-full animate-pulse"></div>
            <div class="absolute inset-0 border-4 border-orange-500 rounded-full animate-spin border-t-transparent"></div>
            <div class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2">
                <i class="fas fa-paw text-orange-500 text-4xl animate-bounce"></i>
            </div>
        </div>
        <h2 class="mt-4 text-2xl font-bold text-gray-800">MiniHuellitas</h2>
        <p class="text-gray-500">Cargando...</p>
        <div class="flex justify-center mt-4 space-x-1">
            <div class="w-2 h-2 bg-orange-500 rounded-full animate-bounce" style="animation-delay: 0s"></div>
            <div class="w-2 h-2 bg-orange-500 rounded-full animate-bounce" style="animation-delay: 0.2s"></div>
            <div class="w-2 h-2 bg-orange-500 rounded-full animate-bounce" style="animation-delay: 0.4s"></div>
        </div>
    </div>
</div>

<script>
    setTimeout(function() {
        const spinner = document.getElementById('loading-spinner');
        if (spinner) {
            spinner.style.opacity = '0';
            setTimeout(function() {
                spinner.style.display = 'none';
            }, 500);
        }
    }, 1500);
</script>

<style>
    @keyframes spin {
        from { transform: rotate(0deg); }
        to { transform: rotate(360deg); }
    }
    @keyframes bounce {
        0%, 100% { transform: translateY(-25%); animation-timing-function: cubic-bezier(0.8, 0, 1, 1); }
        50% { transform: translateY(0); animation-timing-function: cubic-bezier(0, 0, 0.2, 1); }
    }
    @keyframes pulse {
        0%, 100% { opacity: 1; }
        50% { opacity: .5; }
    }
    .animate-spin { animation: spin 1s linear infinite; }
    .animate-bounce { animation: bounce 1s infinite; }
    .animate-pulse { animation: pulse 2s cubic-bezier(0.4, 0, 0.6, 1) infinite; }
</style>

    <!-- BARRA DE NAVEGACIÓN -->
    <nav class="bg-white shadow-lg sticky top-0 z-50 transition-all duration-300">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center h-20">
                
                <!-- LOGO -->
                <div class="flex items-center space-x-3 cursor-pointer group" onclick="window.location='{{ route('home') }}'">
                    <i class="fas fa-paw text-orange-custom text-3xl group-hover:animate-bounce-slow transition-all"></i>
                    <div>
                        <h1 class="text-2xl font-bold bg-gradient-to-r from-orange-600 to-orange-400 bg-clip-text text-transparent">
                            MiniHuellitas
                        </h1>
                        <p class="text-xs text-gray-500">Amor y cuidado para tu mejor amigo</p>
                    </div>
                </div>
                
                <!-- MENÚ DESKTOP -->
                <div class="hidden md:flex items-center space-x-8">
                    <a href="{{ route('home') }}" class="text-gray-700 hover:text-orange-custom transition-colors font-medium relative group">
                        Inicio
                        <span class="absolute bottom-0 left-0 w-0 h-0.5 bg-orange-custom transition-all duration-300 group-hover:w-full"></span>
                    </a>
                    <a href="{{ route('servicios.index') }}" class="text-gray-700 hover:text-orange-custom transition-colors font-medium relative group">
                        Servicios
                        <span class="absolute bottom-0 left-0 w-0 h-0.5 bg-orange-custom transition-all duration-300 group-hover:w-full"></span>
                    </a>
                    <a href="{{ route('productos.index') }}" class="text-gray-700 hover:text-orange-custom transition-colors font-medium relative group">
                        Productos
                        <span class="absolute bottom-0 left-0 w-0 h-0.5 bg-orange-custom transition-all duration-300 group-hover:w-full"></span>
                    </a>
                    <a href="{{ route('nosotros') }}" class="text-gray-700 hover:text-orange-custom transition-colors font-medium relative group">
                        Nosotros
                        <span class="absolute bottom-0 left-0 w-0 h-0.5 bg-orange-custom transition-all duration-300 group-hover:w-full"></span>
                    </a>
                    <a href="{{ route('contacto') }}" class="text-gray-700 hover:text-orange-custom transition-colors font-medium relative group">
                        Contacto
                        <span class="absolute bottom-0 left-0 w-0 h-0.5 bg-orange-custom transition-all duration-300 group-hover:w-full"></span>
                    </a>
                </div>
                
                <!-- BOTONES DE ACCIÓN -->
<div class="flex items-center space-x-4">
    @auth
        <div class="relative">
            <button onclick="toggleMenu()" class="flex items-center space-x-2 bg-orange-custom text-white px-4 py-2 rounded-full hover:bg-orange-600 transition-all btn-effect">
                <i class="fas fa-user"></i>
                <span>{{ Auth::user()->name }}</span>
                <i class="fas fa-chevron-down text-xs"></i>
            </button>
            <div id="userMenu" class="absolute right-0 mt-2 w-48 bg-white rounded-lg shadow-xl py-2 hidden z-50">
                <a href="{{ route('profile.index') }}" class="block px-4 py-2 text-gray-700 hover:bg-orange-50 hover:text-orange-custom">
                    <i class="fas fa-user-circle mr-2"></i> Mi Perfil
                </a>
                <a href="{{ route('mascotas.index') }}" class="block px-4 py-2 text-gray-700 hover:bg-orange-50 hover:text-orange-custom">
                    <i class="fas fa-dog mr-2"></i> Mis Mascotas
                </a>
                <a href="{{ route('citas.index') }}" class="block px-4 py-2 text-gray-700 hover:bg-orange-50 hover:text-orange-custom">
                    <i class="fas fa-calendar-alt mr-2"></i> Mis Citas
                </a>
                <hr class="my-1">
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="w-full text-left px-4 py-2 text-red-600 hover:bg-red-50">
                        <i class="fas fa-sign-out-alt mr-2"></i> Cerrar Sesión
                    </button>
                </form>
            </div>
        </div>
    @else
        <a href="{{ route('login') }}" class="text-gray-700 hover:text-orange-custom transition-colors">
            Iniciar Sesión
        </a>
        <a href="{{ route('register') }}" class="bg-orange-custom text-white px-5 py-2 rounded-full hover:bg-orange-600 transition-all btn-effect">
            <i class="fas fa-paw mr-2"></i>Registrarse
        </a>
    @endauth
</div>
                <!-- BOTÓN MENÚ MÓVIL -->
                <button class="md:hidden text-gray-700" id="menuBtn">
                    <i class="fas fa-bars text-2xl"></i>
                </button>
            </div>
        </div>
        
        <!-- MENÚ MÓVIL -->
        <div id="mobileMenu" class="md:hidden hidden bg-white border-t">
            <div class="px-4 py-2 space-y-1">
                <a href="{{ route('home') }}" class="block py-2 text-gray-700 hover:text-orange-custom">Inicio</a>
                <a href="{{ route('servicios.index') }}" class="block py-2 text-gray-700 hover:text-orange-custom">Servicios</a>
                <a href="{{ route('productos.index') }}" class="block py-2 text-gray-700 hover:text-orange-custom">Productos</a>
                <a href="{{ route('nosotros') }}" class="block py-2 text-gray-700 hover:text-orange-custom">Nosotros</a>
                <a href="{{ route('contacto') }}" class="block py-2 text-gray-700 hover:text-orange-custom">Contacto</a>
            </div>
        </div>
    </nav>
    
    <!-- CONTENIDO PRINCIPAL -->
    <main>
        @yield('content')
    </main>
    
    <!-- FOOTER -->
    <footer class="bg-gray-900 text-white mt-20">
        <div class="max-w-7xl mx-auto px-4 py-12">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
                <div>
                    <div class="flex items-center space-x-2 mb-4">
                        <i class="fas fa-paw text-orange-custom text-2xl"></i>
                        <h3 class="text-xl font-bold">MiniHuellitas</h3>
                    </div>
                    <p class="text-gray-400">Cuidamos a tu mejor amigo con amor y profesionalismo.</p>
                </div>
                
                <div>
                    <h4 class="text-lg font-semibold mb-4">Enlaces Rápidos</h4>
                    <ul class="space-y-2">
                        <li><a href="{{ route('servicios.index') }}" class="text-gray-400 hover:text-orange-custom transition-colors">Servicios</a></li>
                        <li><a href="{{ route('productos.index') }}" class="text-gray-400 hover:text-orange-custom transition-colors">Productos</a></li>
                        <li><a href="{{ route('nosotros') }}" class="text-gray-400 hover:text-orange-custom transition-colors">Nosotros</a></li>
                        <li><a href="{{ route('contacto') }}" class="text-gray-400 hover:text-orange-custom transition-colors">Contacto</a></li>
                    </ul>
                </div>
                
                <div>
                    <h4 class="text-lg font-semibold mb-4">Horario</h4>
                    <ul class="space-y-2 text-gray-400">
                        <li>Lunes a Viernes: 9:00 - 20:00</li>
                        <li>Sábados: 9:00 - 18:00</li>
                        <li>Domingos: Cerrado</li>
                    </ul>
                </div>
                
                <div>
                    <h4 class="text-lg font-semibold mb-4">Síguenos</h4>
                    <div class="flex space-x-4">
                        <a href="#" class="text-gray-400 hover:text-orange-custom transition-colors text-2xl transform hover:scale-110 inline-block">
                            <i class="fab fa-facebook"></i>
                        </a>
                        <a href="#" class="text-gray-400 hover:text-orange-custom transition-colors text-2xl transform hover:scale-110 inline-block">
                            <i class="fab fa-instagram"></i>
                        </a>
                        <a href="#" class="text-gray-400 hover:text-orange-custom transition-colors text-2xl transform hover:scale-110 inline-block">
                            <i class="fab fa-whatsapp"></i>
                        </a>
                    </div>
                </div>
            </div>
            
            <div class="border-t border-gray-800 mt-8 pt-8 text-center text-gray-400">
                <p>&copy; 2024 MiniHuellitas. Todos los derechos reservados.</p>
            </div>
        </div>
    </footer>
    
    <!-- AVISO DE COOKIES -->
    <div id="cookieConsent" class="fixed bottom-0 left-0 right-0 bg-gray-900 text-white p-4 shadow-lg z-50 transform translate-y-0 transition-transform duration-500" style="display: none;">
        <div class="max-w-7xl mx-auto px-4 flex flex-col sm:flex-row items-center justify-between gap-4">
            <div class="flex items-center gap-3">
                <i class="fas fa-cookie-bite text-orange-500 text-2xl"></i>
                <p class="text-sm text-gray-300">
                    Utilizamos cookies para mejorar tu experiencia en nuestro sitio web. 
                    Al continuar navegando, aceptas nuestra 
                    <a href="{{ route('privacy') }}" class="text-orange-500 hover:underline">Política de Privacidad</a>.
                </p>
            </div>
            <div class="flex gap-3">
                <button id="acceptCookies" class="bg-orange-500 text-white px-6 py-2 rounded-full text-sm hover:bg-orange-600 transition-all btn-effect">
                    Aceptar
                </button>
                <button id="rejectCookies" class="border border-gray-600 text-gray-300 px-6 py-2 rounded-full text-sm hover:bg-gray-800 transition-all">
                    Rechazar
                </button>
            </div>
        </div>
    </div>

    <!-- JavaScript -->
    <script>
        document.addEventListener('DOMContentLoaded', function () {

            // =========================
            // 🔽 MENÚ USUARIO
            // =========================
            window.toggleMenu = function () {
                const menu = document.getElementById('userMenu');
                if (menu) menu.classList.toggle('hidden');
            }

            document.addEventListener('click', function (e) {
                const menu = document.getElementById('userMenu');
                const button = e.target.closest('[onclick="toggleMenu()"]');

                if (menu && !e.target.closest('#userMenu') && !button) {
                    menu.classList.add('hidden');
                }
            });

            // =========================
            // 🍪 COOKIES
            // =========================
            function setCookie(name, value, days) {
                let expires = "";
                if (days) {
                    const date = new Date();
                    date.setTime(date.getTime() + (days * 24 * 60 * 60 * 1000));
                    expires = "; expires=" + date.toUTCString();
                }
                document.cookie = name + "=" + value + expires + "; path=/";
            }

            function getCookie(name) {
                const nameEQ = name + "=";
                const ca = document.cookie.split(';');
                for (let c of ca) {
                    while (c.charAt(0) === ' ') c = c.substring(1);
                    if (c.indexOf(nameEQ) === 0) return c.substring(nameEQ.length);
                }
                return null;
            }

            const cookieConsent = document.getElementById('cookieConsent');
            const cookieChoice = getCookie('cookie_consent');

            if (cookieConsent && !cookieChoice) {
                cookieConsent.style.display = 'block';
            }

            document.getElementById('acceptCookies')?.addEventListener('click', function () {
                setCookie('cookie_consent', 'accepted', 365);
                cookieConsent.style.display = 'none';
            });

            document.getElementById('rejectCookies')?.addEventListener('click', function () {
                setCookie('cookie_consent', 'rejected', 30);
                cookieConsent.style.display = 'none';
            });

            // =========================
            // 🔥 BLOQUEAR DOBLE SUBMIT
            // =========================
            document.querySelectorAll('form').forEach(form => {

                form.addEventListener('submit', function (event) {

                    if (form.dataset.submitted === "true") {
                        event.preventDefault();
                        return;
                    }

                    form.dataset.submitted = "true";

                    const boton = form.querySelector('button[type="submit"], input[type="submit"]');

                    if (boton) {
                        boton.disabled = true;
                        boton.style.opacity = "0.6";

                        if (!boton.dataset.originalText) {
                            boton.dataset.originalText = boton.innerHTML;
                            boton.innerHTML = "Procesando...";
                        }
                    }

                });

            });

            // =========================
            // 🔥 BLOQUEAR DOBLE CLICK EN LINKS
            // =========================
            document.addEventListener('click', function (e) {

                // permitir cookies siempre
                const cookieBtn = e.target.closest('#acceptCookies, #rejectCookies');

                if (cookieBtn) {

                    if (cookieBtn.dataset.clicked === "true") {
                        e.preventDefault();
                        return;
                    }

                    cookieBtn.dataset.clicked = "true";
                    return;
                }

                const link = e.target.closest('a');

                if (!link) return;

                if (link.dataset.clicked === "true") {
                    e.preventDefault();
                    return;
                }

                link.dataset.clicked = "true";

                setTimeout(() => {
                    link.dataset.clicked = "false";
                }, 2000);

            });

        });
    </script>
    
    @stack('scripts')

    @livewireScripts
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
</body>
</html>