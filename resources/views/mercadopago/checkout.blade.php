<x-layout>
    <x-slot:title>Prueba de Pago con Mercado Pago</x-slot:title>

    <h1 class="mb-3">Pagar</h1>

    <table class="table table-striped table-bordered">
        <thead>
            <tr>
                <th>Producto</th>
                <th>Precio</th>
                <th>Cantidad</th>
                <th>Subtotal</th>
            </tr>
        </thead>
        <tbody>
            @foreach($preference->items as $item)
            <tr>
                <td>{{ $item->title }}</td> <!-- Cambiado a ->title -->
                <td>${{ number_format($item->unit_price, 2) }}</td> <!-- Cambiado a ->unit_price -->
                <td>{{ $item->quantity }}</td> <!-- Cambiado a ->quantity -->
                <td>${{ number_format($item->unit_price * $item->quantity, 2) }}</td> <!-- Cambiado a ->unit_price y ->quantity -->
            </tr>
            @endforeach
        </tbody>
    </table>

    <div id="mp-payment"></div>

    <script src="https://sdk.mercadopago.com/js/v2"></script>
    <script>
        const mp = new MercadoPago('{{ $mpPublicKey }}');
        mp.bricks().create('wallet', 'mp-payment', {
            initialization: {
                preferenceId: '{{ $preference->id }}',
            },
        });
    </script>

</x-layout>