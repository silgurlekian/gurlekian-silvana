<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Compra; // Modelo de Compra
use Illuminate\Http\Request;

class AdminUserController extends Controller
{
    // Función para mostrar el listado de usuarios
    public function index()
    {
        $usuarios = User::all();
        return view('admin.usuarios.index', compact('usuarios'));
    }

    // Función para mostrar el detalle de un usuario y sus compras
    public function show($id)
    {
        $usuario = User::findOrFail($id);
        return view('admin.usuarios.show', compact('usuario'));
    }
}
