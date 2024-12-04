<!DOCTYPE html>
<html>
<head>
    <title>Checkout</title>
</head>
<body>
    <h1>Redirigiendo a Mercado Pago...</h1>
    <script src="https://sdk.mercadopago.com/js/v2"></script>
    <script>
        const mp = new MercadoPago('TU_PUBLIC_KEY_AQUI', {
            locale: 'es-AR'
        });

        mp.checkout({
            preference: {
                id: '{{ $preference->id }}'
            },
            render: {
                container: '#button-checkout',
                label: 'Pagar'
            }
        });
    </script>

    <div id="button-checkout"></div>
</body>
</html>