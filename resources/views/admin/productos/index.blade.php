<x-layout>
    <x-slot:title>Administrar productos</x-slot:title>

    <div class="container">
        <h2 class="h1 my-4">Lista de Productos</h2>
        <a href="{{ route('admin.productos.create') }}" class="btn btn-primary mb-3">Crear Producto</a>

        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col"></th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Descripción</th>
                    <th scope="col">Variedad</th>
                    <th scope="col">Bodega</th>
                    <th scope="col">Precio</th>
                    <th scope="col">Cantidad</th>
                    <th scope="col">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($productos as $producto)
                    <tr>
                        <td>
                            <img src="{{ asset($producto->imagen) }}" class="card-img-top"
                                alt="{{ $producto->nombre }}">
                        </td>
                        <td>{{ $producto->nombre }}</td>
                        <td>{{ $producto->descripcion }}</td>
                        <td>{{ $producto->variedad }}</td>
                        <td>{{ $producto->bodega }}</td>
                        <td>{{ $producto->precio }}</td>
                        <td>{{ $producto->cantidad }}</td>
                        <td>
                            <a href="{{ route('admin.productos.edit', $producto->id) }}"
                                class="btn btn-warning btn-sm">Editar</a>
                            <!-- Botón para abrir el modal -->
                            <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal"
                                data-bs-target="#confirmDeleteModal{{ $producto->id }}">
                                Eliminar
                            </button>

                            <!-- Modal de confirmación -->
                            <div class="modal fade" id="confirmDeleteModal{{ $producto->id }}" tabindex="-1"
                                aria-labelledby="confirmDeleteModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="confirmDeleteModalLabel">Confirmar Eliminación
                                            </h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            ¿Estás seguro de que deseas eliminar el producto "{{ $producto->nombre }}"?
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-bs-dismiss="modal">Cancelar</button>
                                            <form action="{{ route('admin.productos.destroy', $producto->id) }}"
                                                method="POST" class="d-inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger">Eliminar</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</x-layout>
