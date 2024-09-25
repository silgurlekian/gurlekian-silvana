<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Producto;
use Illuminate\Http\Request;

class ProductoController extends Controller
{
    public function index()
    {
        $productos = Producto::all();
        return view('admin.productos.index', compact('productos'));
    }

    public function create()
    {
        return view('admin.productos.create');
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
            'imagen' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048', // Validación de imagen
        ]);

        $producto = new Producto($request->except('imagen')); // Excluir imagen de la asignación masiva

        if ($request->hasFile('imagen')) {
            $nombreImagen = time() . '.' . $request->file('imagen')->getClientOriginalExtension();
            $request->file('imagen')->move(public_path('images/vinos'), $nombreImagen);
            $producto->imagen = 'images/vinos/' . $nombreImagen; // Guarda la ruta de la imagen
        }

        $producto->save();

        return redirect()->route('admin.productos.index')->with('success', 'Producto creado exitosamente.');
    }

    public function edit($id)
    {
        $producto = Producto::findOrFail($id);
        return view('admin.productos.edit', compact('producto'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'descripcion' => 'required|string',
            'variedad' => 'required|string|max:255',
            'bodega' => 'required|string|max:255',
            'precio' => 'required|numeric',
            'cantidad' => 'required|integer',
            'imagen' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048', // Validación de imagen
        ]);

        $producto = Producto::findOrFail($id);
        $producto->nombre = $request->nombre;
        $producto->descripcion = $request->descripcion;
        $producto->variedad = $request->variedad;
        $producto->bodega = $request->bodega;
        $producto->precio = $request->precio;
        $producto->cantidad = $request->cantidad;

        if ($request->hasFile('imagen')) {
            // Borrar la imagen antigua si es necesario
            if ($producto->imagen) {
                unlink(public_path($producto->imagen));
            }

            $nombreImagen = time() . '.' . $request->file('imagen')->getClientOriginalExtension();
            $request->file('imagen')->move(public_path('images/vinos'), $nombreImagen);
            $producto->imagen = 'images/vinos/' . $nombreImagen; // Guarda la nueva ruta de la imagen
        }

        $producto->save();

        return redirect()->route('admin.productos.index')->with('success', 'Producto actualizado exitosamente.');
    }


    public function destroy($id)
    {
        $producto = Producto::findOrFail($id);
        if ($producto->imagen) {
            unlink(public_path($producto->imagen));
        }
        $producto->delete();

        return redirect()->route('admin.productos.index')->with('success', 'Producto eliminado exitosamente.');
    }
}
