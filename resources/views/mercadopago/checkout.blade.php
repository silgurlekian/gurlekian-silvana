<x-layout>
    <x-slot:title>Prueba de pago con Mercado Pago</x-slot:title>

    <div class="container">
        <h2 class="h1 my-4">Pagar</h2>

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
                @php $total = 0; @endphp <!-- Inicializa la variable total -->
                @foreach ($preference->items as $item)
                    @php $subtotal = $item->unit_price * $item->quantity; @endphp
                    <tr>
                        <td>{{ $item->title }}</td>
                        <td>${{ number_format($item->unit_price, 2) }}</td>
                        <td>{{ $item->quantity }}</td>
                        <td>${{ number_format($subtotal, 2) }}</td>
                    </tr>
                    @php $total += $subtotal; @endphp <!-- Acumula el subtotal al total -->
                @endforeach
            </tbody>
        </table>

        <h3>Total: ${{ number_format($total, 2) }}</h3> 

        <div id="mp-payment"></div>
    </div>

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
