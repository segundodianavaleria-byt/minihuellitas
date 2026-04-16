@extends('layouts.app')

@section('title', ' - Iniciar Sesión')

@section('content')
<div class="min-h-screen bg-gradient-to-br from-orange-50 to-cream flex items-center justify-center py-12 px-4 sm:px-6 lg:px-8">
    <div class="max-w-md w-full space-y-8">
        <!-- Logo y bienvenida -->
        <div class="text-center">
            <div class="flex justify-center">
                <div class="relative">
                    <div class="w-20 h-20 bg-orange-500 rounded-full flex items-center justify-center animate-bounce">
                        <i class="fas fa-paw text-white text-3xl"></i>
                    </div>
                    <div class="absolute -top-1 -right-1 w-3 h-3 bg-orange-300 rounded-full animate-ping"></div>
                </div>
            </div>
            <h2 class="mt-6 text-3xl font-extrabold text-gray-900">¡Bienvenido de vuelta!</h2>
            <p class="mt-2 text-sm text-gray-600">
                Inicia sesión para acceder a tu cuenta
            </p>
        </div>
        
        <div class="bg-white rounded-2xl shadow-xl p-8">
            <form method="POST" action="{{ route('login') }}" id="loginForm">
                @csrf
                
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-semibold mb-2">Correo electrónico</label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <i class="fas fa-envelope text-gray-400"></i>
                        </div>
                        <input type="email" name="email" value="{{ old('email') }}" 
                            class="pl-10 w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-orange-500 focus:ring-2 focus:ring-orange-200 @error('email') border-red-500 @enderror" 
                            required autofocus>
                    </div>
                    @error('email') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                </div>
                
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-semibold mb-2">Contraseña</label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <i class="fas fa-lock text-gray-400"></i>
                        </div>
                        <input type="password" name="password" 
                            class="pl-10 w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-orange-500 focus:ring-2 focus:ring-orange-200 @error('password') border-red-500 @enderror" 
                            required>
                    </div>
                    @error('password') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                </div>
                
                <div class="flex items-center justify-between mb-6">
                    <div class="flex items-center">
                        <input type="checkbox" name="remember" id="remember" class="w-4 h-4 text-orange-500 border-gray-300 rounded focus:ring-orange-500">
                        <label for="remember" class="ml-2 text-sm text-gray-600">Recordarme</label>
                    </div>
                    <a href="{{ route('password.request') }}" class="text-sm text-orange-500 hover:underline">¿Olvidaste tu contraseña?</a>
                </div>
                
                <button type="submit" id="submitBtn" class="w-full bg-orange-500 text-white py-3 rounded-lg font-semibold hover:bg-orange-600 transition-all btn-effect flex items-center justify-center">
                    <i class="fas fa-paw mr-2"></i>
                    Iniciar Sesión
                </button>
                
                <div class="text-center mt-4">
                    <p class="text-sm text-gray-600">
                        ¿No tienes una cuenta? 
                        <a href="{{ route('register') }}" class="text-orange-500 hover:underline font-semibold">Regístrate aquí</a>
                    </p>
                </div>
            </form>
        </div>
        
        <!-- Mensaje motivacional -->
        <div class="text-center mt-6">
            <p class="text-xs text-gray-500">
                <i class="fas fa-heart text-orange-500"></i> ¡Tu mejor amigo merece lo mejor!
            </p>
        </div>
    </div>
</div>

<script>
document.getElementById('loginForm').addEventListener('submit', function(e) {
    const submitBtn = document.getElementById('submitBtn');
    if (submitBtn.disabled) {
        e.preventDefault();
        return false;
    }
    submitBtn.disabled = true;
    submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin mr-2"></i> Iniciando sesión...';
    return true;
});
</script>
@endsection