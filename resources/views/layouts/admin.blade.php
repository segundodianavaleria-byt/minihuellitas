<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Admin - MiniHuellitas</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: { 'orange-custom': '#f97316' }
                }
            }
        }
    </script>
</head>
<body class="bg-gray-100 font-['Poppins']">
    <div class="flex h-screen">
        <!-- Sidebar -->
        <aside class="w-64 bg-white shadow-lg overflow-y-auto">
            <div class="p-4 border-b">
                <div class="flex items-center space-x-2">
                    <i class="fas fa-paw text-orange-custom text-2xl"></i>
                    <h1 class="text-xl font-bold">MiniHuellitas</h1>
                </div>
                <p class="text-xs text-gray-500 mt-1">Panel Admin</p>
            </div>
            <nav class="p-4 space-y-1">
                <a href="{{ route('admin.dashboard') }}" class="flex items-center space-x-3 px-4 py-2 rounded-lg hover:bg-orange-50 text-gray-700">
                    <i class="fas fa-chart-line w-5"></i> <span>Dashboard</span>
                </a>
                <a href="{{ route('admin.usuarios') }}" class="flex items-center space-x-3 px-4 py-2 rounded-lg hover:bg-orange-50 text-gray-700">
                    <i class="fas fa-users w-5"></i> <span>Usuarios</span>
                </a>
                <a href="{{ route('admin.mascotas') }}" class="flex items-center space-x-3 px-4 py-2 rounded-lg hover:bg-orange-50 text-gray-700">
                    <i class="fas fa-dog w-5"></i> <span>Mascotas</span>
                </a>
                <a href="{{ route('admin.servicios') }}" class="flex items-center space-x-3 px-4 py-2 rounded-lg hover:bg-orange-50 text-gray-700">
                    <i class="fas fa-scissors w-5"></i> <span>Servicios</span>
                </a>
                <a href="{{ route('admin.productos') }}" class="flex items-center space-x-3 px-4 py-2 rounded-lg hover:bg-orange-50 text-gray-700">
                    <i class="fas fa-box w-5"></i> <span>Productos</span>
                </a>
                <a href="{{ route('admin.citas') }}" class="flex items-center space-x-3 px-4 py-2 rounded-lg hover:bg-orange-50 text-gray-700">
                    <i class="fas fa-calendar-alt w-5"></i> <span>Citas</span>
                </a>
                <hr class="my-4">
                <a href="{{ route('home') }}" class="flex items-center space-x-3 px-4 py-2 rounded-lg hover:bg-orange-50 text-gray-700">
                    <i class="fas fa-home w-5"></i> <span>Ir al sitio</span>
                </a>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="w-full flex items-center space-x-3 px-4 py-2 rounded-lg text-red-600 hover:bg-red-50">
                        <i class="fas fa-sign-out-alt w-5"></i> <span>Cerrar Sesión</span>
                    </button>
                </form>
            </nav>
        </aside>
        
        <!-- Main Content -->
        <main class="flex-1 overflow-y-auto">
            <div class="bg-white shadow-sm px-6 py-4">
                <h2 class="text-xl font-semibold">@yield('header')</h2>
            </div>
            <div class="p-6">
                @if(session('success'))
                    <div class="mb-4 bg-green-100 border-l-4 border-green-500 text-green-700 p-4 rounded">{{ session('success') }}</div>
                @endif
                @if(session('error'))
                    <div class="mb-4 bg-red-100 border-l-4 border-red-500 text-red-700 p-4 rounded">{{ session('error') }}</div>
                @endif
                @yield('content')
            </div>
        </main>
    </div>
</body>
</html>