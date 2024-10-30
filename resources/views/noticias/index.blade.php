<x-layout>
    <x-slot:title>Noticias</x-slot:title>

    <div class="container">
        <h2 class="h1 my-4 text-center">Noticias</h2>
        <div class="row">
            @foreach ($noticias as $noticia)
                <div class="col-md-4 mb-4">
                    <div class="card shadow-sm border-light">
                        @if ($noticia->imagen)
                            <img src="{{ asset($noticia->imagen) }}" class="card-img-top" alt="{{ asset($noticia->titulo) }}">
                        @endif
                        <div class="card-body">
                            <h3 class="card-title">{{ $noticia->titulo }}</h3>
                            <p class="card-text card-description">
                                {{ \Illuminate\Support\Str::limit($noticia->contenido, 100) }}
                                @if (strlen($noticia->contenido) > 100)
                                    <span>...</span>
                                @endif
                            </p>
                            <p class="card-text"><strong>Autor:</strong> {{ $noticia->autor }}</p>
                            <a href="{{ route('noticias.show', $noticia->id) }}" class="btn btn-primary">Leer más</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</x-layout>
