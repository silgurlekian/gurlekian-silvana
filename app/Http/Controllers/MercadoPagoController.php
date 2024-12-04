<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use MercadoPago\MercadoPagoConfig;
use MercadoPago\Client\Preference\PreferenceClient;
use Illuminate\Support\Facades\Log;

class MercadoPagoController extends Controller
{
    public function __construct()
    {
        // Configurar el SDK con el access token
        MercadoPagoConfig::setAccessToken(config('mercadopago.access_token'));
    }

    public function checkout(Request $request)
    {
        // Obtener el carrito desde la sesión
        $carrito = session()->get('carrito', []);

        if (empty($carrito)) {
            return redirect()->route('carrito.index')->with('error', 'No hay productos en el carrito.');
        }

        // Agregar los ítems del carrito a la preferencia
        $items = [];
        foreach ($carrito as $id => $item) {
            $items[] = [
                'title' => $item['producto']->nombre,
                'quantity' => (int)$item['cantidad'], // Debe ser un entero
                'unit_price' => (float)$item['producto']->precio, // Debe ser un número flotante
            ];
        }

        // Crear la preferencia de pago
        $factory = new PreferenceClient();

        try {
            // Crear la preferencia
            $preference = $factory->create([
                'items' => $items,
                'back_urls' => [
                    'success' => route('checkout.success'),
                    'failure' => route('checkout.failure'),
                    'pending' => route('checkout.pending'),
                ],
                'auto_return' => 'approved',
            ]);

            return view('mercadopago.checkout', [
                'preference' => $preference,
                'mpPublicKey' => config('mercadopago.public_key'),
            ]);
        } catch (\Exception $e) {
            Log::error('Error al crear la preferencia: ' . $e->getMessage());
            Log::error('Detalles del error: ', ['exception' => $e]);

            return response()->json(['error' => 'Error al crear la preferencia: ' . $e->getMessage()], 500);
        }
    }

    public function success(Request $request)
    {
        return view('mercadopago.success'); // Vista para mostrar éxito
    }

    public function failure(Request $request)
    {
        return view('mercadopago.failure'); // Vista para mostrar fallo
    }

    public function pending(Request $request)
    {
        return view('mercadopago.pending'); // Vista para mostrar pendiente
    }
}