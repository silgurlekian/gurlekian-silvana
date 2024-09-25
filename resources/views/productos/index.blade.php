<x-layout>
    <h1>Lista de Productos</h1>
    <a href="{{ route('productos.create') }}">Crear nuevo producto</a>

    @if (session('success'))
        <div>{{ session('success') }}</div>
    @endif

    <ul>
        @foreach ($productos as $producto)
            <li>{{ $producto->nombre }} - ${{ $producto->precio }}</li>
        @endforeach
    </ul>
</x-layout>
