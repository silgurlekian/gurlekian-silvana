<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function show()
    {
        $user = Auth::user();  // Obtener el usuario autenticado
        return view('profile.index', compact('user'));  // Mostrar la vista con los datos del usuario
    }

    public function edit()
    {
        $user = Auth::user();  // Obtener el usuario autenticado
        return view('profile.edit', compact('user'));  // Mostrar la vista para editar el perfil
    }

    public function update(Request $request)
    {
        // Verificar si el usuario está autenticado
        $user = Auth::user();
        if (!$user) {
            return redirect()->route('login')->with('error', 'Por favor, inicie sesión para continuar.');
        }

        // Validar los datos del formulario
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users,email,' . Auth::id(),
        ]);

        // Actualizar los datos del usuario autenticado
        try {
            // Asegurarse de que $user es una instancia de User
            if ($user instanceof \App\Models\User) {
                // Actualizar los campos del usuario
                $user->update($request->only(['name', 'email']));
            } else {
                // Manejar el error si no es una instancia de User
                return redirect()->route('profile.edit')->with('error', 'Error al actualizar perfil.');
            }

            // Redirigir con un mensaje de éxito
            return redirect()->route('profile.edit')->with('success', 'Perfil actualizado correctamente.');
        } catch (\Exception $e) {
            // Si ocurre un error, mostrarlo
            return redirect()->route('profile.edit')->with('error', 'Hubo un error al actualizar el perfil: ' . $e->getMessage());
        }
    }
}
