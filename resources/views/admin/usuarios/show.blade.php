<x-layout>
    <x-slot:title>Detalle de Usuario: {{ $usuario->name }}</x-slot:title>

    <div class="container">
        <h2 class="my-4">Detalle de Usuario: {{ $usuario->name }}</h2>
        <p><strong>Email:</strong> {{ $usuario->email }}</p>

        <h3>Compras Realizadas</h3>
        @if ($usuario->compras->isEmpty())
            <p>Este usuario no tiene compras registradas.</p>
        @else
            <ul>
                @foreach ($usuario->compras as $compra)
                    <li>
                        Producto: {{ $compra->producto->nombre }} (Fecha: {{ $compra->created_at->format('d-m-Y') }},
                        Precio: ${{ $compra->producto->precio }})
                    </li>
                @endforeach
            </ul>
        @endif
    </div>
</x-layout>
