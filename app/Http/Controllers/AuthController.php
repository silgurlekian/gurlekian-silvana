<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash; 
use App\Models\User;

class AuthController extends Controller
{
    public function showRegisterForm()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {
        // Validaciones
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ], [
            'name.required' => 'Por favor, ingresa tu nombre.',
            'email.required' => 'El correo electrónico es obligatorio.',
            'email.email' => 'Por favor, ingresa un correo electrónico válido.',
            'email.unique' => 'Este correo electrónico ya está en uso.',
            'password.required' => 'La contraseña es obligatoria.',
            'password.min' => 'La contraseña debe tener al menos :min caracteres.',
            'password.confirmed' => 'Las contraseñas no coinciden.',
        ]);

        // Creación del usuario con rol "user"
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            // Usar Hash para hashear la contraseña
            'password' => Hash::make($request->password),
            'role' => 'user', // Asigna el rol predeterminado
        ]);

        // Redirige con mensaje de éxito
        return redirect()->route('login')->with('success', 'Registro exitoso. Puedes iniciar sesión.');
    }

    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        // Validaciones
        $request->validate([
            'email' => 'required|string|email|max:255',
            'password' => 'required|string|min:6',
        ], [
            'email.required' => 'El correo electrónico es obligatorio.',
            'email.email' => 'Por favor, ingresa un correo electrónico válido.',
            'password.required' => 'La contraseña es obligatoria.',
        ]);

        // Intento de inicio de sesión
        if (Auth::attempt($request->only('email', 'password'))) {
            // Redirigir según el rol del usuario
            if (Auth::user()->role === 'admin') {
                return redirect()->route('admin.dashboard')->with('success', 'Has iniciado sesión como administrador.');
            }

            return redirect()->route('home')->with('success', 'Has iniciado sesión exitosamente.');
        }

        return redirect()->back()->with('error', 'Credenciales incorrectas. Intenta de nuevo.');
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('login')->with('success', 'Has cerrado sesión exitosamente.');
    }
}