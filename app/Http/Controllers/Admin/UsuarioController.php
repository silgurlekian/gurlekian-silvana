<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;

class UsuarioController extends Controller
{
    // Método para mostrar la lista de usuarios
    public function index()
    {
        // Obtener todos los usuarios
        $usuarios = User::all();

        // Retornar la vista con la lista de usuarios
        return view('admin.usuarios.index', compact('usuarios'));
    }

    // Método para mostrar el detalle de un usuario
    public function show($id)
    {
        // Cargar el usuario con sus compras y los productos relacionados
        $usuario = User::with('compras.producto')->findOrFail($id);

        return view('admin.usuarios.show', compact('usuario'));
    }
}
