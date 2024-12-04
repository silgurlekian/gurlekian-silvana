<x-layout>
    <x-slot:title>Carrito de compras</x-slot:title>

    <div class="container">
        <h1>Carrito de compras</h1>

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
                            <td>${{ $item['producto']->precio }}</td>
                            <td>
                                <form action="{{ route('carrito.update', $id) }}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <input type="number" name="cantidad" value="{{ $item['cantidad'] }}" min="1" class="form-control" required>
                                    <button type="submit" class="btn btn-primary btn-sm">Actualizar</button>
                                </form>
                            </td>
                            <td>${{ $item['producto']->precio * $item['cantidad'] }}</td>
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
                <a href="#" class="btn btn-primary">Proceder al pago</a>
            </div>
        @endif
    </div>
</x-layout>
