<x-layout>
    <x-slot:title>Productos</x-slot:title>

    <div class="container">
        <h2 class="h1 my-4">Nuestros Productos</h2>
        <div class="row">
            @foreach($productos as $producto)
                <div class="col-md-4">
                    <div class="card mb-4 shadow-sm">
                        <img src="{{ asset($producto->imagen) }}" class="card-img-producto" alt="{{ $producto->nombre }}">
                        <div class="card-body">
                            <h3 class="card-title">{{ $producto->nombre }}</h3>
                            <p class="card-text descripcion">{{ $producto->descripcion }}</p> 
                            <p class="card-text"><strong>Precio:</strong> ${{ number_format($producto->precio, 2) }}</p>
                            <a href="{{ route('productos.show', $producto->id) }}" class="btn btn-primary">Ver Detalle</a> 
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</x-layout>