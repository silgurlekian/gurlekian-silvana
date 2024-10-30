<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Noticia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NoticiaController extends Controller
{
    private array $validationRules = [
        'titulo' => 'required|string|max:255',
        'contenido' => 'required|string',
        'imagen' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
        'descripcion_imagen' => 'nullable|string|max:255',
    ];

    private array $validationMessages = [
        'titulo.required' => 'El título debe tener un valor.',
        'titulo.min' => 'El título debe tener al menos :min caracteres.',
        'contenido.required' => 'El contenido debe tener un valor.',
    ];

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
        $request->validate($this->validationRules, $this->validationMessages);

        $noticia = new Noticia();
        $noticia->titulo = $request->titulo;
        $noticia->contenido = $request->contenido;
        $noticia->autor = Auth::user()->name;  // Asigna el usuario autenticado como autor
        $noticia->fecha_publicacion = now(); // Establece la fecha de publicación actual

        // Manejo de la imagen
        if ($request->hasFile('imagen')) {
            $nombreImagen = time() . '.' . $request->file('imagen')->getClientOriginalExtension();
            $request->file('imagen')->move(public_path('images/noticias'), $nombreImagen);
            $noticia->imagen = 'images/noticias/' . $nombreImagen;
            $noticia->descripcion_imagen = $request->descripcion_imagen; // Guarda la descripción de la imagen
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
        $request->validate($this->validationRules, $this->validationMessages);

        $noticia = Noticia::findOrFail($id);
        $noticia->titulo = $request->titulo;
        $noticia->contenido = $request->contenido;
        $noticia->fecha_publicacion = $request->fecha_publicacion ?? $noticia->fecha_publicacion;

        if ($request->hasFile('imagen')) {
            if ($noticia->imagen) {
                unlink(public_path($noticia->imagen));
            }

            $nombreImagen = time() . '.' . $request->file('imagen')->getClientOriginalExtension();
            $request->file('imagen')->move(public_path('images/noticias'), $nombreImagen);
            $noticia->imagen = 'images/noticias/' . $nombreImagen;
            $noticia->descripcion_imagen = $request->descripcion_imagen; // Actualiza la descripción de la imagen
        }

        $noticia->save();

        return redirect()->route('admin.noticias.index')->with('success', 'Noticia actualizada exitosamente.');
    }

    public function destroy($id)
    {
        $noticia = Noticia::findOrFail($id);
        if ($noticia->imagen) {
            unlink(public_path($noticia->imagen));
        }

        $noticia->delete();

        return redirect()->route('admin.noticias.index')->with('success', 'Noticia eliminada exitosamente.');
    }
}
