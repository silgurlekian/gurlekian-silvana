<x-layout>
    <x-slot:title>Dashboard Admin</x-slot:title>

    <div class="container pb-3">
        <h2 class="h1 my-4">Dashboard</h2>

        <h3>Productos más comprados</h3>
        @if ($productosMasComprados->isEmpty())
            <p>No hay compras registradas.</p>
        @else
            <div class="row">
                @foreach ($productosMasComprados as $producto)
                    <div class="col-md-4 mb-4">
                        <div class="card card-dash">
                            <div class="card-body">
                                <h5 class="card-title">{{ $producto->producto->nombre }}</h5>
                                <p class="card-text">Total Vendido: {{ $producto->total_vendido }}</p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif

        <h3>Mes con mayor facturación</h3>
        @if ($mesConMayorFacturacion)
            <div class="alert alert-info">
                <p><strong>Mes:</strong> {{ $mesConMayorFacturacion->mes }} - {{ $mesConMayorFacturacion->anio }}</p>
                <p><strong>Total Facturado:</strong> ${{ number_format($mesConMayorFacturacion->total_facturado, 2) }}</p>
            </div>
        @else
            <p>No hay datos de facturación disponibles.</p>
        @endif
    </div>
</x-layout>