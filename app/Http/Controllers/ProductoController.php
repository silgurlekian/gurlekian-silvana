<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use Illuminate\Http\Request;

class ProductoController extends Controller
{
    public function index()
    {
        $productos = Producto::all();
        return view('productos.index', compact('productos'));
    }

    public function create()
    {
        return view('productos.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'descripcion' => 'required|string',
            'variedad' => 'required|string|max:255',
            'bodega' => 'required|string|max:255',
            'precio' => 'required|numeric',
            'cantidad' => 'required|integer',
            'imagen' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $producto = new Producto($request->all());

        if ($request->hasFile('imagen')) {
            $nombreImagen = time() . '.' . $request->file('imagen')->getClientOriginalExtension();
            $request->file('imagen')->move(public_path('images'), $nombreImagen);
            $producto->imagen = 'images/' . $nombreImagen;
        }

        $producto->save();

        return redirect()->route('productos.index')->with('success', 'Producto creado exitosamente.');
    }

    public function edit($id)
    {
        $producto = Producto::findOrFail($id);
        return view('productos.edit', compact('producto'));
    }

    public function update(Request $request, $id)
    {
        // Validación de datos
        $request->validate([
            'nombre' => 'required|string|max:255',
            'descripcion' => 'required|string',
            'variedad' => 'required|string|max:255',
            'bodega' => 'required|string|max:255',
            'precio' => 'required|numeric',
            'cantidad' => 'required|integer',
            'imagen' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $producto = Producto::findOrFail($id);
        $producto->nombre = $request->nombre;
        $producto->descripcion = $request->descripcion;
        $producto->variedad = $request->variedad;
        $producto->bodega = $request->bodega;
        $producto->precio = $request->precio;
        $producto->cantidad = $request->cantidad;

        // Manejo de la imagen
        if ($request->hasFile('imagen')) {
            // Elimina la imagen anterior si existe
            if ($producto->imagen) {
                unlink(public_path($producto->imagen));
            }
            $imagen = $request->file('imagen');
            $nombreImagen = time() . '.' . $imagen->getClientOriginalExtension();
            $imagen->move(public_path('images'), $nombreImagen);
            $producto->imagen = 'images/' . $nombreImagen;
        }

        $producto->save();

        return redirect()->route('productos.index')->with('success', 'Producto actualizado exitosamente.');
    }

    public function destroy($id)
    {
        $producto = Producto::findOrFail($id);
        if ($producto->imagen) {
            unlink(public_path($producto->imagen));
        }
        $producto->delete();

        return redirect()->route('productos.index')->with('success', 'Producto eliminado exitosamente.');
    }
}
