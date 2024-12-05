<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Compra;

class ProfileController extends Controller
{
    public function show()
    {
        $user = Auth::user();  // Obtener el usuario autenticado
        $compras = Compra::where('user_id', $user->id)->with('producto')->get(); // Obtener historial de compras

        return view('profile.index', compact('user', 'compras'));  // Mostrar la vista con los datos del usuario y las compras
    }

    public function edit()
    {
        $user = Auth::user();
        return view('profile.edit', compact('user'));
    }

    public function update(Request $request)
    {
        // Verificar si el usuario está autenticado
        $user = Auth::user();
        if (!$user) {
            return redirect()->route('login')->with('error', 'Por favor, inicie sesión para continuar.');
        }

        // Mensajes personalizados de validación
        $messages = [
            'name.required' => 'El nombre es obligatorio.',
            'name.string' => 'El nombre debe ser una cadena de texto válida.',
            'name.max' => 'El nombre no puede superar los 255 caracteres.',
            'email.required' => 'El correo electrónico es obligatorio.',
            'email.email' => 'Por favor, ingrese una dirección de correo electrónico válida.',
            'email.max' => 'El correo electrónico no puede superar los 255 caracteres.',
            'email.unique' => 'Este correo electrónico ya está registrado.',
        ];

        // Validar los datos del formulario con mensajes personalizados
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users,email,' . Auth::id(),
        ], $messages);

        // Actualizar los datos del usuario autenticado
        try {
            if ($user instanceof \App\Models\User) {
                $user->update($request->only(['name', 'email']));
            } else {
                return redirect()->route('profile.edit')->with('error', 'Error al actualizar perfil.');
            }

            return redirect()->route('profile.edit')->with('success', 'Perfil actualizado correctamente.');
        } catch (\Exception $e) {
            return redirect()->route('profile.edit')->with('error', 'Hubo un error al actualizar el perfil: ' . $e->getMessage());
        }
    }
}
