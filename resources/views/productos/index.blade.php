<x-layout>
    <div class="container">
        <h1 class="my-4">Nuestros Productos</h1>
        <div class="row">
            @foreach($productos as $producto)
                <div class="col-md-4">
                    <div class="card mb-4 shadow-sm">
                        <img src="{{ asset($producto->imagen) }}" class="card-img-top" alt="{{ $producto->nombre }}">
                        <div class="card-body">
                            <h5 class="card-title">{{ $producto->nombre }}</h5>
                            <p class="card-text">{{ $producto->descripcion }}</p>
                            <p class="card-text"><strong>Precio:</strong> ${{ $producto->precio }}</p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</x-layout>
