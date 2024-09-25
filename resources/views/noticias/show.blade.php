<x-layout>
    <x-slot:title>{{ $noticia->titulo }}</x-slot:title>

    <div class="container my-5">
        <h2 class="h1 my-4">{{ $noticia->titulo }}</h2>
        @if ($noticia->imagen)
            <div class="banner-imagen">
                <img src="{{ asset($noticia->imagen) }}" class="img-fluid" alt="Imagen de la noticia">
            </div>
        @endif
        <p class="text-muted"><strong>Autor:</strong> {{ $noticia->autor }}</p>
        <p class="text-muted"><strong>Fecha de Publicación:</strong> {{ $noticia->fecha_publicacion ? date('d/m/Y', strtotime($noticia->fecha_publicacion)) : 'No especificada' }}</p>
        <div class="noticia-contenido">
            {!! nl2br(e($noticia->contenido)) !!}
        </div>
        <a href="{{ route('noticias.index') }}" class="btn btn-secondary mt-4">Volver a la lista</a>
    </div>
</x-layout>
