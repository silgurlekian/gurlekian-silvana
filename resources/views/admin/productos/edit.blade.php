<x-layout>
    <x-slot:title>Editar {{$producto->nombre}}</x-slot:title>

    <div class="container">
        <h2 class="h1 my-4">Editar {{$producto->nombre}}</h2>

        <form action="{{ route('admin.productos.update', $producto->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="nombre" class="form-label">Nombre del Producto</label>
                <input type="text" class="form-control" id="nombre" name="nombre" value="{{ old('nombre', $producto->nombre) }}">
                @error('nombre')
                    <div class="text-danger" id="error-nombre">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="descripcion" class="form-label">Descripción</label>
                <textarea rows="10" class="form-control" id="descripcion" name="descripcion">{{ old('descripcion', $producto->descripcion) }}</textarea>
                @error('descripcion')
                    <div class="text-danger" id="error-descripcion">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="variedad" class="form-label">Variedad</label>
                <input type="text" class="form-control" id="variedad" name="variedad" value="{{ old('variedad', $producto->variedad) }}">
                @error('variedad')
                    <div class="text-danger" id="error-variedad">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="bodega" class="form-label">Bodega</label>
                <input type="text" class="form-control" id="bodega" name="bodega" value="{{ old('bodega', $producto->bodega) }}">
                @error('bodega')
                    <div class="text-danger" id="error-bodega">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="precio" class="form-label">Precio</label>
                <input type="text" class="form-control" id="precio" name="precio" value="{{ old('precio', $producto->precio) }}">
                @error('precio')
                    <div class="text-danger" id="error-precio">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="cantidad" class="form-label">Cantidad</label>
                <input type="text" class="form-control" id="cantidad" name="cantidad" value="{{ old('cantidad', $producto->cantidad) }}">
                @error('cantidad')
                    <div class="text-danger" id="error-cantidad">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="imagen" class="form-label">Imagen del Producto (opcional)</label>
                <input type="file" class="form-control" id="imagen" name="imagen">
                @if($producto->imagen)
                    <div class="mt-2">
                        <img src="{{ asset($producto->imagen) }}" alt="{{ asset($producto->nombre) }}" style="max-width: 200px; height: auto;">
                    </div>
                @endif
            </div>
            <button type="submit" class="btn btn-primary">Actualizar</button>
        </form>
    </div>
</x-layout>
