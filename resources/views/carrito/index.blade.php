<x-layout>
    <x-slot:title>Carrito de compras</x-slot:title>

    <div class="container">
        <h2 class="h1 my-4">Carrito de compras</h2>

        @if (empty($carrito))
            <p>No hay productos en el carrito.</p>
        @else
            <table class="table">
                <thead>
                    <tr>
                        <th>Producto</th>
                        <th>Precio</th>
                        <th>Cantidad</th>
                        <th>Total</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($carrito as $id => $item)
                        <tr>
                            <td>{{ $item['producto']->nombre }}</td>
                            <td>${{ number_format($item['producto']->precio, 2) }}</td>
                            <td>
                                <form action="{{ route('carrito.update', $id) }}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <input type="number" name="cantidad" value="{{ $item['cantidad'] }}" min="1"
                                        class="form-control" required>
                                    <button type="submit" class="btn btn-primary btn-sm">Actualizar</button>
                                </form>
                            </td>
                            <td>${{ number_format($item['producto']->precio * $item['cantidad'], 2) }}</td>
                            <td>
                                <form action="{{ route('carrito.remove', $id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger btn-sm">Eliminar</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            <div class="text-end">
                <a href="{{ route('checkout') }}" class="btn btn-primary">Proceder al pago</a>
            </div>
        @endif
    </div>
</x-layout>
