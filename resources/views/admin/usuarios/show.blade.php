<x-layout>
    <x-slot:title>Detalle de usuario: {{ $usuario->name }}</x-slot:title>

    <div class="container pb-3">
        <h2 class="my-4">Detalle de usuario: {{ $usuario->name }}</h2>
        <p><strong>Email:</strong> {{ $usuario->email }}</p>

        <h3>Compras Realizadas</h3>
        @if ($usuario->compras->isEmpty())
            <p>Este usuario no tiene compras registradas.</p>
        @else
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Producto</th>
                        <th>Fecha</th>
                        <th>Cantidad</th>
                        <th>Precio Unitario</th>
                        <th>Total</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($usuario->compras as $compra)
                        <tr>
                            <td>{{ $compra->producto->nombre }}</td>
                            <td>{{ $compra->created_at->format('d-m-Y') }}</td>
                            <td>{{ $compra->cantidad }}</td>
                            <td>${{ number_format($compra->producto->precio, 2) }}</td>
                            <td>${{ number_format($compra->total, 2) }}</td> 
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    </div>
</x-layout>