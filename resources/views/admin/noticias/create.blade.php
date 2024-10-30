<x-layout>
    <x-slot:title>Crear noticia</x-slot:title>

    <div class="container">
        <h2 class="h1 my-4">Crear Noticia</h2>

        <form action="{{ route('admin.noticias.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="titulo" class="form-label">Título</label>
                <input type="text" class="form-control" id="titulo" name="titulo" value="{{ old('titulo') }}">
                @error('titulo')
                    <div class="text-danger" id="error-title">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="contenido" class="form-label">Contenido</label>
                <textarea rows="10" class="form-control" id="contenido" name="contenido">{{ old('contenido') }}</textarea>
                @error('contenido')
                    <div class="text-danger" id="error-contenido">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="autor" class="form-label">Autor</label>
                <input type="text" class="form-control" id="autor" name="autor" value="{{ auth()->user()->name }}" disabled>
            </div>

            <div class="mb-3">
                <label for="fecha_publicacion" class="form-label">Fecha de Publicación</label>
                <input type="date" class="form-control" id="fecha_publicacion" name="fecha_publicacion" value="{{ \Carbon\Carbon::now()->format('Y-m-d') }}" disabled>
            </div>

            <div class="mb-3">
                <label for="imagen" class="form-label">Imagen</label>
                <input type="file" class="form-control" id="imagen" name="imagen" accept="image/*">
                @error('imagen')
                    <div class="text-danger" id="error-imagen">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="descripcion_imagen" class="form-label">Descripción de la Imagen</label>
                <input type="text" class="form-control" id="descripcion_imagen" name="descripcion_imagen" value="{{ old('descripcion_imagen') }}">
                @error('descripcion_imagen')
                    <div class="text-danger" id="error-descripcion_imagen">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary">Crear</button>
        </form>
    </div>
</x-layout>
