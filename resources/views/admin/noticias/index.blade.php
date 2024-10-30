<x-layout>
    <x-slot:title>Administrar noticias</x-slot:title>

    <div class="container">
        <h2 class="h1 my-4">Lista de Noticias</h2>
        <a href="{{ route('admin.noticias.create') }}" class="btn btn-primary mb-3">Crear Noticia</a>

        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">Imagen</th>
                    <th scope="col">Título</th>
                    <th scope="col">Autor</th>
                    <th scope="col">Fecha de Publicación</th>
                    <th scope="col">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($noticias as $noticia)
                    <tr>
                        <td>
                            @if($noticia->imagen)
                                <img src="{{ asset($noticia->imagen) }}" alt="{{ asset($noticia->titulo) }}" style="width: 100px; height: auto;">
                            @else
                                <span class="text-muted">Sin imagen</span>
                            @endif
                        </td>
                        <td>{{ $noticia->titulo }}</td>
                        <td>{{ $noticia->autor }}</td>
                        <td>
                            @if($noticia->fecha_publicacion)
                                {{ date('d/m/Y', strtotime($noticia->fecha_publicacion)) }}
                            @else
                                <span class="text-muted">No especificada</span>
                            @endif
                        </td>
                        <td>
                            <a href="{{ route('admin.noticias.edit', $noticia->id) }}" class="btn btn-warning btn-sm">Editar</a>
                            <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#confirmDeleteModal{{ $noticia->id }}">
                                Eliminar
                            </button>

                            <!-- Modal de confirm∫ción de eliminación -->
                            <div class="modal fade" id="confirmDeleteModal{{ $noticia->id }}" tabindex="-1" aria-labelledby="confirmDeleteModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h3 class="modal-title" id="confirmDeleteModalLabel">Confirmar Eliminación</h3>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            ¿Estás seguro de que deseas eliminar la noticia "{{ $noticia->titulo }}"?
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                                            <form action="{{ route('admin.noticias.destroy', $noticia->id) }}" method="POST" class="d-inline">
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
