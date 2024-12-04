<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\NoticiaController;
use App\Http\Controllers\Admin\ProductoController as AdminProductoController;
use App\Http\Controllers\Admin\NoticiaController as AdminNoticiaController;
use App\Http\Controllers\Admin\UsuarioController as UsuarioController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CarritoController;
use App\Http\Controllers\MercadoPagoController;

// Página principal
Route::get('/', function () {
    return view('index');
})->name('home');

// Rutas de autenticación
Route::controller(AuthController::class)->group(function () {
    Route::get('/register', 'showRegisterForm')->name('register');
    Route::post('/register', 'register');
    Route::get('/login', 'showLoginForm')->name('login');
    Route::post('/login', 'login');
    Route::post('/logout', 'logout')->name('logout');
});

// Rutas públicas para productos y noticias
Route::prefix('productos')->group(function () {
    Route::get('/', [ProductoController::class, 'index'])->name('productos.index');
    Route::get('/{id}', [ProductoController::class, 'show'])->name('productos.show');
});

Route::prefix('noticias')->group(function () {
    Route::get('/', [NoticiaController::class, 'index'])->name('noticias.index');
    Route::get('/{id}', [NoticiaController::class, 'show'])->name('noticias.show');
});

// Rutas protegidas para el panel de administración
Route::middleware('auth')->prefix('admin')->name('admin.')->group(function () {
    Route::middleware('App\Http\Middleware\CheckRole:admin')->group(function () {
        Route::resource('productos', AdminProductoController::class);
        Route::resource('noticias', AdminNoticiaController::class);
        Route::get('usuarios', [UsuarioController::class, 'index'])->name('usuarios.index');
        Route::get('usuarios/{id}', [UsuarioController::class, 'show'])->name('usuarios.show');
    });
});

// Rutas del perfil de usuario
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'show'])->name('profile.show');
    Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::put('/profile', [ProfileController::class, 'update'])->name('profile.update');
});

Route::middleware('auth')->prefix('carrito')->group(function () {
    Route::get('/', [CarritoController::class, 'index'])->name('carrito.index');
    Route::post('/add/{id}', [CarritoController::class, 'add'])->name('carrito.add');
    Route::put('/update/{id}', [CarritoController::class, 'update'])->name('carrito.update');  // Ruta para actualizar la cantidad
    Route::delete('/remove/{id}', [CarritoController::class, 'remove'])->name('carrito.remove');
});

Route::get('/checkout', [MercadoPagoController::class, 'checkout'])->name('checkout');
Route::get('/checkout/success', [MercadoPagoController::class, 'success'])->name('checkout.success');
Route::get('/checkout/failure', [MercadoPagoController::class, 'failure'])->name('checkout.failure');
Route::get('/checkout/pending', [MercadoPagoController::class, 'pending'])->name('checkout.pending');