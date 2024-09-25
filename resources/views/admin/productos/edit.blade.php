<x-layout>
    <div class="container">
        <h1 class="my-4">Editar Producto</h1>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('admin.productos.update', $producto->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="nombre" class="form-label">Nombre del Producto</label>
                <input type="text" class="form-control" id="nombre" name="nombre" value="{{ $producto->nombre }}" required>
            </div>
            <div class="mb-3">
                <label for="descripcion" class="form-label">Descripción</label>
                <textarea class="form-control" id="descripcion" name="descripcion" required>{{ $producto->descripcion }}</textarea>
            </div>
            <div class="mb-3">
                <label for="variedad" class="form-label">Variedad</label>
                <input type="text" class="form-control" id="variedad" name="variedad" value="{{ $producto->variedad }}" required>
            </div>
            <div class="mb-3">
                <label for="bodega" class="form-label">Bodega</label>
                <input type="text" class="form-control" id="bodega" name="bodega" value="{{ $producto->bodega }}" required>
            </div>
            <div class="mb-3">
                <label for="precio" class="form-label">Precio</label>
                <input type="text" class="form-control" id="precio" name="precio" value="{{ $producto->precio }}" required>
            </div>
            <div class="mb-3">
                <label for="cantidad" class="form-label">Cantidad</label>
                <input type="text" class="form-control" id="cantidad" name="cantidad" value="{{ $producto->cantidad }}" required>
            </div>
            <div class="mb-3">
                <label for="imagen" class="form-label">Imagen del Producto (opcional)</label>
                <input type="file" class="form-control" id="imagen" name="imagen">
            </div>
            <button type="submit" class="btn btn-primary">Actualizar</button>
        </form>
    </div>
</x-layout>
