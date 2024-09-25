<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use Illuminate\Http\Request;

class ProductoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $productos = Producto::all();
        return view('productos.index', compact('productos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('productos.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required',
            'descripcion' => 'required',
            'variedad' => 'required',
            'bodega' => 'required',
            'precio' => 'required|numeric',
            'cantidad' => 'required|integer',
        ]);

        if ($request->hasFile('imagen')) {
            $nombreArchivoConExt = $request->file('imagen')->getClientOriginalName();
            $nombreArchivo = pathinfo($nombreArchivoConExt, PATHINFO_FILENAME);
            $extension = $request->file('imagen')->getClientOriginalExtension();
            $nombreArchivoAlmacenado = $nombreArchivo . '_' . time() . '.' . $extension;
            $path = $request->file('imagen')->storeAs('public/imagenes', $nombreArchivoAlmacenado);
        } else {
            $nombreArchivoAlmacenado = 'noimagen.jpg';
        }

        Producto::create([
            'nombre' => $request->nombre,
            'descripcion' => $request->descripcion,
            'variedad' => $request->variedad,
            'bodega' => $request->bodega,
            'precio' => $request->precio,
            'stock' => $request->stock,
            'imagen' => $nombreArchivoAlmacenado
        ]);

        return redirect()->route('productos.index')->with('success', 'Producto creado exitosamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $producto = Producto::findOrFail($id);
        return view('productos.show', compact('producto'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $producto = Producto::findOrFail($id);
        return view('productos.edit', compact('producto'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nombre' => 'required',
            'descripcion' => 'required',
            'variedad' => 'required',
            'bodega' => 'required',
            'precio' => 'required|numeric',
            'stock' => 'required|integer',
            'imagen' => 'image|nullable|max:1999'
        ]);

        $producto = Producto::findOrFail($id);

        // Manejar la subida de imagen (si se subió una nueva)
        if ($request->hasFile('imagen')) {
            $nombreArchivoConExt = $request->file('imagen')->getClientOriginalName();
            $nombreArchivo = pathinfo($nombreArchivoConExt, PATHINFO_FILENAME);
            $extension = $request->file('imagen')->getClientOriginalExtension();
            $nombreArchivoAlmacenado = $nombreArchivo.'_'.time().'.'.$extension;
            $path = $request->file('imagen')->storeAs('public/imagenes', $nombreArchivoAlmacenado);
        } else {
            $nombreArchivoAlmacenado = $producto->imagen;
        }

        $producto->update([
            'nombre' => $request->nombre,
            'descripcion' => $request->descripcion,
            'variedad' => $request->variedad,
            'bodega' => $request->bodega,
            'precio' => $request->precio,
            'stock' => $request->stock,
            'imagen' => $nombreArchivoAlmacenado
        ]);

        return redirect()->route('productos.index')->with('success', 'Producto actualizado exitosamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $producto = Producto::findOrFail($id);
        $producto->delete();
        return redirect()->route('productos.index')->with('success', 'Producto eliminado exitosamente.');
    }
}
