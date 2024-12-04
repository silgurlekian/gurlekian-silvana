<?php

namespace App\Http\Controllers;

use App\Models\Carrito;
use App\Models\Producto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CarritoController extends Controller
{
    public function index()
    {
        $carrito = session()->get('carrito', []);

        // Si es necesario, puedes agregar la relación de productos aquí
        // Para optimizar la vista, obtienes los productos según los IDs almacenados en el carrito
        return view('carrito.index', compact('carrito'));
    }

    public function add(Request $request, $id)
    {
        $producto = Producto::findOrFail($id);
        $cantidad = $request->input('cantidad', 1); // Obtener la cantidad seleccionada

        // Aquí puedes agregar el producto al carrito (o actualizar la cantidad si ya está en el carrito)
        $carrito = session()->get('carrito', []);

        if (isset($carrito[$id])) {
            // Si el producto ya existe en el carrito, solo actualiza la cantidad
            $carrito[$id]['cantidad'] += $cantidad;
        } else {
            // Si el producto no existe en el carrito, agrégalo
            $carrito[$id] = [
                'producto' => $producto,
                'cantidad' => $cantidad
            ];
        }

        // Guardar el carrito en la sesión
        session()->put('carrito', $carrito);

        return redirect()->route('carrito.index');
    }

    public function update(Request $request, $id)
    {
        // Validar que la cantidad sea un número mayor a 0
        $request->validate([
            'cantidad' => 'required|integer|min:1',
        ]);

        // Recuperar el carrito de la sesión
        $carrito = session()->get('carrito', []);

        // Verificar si el producto existe en el carrito
        if (isset($carrito[$id])) {
            // Actualizar la cantidad
            $carrito[$id]['cantidad'] = $request->cantidad;

            // Guardar los cambios en la sesión
            session()->put('carrito', $carrito);
        }

        return redirect()->route('carrito.index')->with('success', 'Cantidad actualizada con éxito.');
    }


    public function remove($id)
    {
        // Recuperar el carrito desde la sesión
        $carrito = session()->get('carrito', []);

        // Eliminar el producto del carrito
        if (isset($carrito[$id])) {
            unset($carrito[$id]);
        }

        // Guardar el carrito actualizado en la sesión
        session()->put('carrito', $carrito);

        return redirect()->route('carrito.index')->with('success', 'Producto eliminado del carrito');
    }
}
