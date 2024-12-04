<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use Illuminate\Http\Request;
use MercadoPago\Client\Preference\PreferenceClient;
use MercadoPago\MercadoPagoConfig;

class MercadoPagoController extends Controller
{
    public function show($producto_id)
    {
        try {
            // Obtenemos el producto que el usuario desea comprar
            $producto = Producto::findOrFail($producto_id);

            // Armamos los ítems que vamos a cobrar.
            $items = [
                [
                    'title' => $producto->nombre,
                    'quantity' => 1,
                    'unit_price' => $producto->precio,
                ]
            ];

            // Implementación Mercado Pago
            MercadoPagoConfig::setAccessToken(config('mercadopago.access_token'));

            // Creamos la preferencia de pago.
            $factory = new PreferenceClient();
            $preference = $factory->create([
                'items' => $items,
                'back_urls' => [
                    'success' => route('mp.success'),
                    'pending' => route('mp.pending'),
                    'failure' => route('mp.failure'),
                ],
                'auto_return' => 'approved',
            ]);

            return view('mercadopago.pay-form', [
                'producto' => $producto,
                'preference' => $preference,
                'mpPublicKey' => config('mercadopago.public_key'),
            ]);
        } catch (\Throwable $th) {
            // Manejo de errores en producción.
            dd($th);
        }
    }

    public function success(Request $request)
    {
        // Aquí puedes procesar el éxito del pago.
        dd($request);
    }

    public function pending(Request $request)
    {
        // Aquí puedes procesar el pago pendiente.
        dd($request);
    }

    public function failure(Request $request)
    {
        // Aquí puedes manejar el fallo de pago.
        dd($request);
    }

    public function processResponse(Request $request)
    {
        // Aquí puedes marcar como completada la compra en tu sistema.
    }
}
