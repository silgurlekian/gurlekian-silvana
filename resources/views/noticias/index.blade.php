<x-layout>
    <h1>Últimas Noticias</h1>
    <a href="{{ route('noticias.create') }}">Crear nueva noticia</a>

    @if (session('success'))
        <div>{{ session('success') }}</div>
    @endif

    <ul>
        @foreach ($noticias as $noticia)
            <li>{{ $noticia->titulo }} - {{ $noticia->autor }}</li>
        @endforeach
    </ul>
</x-layout>
