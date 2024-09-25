<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Noticia;
use Illuminate\Http\Request;

class NoticiaController extends Controller
{
    public function index()
    {
        $noticias = Noticia::all();
        return view('admin.noticias.index', compact('noticias'));
    }

    public function create()
    {
        return view('admin.noticias.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'titulo' => 'required|string|max:255',
            'contenido' => 'required|string',
            'autor' => 'required|string|max:255',
            'fecha_publicacion' => 'nullable|date',
            'imagen' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048', // Validación de imagen
        ]);

        $noticia = new Noticia($request->all());

        // Manejo de la imagen
        if ($request->hasFile('imagen')) {
            $nombreImagen = time() . '.' . $request->file('imagen')->getClientOriginalExtension();
            $request->file('imagen')->move(public_path('images/noticias'), $nombreImagen);
            $noticia->imagen = 'images/noticias/' . $nombreImagen;
        }

        $noticia->save();

        return redirect()->route('admin.noticias.index')->with('success', 'Noticia creada exitosamente.');
    }

    public function edit($id)
    {
        $noticia = Noticia::findOrFail($id);
        return view('admin.noticias.edit', compact('noticia'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'titulo' => 'required|string|max:255',
            'contenido' => 'required|string',
            'autor' => 'required|string|max:255',
            'fecha_publicacion' => 'nullable|date', // Permitir que la fecha sea nula
            'imagen' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048', // Validación de imagen
        ]);

        $noticia = Noticia::findOrFail($id);
        $noticia->titulo = $request->titulo;
        $noticia->contenido = $request->contenido;
        $noticia->autor = $request->autor;
        $noticia->fecha_publicacion = $request->fecha_publicacion;

        // Manejo de la nueva imagen
        if ($request->hasFile('imagen')) {
            // Eliminar la imagen anterior si existe
            if ($noticia->imagen) {
                unlink(public_path($noticia->imagen)); // Eliminar archivo de la carpeta
            }

            $nombreImagen = time() . '.' . $request->file('imagen')->getClientOriginalExtension();
            $request->file('imagen')->move(public_path('images/noticias'), $nombreImagen);
            $noticia->imagen = 'images/noticias/' . $nombreImagen;
        }

        $noticia->save();

        return redirect()->route('admin.noticias.index')->with('success', 'Noticia actualizada exitosamente.');
    }

    public function destroy($id)
    {
        $noticia = Noticia::findOrFail($id);
        // Eliminar la imagen antes de borrar la noticia
        if ($noticia->imagen) {
            unlink(public_path($noticia->imagen)); // Eliminar archivo de la carpeta
        }
        
        $noticia->delete();

        return redirect()->route('admin.noticias.index')->with('success', 'Noticia eliminada exitosamente.');
    }
}
