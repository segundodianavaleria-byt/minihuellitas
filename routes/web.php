<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\Frontend\ServicioController;
use App\Http\Controllers\Frontend\ProductoController;
use App\Http\Controllers\Frontend\CitaController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\MascotaController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\CookieController;

// ==================== RUTAS PÚBLICAS ====================
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/nosotros', [HomeController::class, 'nosotros'])->name('nosotros');
Route::get('/contacto', [HomeController::class, 'contacto'])->name('contacto');
Route::post('/contacto', [HomeController::class, 'enviarContacto'])->name('contacto.enviar');

// Catálogos
Route::get('/servicios', [ServicioController::class, 'index'])->name('servicios.index');
Route::get('/servicios/{servicio}', [ServicioController::class, 'show'])->name('servicios.show');
Route::get('/productos', [ProductoController::class, 'index'])->name('productos.index');
Route::get('/productos/{producto}', [ProductoController::class, 'show'])->name('productos.show');

// Registro personalizado
Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register']);

// Rutas protegidas (requieren login, sin caché y con timeout)
Route::middleware(['auth', 'nocache', 'session.timeout'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/perfil', [ProfileController::class, 'index'])->name('profile.index');
    Route::put('/perfil', [ProfileController::class, 'update'])->name('profile.update');
    Route::put('/perfil/password', [ProfileController::class, 'updatePassword'])->name('profile.password');
    Route::resource('mascotas', MascotaController::class);
    Route::get('/citas', [CitaController::class, 'index'])->name('citas.index');
    Route::get('/citas/create', [CitaController::class, 'create'])->name('citas.create');
    Route::post('/citas', [CitaController::class, 'store'])->name('citas.store');
    Route::get('/citas/{cita}', [CitaController::class, 'show'])->name('citas.show');
    Route::put('/citas/{cita}/cancel', [CitaController::class, 'cancel'])->name('citas.cancel');
});

// ==================== PANEL DE ADMINISTRACIÓN (UNA SOLA VERSIÓN) ====================
Route::middleware(['auth', 'admin'])->prefix('admin')->name('admin.')->group(function () {
    
    // Dashboard
    Route::get('/', [App\Http\Controllers\Admin\DashboardAdminController::class, 'index'])->name('dashboard');
    
    // Usuarios
    Route::get('/usuarios', [App\Http\Controllers\Admin\UsuarioAdminController::class, 'index'])->name('usuarios');
    Route::get('/usuarios/{usuario}', [App\Http\Controllers\Admin\UsuarioAdminController::class, 'show'])->name('usuarios.show');
    Route::delete('/usuarios/{usuario}', [App\Http\Controllers\Admin\UsuarioAdminController::class, 'destroy'])->name('usuarios.destroy');
    Route::post('/usuarios/{usuario}/restore', [App\Http\Controllers\Admin\UsuarioAdminController::class, 'restore'])->name('usuarios.restore');
    Route::delete('/usuarios/{usuario}/force', [App\Http\Controllers\Admin\UsuarioAdminController::class, 'forceDelete'])->name('usuarios.forceDelete');
    
    // Mascotas
    Route::get('/mascotas', [App\Http\Controllers\Admin\MascotaAdminController::class, 'index'])->name('mascotas');
    Route::get('/mascotas/{mascota}', [App\Http\Controllers\Admin\MascotaAdminController::class, 'show'])->name('mascotas.show');
    Route::delete('/mascotas/{mascota}', [App\Http\Controllers\Admin\MascotaAdminController::class, 'destroy'])->name('mascotas.destroy');
    Route::post('/mascotas/{mascota}/restore', [App\Http\Controllers\Admin\MascotaAdminController::class, 'restore'])->name('mascotas.restore');
    Route::delete('/mascotas/{mascota}/force', [App\Http\Controllers\Admin\MascotaAdminController::class, 'forceDelete'])->name('mascotas.forceDelete');
    
    // Servicios
    Route::get('/servicios', [App\Http\Controllers\Admin\ServicioAdminController::class, 'index'])->name('servicios');
    Route::get('/servicios/create', [App\Http\Controllers\Admin\ServicioAdminController::class, 'create'])->name('servicios.create');
    Route::post('/servicios', [App\Http\Controllers\Admin\ServicioAdminController::class, 'store'])->name('servicios.store');
    Route::get('/servicios/{servicio}/edit', [App\Http\Controllers\Admin\ServicioAdminController::class, 'edit'])->name('servicios.edit');
    Route::put('/servicios/{servicio}', [App\Http\Controllers\Admin\ServicioAdminController::class, 'update'])->name('servicios.update');
    Route::delete('/servicios/{servicio}', [App\Http\Controllers\Admin\ServicioAdminController::class, 'destroy'])->name('servicios.destroy');
    Route::post('/servicios/{servicio}/restore', [App\Http\Controllers\Admin\ServicioAdminController::class, 'restore'])->name('servicios.restore');
    Route::delete('/servicios/{servicio}/force', [App\Http\Controllers\Admin\ServicioAdminController::class, 'forceDelete'])->name('servicios.forceDelete');
    Route::post('/servicios/{servicio}/toggle', [App\Http\Controllers\Admin\ServicioAdminController::class, 'toggle'])->name('servicios.toggle');
    
    // Productos
    Route::get('/productos', [App\Http\Controllers\Admin\ProductoAdminController::class, 'index'])->name('productos');
    Route::get('/productos/create', [App\Http\Controllers\Admin\ProductoAdminController::class, 'create'])->name('productos.create');
    Route::post('/productos', [App\Http\Controllers\Admin\ProductoAdminController::class, 'store'])->name('productos.store');
    Route::get('/productos/{producto}/edit', [App\Http\Controllers\Admin\ProductoAdminController::class, 'edit'])->name('productos.edit');
    Route::put('/productos/{producto}', [App\Http\Controllers\Admin\ProductoAdminController::class, 'update'])->name('productos.update');
    Route::delete('/productos/{producto}', [App\Http\Controllers\Admin\ProductoAdminController::class, 'destroy'])->name('productos.destroy');
    Route::post('/productos/{producto}/restore', [App\Http\Controllers\Admin\ProductoAdminController::class, 'restore'])->name('productos.restore');
    Route::delete('/productos/{producto}/force', [App\Http\Controllers\Admin\ProductoAdminController::class, 'forceDelete'])->name('productos.forceDelete');
    Route::post('/productos/{producto}/stock', [App\Http\Controllers\Admin\ProductoAdminController::class, 'updateStock'])->name('productos.stock');
    
    // Citas
    Route::get('/citas', [App\Http\Controllers\Admin\CitaAdminController::class, 'index'])->name('citas');
    Route::get('/citas/{cita}', [App\Http\Controllers\Admin\CitaAdminController::class, 'show'])->name('citas.show');
    Route::put('/citas/{cita}/estado', [App\Http\Controllers\Admin\CitaAdminController::class, 'updateEstado'])->name('citas.estado');
    Route::delete('/citas/{cita}', [App\Http\Controllers\Admin\CitaAdminController::class, 'destroy'])->name('citas.destroy');
    Route::post('/citas/{cita}/restore', [App\Http\Controllers\Admin\CitaAdminController::class, 'restore'])->name('citas.restore');
    Route::delete('/citas/{cita}/force', [App\Http\Controllers\Admin\CitaAdminController::class, 'forceDelete'])->name('citas.forceDelete');
});
use App\Http\Controllers\LegalController;

// ==================== RUTAS LEGALES ====================
Route::get('/terminos-y-condiciones', [LegalController::class, 'terms'])->name('terms');
Route::get('/politica-de-privacidad', [LegalController::class, 'privacy'])->name('privacy');


// Ruta para política de cookies
Route::get('/politica-de-cookies', [CookieController::class, 'index'])->name('cookies');

// Rutas de autenticación
require __DIR__.'/auth.php';


// Limpiar mensaje persistente (para el botón Aceptar)
Route::post('/limpiar-mensaje', function () {
    session()->forget('success_persistente');
    return response()->json(['success' => true]);
})->name('limpiar.mensaje')->middleware('auth');


Route::get('/check-auth', function () {
    return response()->json(['authenticated' => Auth::check()]);
})->name('check.auth');

Route::get('/check-session', function () {
    return response()->json(['authenticated' => Auth::check()]);
})->name('check.session');