<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\NoticiaController;
use Illuminate\Support\Facades\Auth;

// Ruta de la página principal
Route::get('/', function () {
    return view('welcome');
});

// Rutas de autenticación generadas por Laravel UI
Auth::routes();

// Ruta al panel de inicio después de iniciar sesión
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Rutas protegidas por autenticación para productos y noticias
Route::resource('productos', ProductoController::class)->middleware('auth');
Route::resource('noticias', NoticiaController::class)->middleware('auth');
