<?php

namespace App\Http\Controllers;

use App\Models\Noticia;
use Illuminate\Http\Request;

class NoticiaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $noticias = Noticia::all();
        return view('noticias.index', compact('noticias'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('noticias.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'titulo' => 'required|string|max:255',
            'contenido' => 'required|string',
            'autor' => 'required|string|max:255',
            'fecha_publicacion' => 'nullable|date',
        ]);

        Noticia::create($request->all());
        return redirect()->route('noticias.index')->with('success', 'Noticia creada con éxito.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Noticia $noticia)
    {
        return view('noticias.edit', compact('noticia'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Noticia $noticia)
    {
        $request->validate([
            'titulo' => 'required|string|max:255',
            'contenido' => 'required|string',
            'autor' => 'required|string|max:255',
            'fecha_publicacion' => 'nullable|date',
        ]);

        $noticia->update($request->all());
        return redirect()->route('noticias.index')->with('success', 'Noticia actualizada con éxito.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Noticia $noticia)
    {
        $noticia->delete();
        return redirect()->route('noticias.index')->with('success', 'Noticia eliminada con éxito.');
    }
}
