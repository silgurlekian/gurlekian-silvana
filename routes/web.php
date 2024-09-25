<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\NoticiaController;
use App\Http\Controllers\Admin\ProductoController as AdminProductoController;
use App\Http\Controllers\Admin\NoticiaController as AdminNoticiaController;
use Illuminate\Support\Facades\Auth;

// Ruta de la página principal
Route::get('/', function () {
    return view('index');
})->name('home');

// Rutas de autenticación generadas por Laravel UI
Auth::routes();

// Rutas públicas para productos y noticias
Route::get('/productos', [ProductoController::class, 'index'])->name('productos.index');
Route::get('/noticias', [NoticiaController::class, 'index'])->name('noticias.index');
route::get('/noticias/{id}', [NoticiaController::class, 'show'])->name('noticias.show');

// Rutas protegidas por autenticación para el panel admin de productos y noticias
Route::resource('admin.productos', AdminProductoController::class)->middleware('auth');

Route::middleware('auth')->prefix('admin')->group(function () {
    Route::resource('productos', AdminProductoController::class, ['as' => 'admin']);
    Route::resource('noticias', AdminNoticiaController::class, ['as' => 'admin']);
});
