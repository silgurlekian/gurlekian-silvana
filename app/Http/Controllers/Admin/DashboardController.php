<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Compra;
use App\Models\Producto;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        // Verificar si el usuario es admin
        if (Auth::user()->role !== 'admin') {
            return redirect()->route('home')->with('error', 'Acceso no autorizado.');
        }

        // Obtener las estadísticas
        $productosMasComprados = $this->getProductosMasComprados();
        $mesConMayorFacturacion = $this->getMesConMayorFacturacion();

        return view('admin.dashboard', compact('productosMasComprados', 'mesConMayorFacturacion'));
    }

    private function getProductosMasComprados()
    {
        return Compra::select('producto_id', DB::raw('SUM(cantidad) as total_vendido'))
            ->groupBy('producto_id')
            ->orderBy('total_vendido', 'desc')
            ->with('producto') // Cargar la relación para obtener información del producto
            ->take(5) // Limitar a los 5 productos más vendidos
            ->get();
    }

    private function getMesConMayorFacturacion()
    {
        return Compra::select(DB::raw('MONTH(created_at) as mes'), DB::raw('YEAR(created_at) as anio'), DB::raw('SUM(total) as total_facturado'))
            ->groupBy('mes', 'anio') // Agrupar por mes y año
            ->orderBy('total_facturado', 'desc')
            ->first(); // Obtener el mes con mayor facturación
    }
}
