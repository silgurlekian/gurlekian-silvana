<x-layout>
    <div class="container">
        <h1 class="my-4">Noticias</h1>
        <div class="row">
            @foreach ($noticias as $noticia)
                <div class="col-md-6">
                    <div class="card mb-4 shadow-sm">
                        <div class="card-body">
                            @if ($noticia->imagen)
                                <img src="{{ asset($noticia->imagen) }}" class="card-img-top" alt="Imagen de la noticia">
                            @endif
                            <h5 class="card-title">{{ $noticia->titulo }}</h5>
                            <p class="card-text">{{ $noticia->contenido }}</p>
                            <p class="card-text"><strong>Autor:</strong> {{ $noticia->autor }}</p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</x-layout>
