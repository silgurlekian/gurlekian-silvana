<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use MercadoPago\MercadoPagoConfig;
use MercadoPago\Client\Payment\PaymentClient;
use MercadoPago\Resource\Payment;

class MercadoPagoController extends Controller
{
    public function __construct()
    {
        // Configurar el SDK con el access token
        MercadoPagoConfig::setAccessToken(config('mercadopago.access_token'));
    }

    public function checkout(Request $request)
    {
        // Validar la entrada del usuario
        $request->validate([
            'nombre' => 'required|max:255',
            'email' => 'required|email',
        ]);

        // Crear un cliente para manejar los pagos
        $client = new PaymentClient();

        // Crear la preferencia de pago
        $paymentData = [
            "transaction_amount" => 100, // Monto total
            "description" => "Producto de Prueba",
            "payment_method_id" => "pse", // Método de pago (ejemplo)
            "payer" => [
                "email" => $request->email,
                "first_name" => $request->nombre,
                "entity_type" => "individual",
                "identification" => [
                    "type" => "DNI", // Tipo de identificación
                    "number" => "12345678" // Número de identificación (ejemplo)
                ]
            ],
            "back_urls" => [
                "success" => route('checkout.success'),
                "failure" => route('checkout.failure'),
                "pending" => route('checkout.pending')
            ]
        ];

        try {
            // Crear el pago
            $payment = $client->create($paymentData);
            return view('checkout')->with('payment', $payment);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    public function success(Request $request)
    {
        return 'Pago exitoso';
    }

    public function failure(Request $request)
    {
        return 'Pago fallido';
    }

    public function pending(Request $request)
    {
        return 'Pago pendiente';
    }
}