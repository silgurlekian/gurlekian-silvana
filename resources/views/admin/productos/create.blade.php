<x-layout>
    <x-slot:title>Crear vino</x-slot:title>

    <div class="container">
        <h2 class="h1my-4">Crear Producto</h2>

        <form action="{{ route('admin.productos.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="nombre" class="form-label">Nombre del Producto</label>
                <input type="text" class="form-control" id="nombre" name="nombre">
                @error('nombre')
                    <div class="text-danger" id="error-nombre">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="descripcion" class="form-label">Descripción</label>
                <textarea rows="10" class="form-control" id="descripcion" name="descripcion"></textarea>
                @error('descripcion')
                    <div class="text-danger" id="error-descripcion">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="variedad" class="form-label">Variedad</label>
                <input type="text" class="form-control" id="variedad" name="variedad">
                @error('variedad')
                    <div class="text-danger" id="error-variedad">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="bodega" class="form-label">Bodega</label>
                <input type="text" class="form-control" id="bodega" name="bodega">
                @error('bodega')
                    <div class="text-danger" id="error-bodega">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="precio" class="form-label">Precio</label>
                <input type="text" class="form-control" id="precio" name="precio">
                @error('precio')
                    <div class="text-danger" id="error-precio">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="cantidad" class="form-label">Cantidad</label>
                <input type="text" class="form-control" id="cantidad" name="cantidad">
                @error('cantidad')
                    <div class="text-danger" id="error-cantidad">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="imagen" class="form-label">Imagen del Producto</label>
                <input type="file" class="form-control" id="imagen" name="imagen">
                @error('imagen')
                    <div class="text-danger" id="error-imagen">{{ $message }}</div>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary">Crear</button>
        </form>
    </div>
</x-layout>
