<x-layout>
    <x-slot:title>Perfil de usuario</x-slot:title>

    <div class="container pb-3">
        <h2 class="h1 my-4">Mis datos</h2>
        <p><strong>Nombre:</strong> {{ Auth::user()->name }}</p>
        <p><strong>Email:</strong> {{ Auth::user()->email }}</p>

        <a href="{{ route('profile.edit') }}" class="btn btn-primary mt-3">Editar Perfil</a>

        <h3 class="my-4">Historial de Compras</h3>
        @if ($compras->isEmpty())
            <p>No has realizado ninguna compra aún.</p>
        @else
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Producto</th>
                        <th>Cantidad</th>
                        <th>Total</th>
                        <th>Fecha</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($compras as $compra)
                        <tr>
                            <td>{{ $compra->producto->nombre }}</td>
                            <td>{{ $compra->cantidad }}</td>
                            <td>${{ number_format($compra->total, 2) }}</td>
                            <td>{{ $compra->created_at->format('d/m/Y H:i') }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    </div>
</x-layout>