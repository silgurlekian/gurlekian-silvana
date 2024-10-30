<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\NoticiaController;
use App\Http\Controllers\Admin\ProductoController as AdminProductoController;
use App\Http\Controllers\Admin\NoticiaController as AdminNoticiaController;
use App\Http\Controllers\Admin\UsuarioController as UsuarioController;
use App\Http\Controllers\AuthController;

// Ruta de la página principal
Route::get('/', function () {
    return view('index');
})->name('home');

// Rutas de autenticación
Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
Route::post('/register', [AuthController::class, 'register']);

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Rutas públicas para productos y noticias
Route::get('/productos', [ProductoController::class, 'index'])->name('productos.index');
Route::get('/productos/{id}', [ProductoController::class, 'show'])->name('productos.show');

Route::get('/noticias', [NoticiaController::class, 'index'])->name('noticias.index');
Route::get('/noticias/{id}', [NoticiaController::class, 'show'])->name('noticias.show');

// Rutas protegidas por autenticación para el panel admin de productos y noticias
Route::middleware('auth')->prefix('admin')->group(function () {
    Route::resource('productos', AdminProductoController::class, ['as' => 'admin']);
    Route::resource('noticias', AdminNoticiaController::class, ['as' => 'admin']);
});

Route::middleware('auth')->prefix('admin')->group(function () {
    Route::get('/usuarios', [UsuarioController::class, 'index'])->name('admin.usuarios.index');
    Route::get('/usuarios/{id}', [UsuarioController::class, 'show'])->name('admin.usuarios.show');
});

