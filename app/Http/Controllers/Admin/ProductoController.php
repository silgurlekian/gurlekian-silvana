<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Producto;
use Illuminate\Http\Request;

class ProductoController extends Controller
{
    private array $validationRules = [
        'nombre' => 'required|string|max:255',
        'descripcion' => 'required|string',
        'variedad' => 'required|string|max:255',
        'bodega' => 'required|string|max:255',
        'precio' => 'required|numeric',
        'cantidad' => 'required|integer',
        'imagen' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:4096',
    ];

    private array $validationMessages = [
        'nombre.required' => 'El nombre debe tener un valor.',
        'nombre.min' => 'El nombre debe al menos :min caracteres.',
        'descripcion.required' => 'La descripción debe tener un valor.',
        'variedad.required' => 'La variedad debe tener un valor.',
        'variedad.min' => 'La variedad debe al menos :min caracteres.',
        'bodega.required' => 'La bodega debe tener un valor.',
        'bodega.min' => 'La bodega debe al menos :min caracteres.',
        'precio.required' => 'El precio debe tener un valor.',
        'precio.numeric' => 'El precio debe ser un número.',
        'cantidad.required' => 'La cantidad debe tener un valor.',
        'fecha_publicacion.required' => 'La fecha de publicación debe tener un valor.',
    ];

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
        $request->validate($this->validationRules, $this->validationMessages);

        $producto = new Producto($request->except('imagen'));

        if ($request->hasFile('imagen')) {
            try {
                if ($producto->imagen && file_exists(public_path($producto->imagen))) {
                    unlink(public_path($producto->imagen));
                }

                $nombreImagen = time() . '.' . $request->file('imagen')->getClientOriginalExtension();
                $request->file('imagen')->move(public_path('images/vinos/'), $nombreImagen);
                $producto->imagen = 'images/vinos/' . $nombreImagen;
            } catch (\Exception $e) {
                return redirect()->back()->withErrors(['imagen' => 'Error al subir la imagen: ' . $e->getMessage()]);
            }
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
        $request->validate($this->validationRules, $this->validationMessages);

        $producto = Producto::findOrFail($id);
        $producto->nombre = $request->nombre;
        $producto->descripcion = $request->descripcion;
        $producto->variedad = $request->variedad;
        $producto->bodega = $request->bodega;
        $producto->precio = $request->precio;
        $producto->cantidad = $request->cantidad;

        if ($request->hasFile('imagen')) {
            if ($producto->imagen) {
                unlink(public_path($producto->imagen));
            }

            $nombreImagen = time() . '.' . $request->file('imagen')->getClientOriginalExtension();
            $request->file('imagen')->move(public_path('images/vinos'), $nombreImagen);
            $producto->imagen = 'images/vinos/' . $nombreImagen;
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
