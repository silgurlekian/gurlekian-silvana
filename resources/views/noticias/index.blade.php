<x-layout>
    <div class="container">
        <h1 class="my-4">Lista de Noticias</h1>
        <a href="{{ route('noticias.create') }}" class="btn btn-primary mb-3">Crear Noticia</a>

        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">Título</th>
                    <th scope="col">Autor</th>
                    <th scope="col">Fecha de Publicación</th>
                    <th scope="col">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($noticias as $noticia)
                    <tr>
                        <td>{{ $noticia->titulo }}</td>
                        <td>{{ $noticia->autor }}</td>
                        <td>{{ $noticia->fecha_publicacion }}</td>
                        <td>
                            <a href="{{ route('noticias.edit', $noticia->id) }}" class="btn btn-warning btn-sm">Editar</a>
                            <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#confirmDeleteModal{{ $noticia->id }}">
                                Eliminar
                            </button>

                            <div class="modal fade" id="confirmDeleteModal{{ $noticia->id }}" tabindex="-1" aria-labelledby="confirmDeleteModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="confirmDeleteModalLabel">Confirmar Eliminación</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            ¿Estás seguro de que deseas eliminar la noticia "{{ $noticia->titulo }}"?
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                                            <form action="{{ route('noticias.destroy', $noticia->id) }}" method="POST" class="d-inline">
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
