<x-layout>
    <x-slot:title>Lista de Usuarios</x-slot:title>

    <div class="container">
        <h2 class="my-4">Lista de Usuarios</h2>

        @if ($usuarios->isEmpty())
            <p>No hay usuarios registrados.</p>
        @else
            <table class="table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Email</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($usuarios as $usuario)
                        <tr>
                            <td>{{ $usuario->id }}</td>
                            <td>{{ $usuario->name }}</td>
                            <td>{{ $usuario->email }}</td>
                            <td>
                                <a href="{{ route('admin.usuarios.show', $usuario->id) }}" class="btn btn-info">Ver
                                    Detalles</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    </div>
</x-layout>
