<x-layout>
    <x-slot:title>Editar {{ $noticia->titulo }}</x-slot:title>

    <div class="container">
        <h1 class="my-4">Editar {{ $noticia->titulo }}</h1>

        <form action="{{ route('admin.noticias.update', $noticia->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="titulo" class="form-label">Título</label>
                <input type="text" class="form-control" id="titulo" name="titulo" value="{{ $noticia->titulo }}"
                    required>
            </div>
            <div class="mb-3">
                <label for="contenido" class="form-label">Contenido</label>
                <textarea rows="10" class="form-control" id="contenido" name="contenido" required>{{ $noticia->contenido }}</textarea>
            </div>
            <div class="mb-3">
                <label for="autor" class="form-label">Autor</label>
                <input type="text" class="form-control" id="autor" name="autor" value="{{ $noticia->autor }}"
                    required>
            </div>
            <div class="mb-3">
                <label for="fecha_publicacion" class="form-label">Fecha de Publicación</label>
                <input type="date" class="form-control" id="fecha_publicacion" name="fecha_publicacion"
                    value="{{ $noticia->fecha_publicacion ? date('Y-m-d', strtotime($noticia->fecha_publicacion)) : '' }}">
            </div>
            <div class="mb-3">
                <label for="imagen" class="form-label">Imagen</label>
                <input type="file" class="form-control" id="imagen" name="imagen" accept="image/*">
                @if ($noticia->imagen)
                    <img src="{{ asset($noticia->imagen) }}" alt="Imagen de la noticia" class="img-thumbnail mt-2"
                        style="max-width: 150px;">
                @endif
            </div>
            <button type="submit" class="btn btn-primary">Actualizar</button>
        </form>
    </div>
</x-layout>
