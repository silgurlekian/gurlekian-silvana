<?php
/** @var \App\Models\Producto $producto */
/** @var \MercadoPago\Resources\Preference $preference */
/** @var $mpPublicKey string */
?>

<x-layout>
    <x-slot:title>Pago con Mercado Pago</x-slot:title>

    <h1 class="mb-3">Pagar: {{ $producto->nombre }}</h1>

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
            <tr>
                <td>{{ $producto->nombre }}</td>
                <td>$ {{ $producto->precio }}</td>
                <td>1</td>
                <td>$ {{ $producto->precio }}</td>
            </tr>
        </tbody>
    </table>

    <div id="mp-payment"></div>

    <script src="https://sdk.mercadopago.com/js/v2"></script>
    <script>
        // Inicializamos MercadoPago con la clave pública
        const mp = new MercadoPago('<?= $mpPublicKey;?>');
        
        // Creamos el botón de pago con la preferencia generada
        mp.bricks().create('wallet', 'mp-payment', {
            initialization: {
                preferenceId: '<?= $preference->id;?>',
            },
        });
    </script>

</x-layout>
