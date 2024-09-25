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
        ]);

        $noticia = new Noticia($request->all());
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
        ]);

        $noticia = Noticia::findOrFail($id);
        $noticia->titulo = $request->titulo;
        $noticia->contenido = $request->contenido;
        $noticia->save();

        return redirect()->route('admin.noticias.index')->with('success', 'Noticia actualizada exitosamente.');
    }

    public function destroy($id)
    {
        $noticia = Noticia::findOrFail($id);
        $noticia->delete();

        return redirect()->route('admin.noticias.index')->with('success', 'Noticia eliminada exitosamente.');
    }
}
