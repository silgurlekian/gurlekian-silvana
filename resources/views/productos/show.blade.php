<x-layout>
    <x-slot:title>{{ $producto->nombre }}</x-slot:title>

    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-sm-3">
                <img src="{{ asset($producto->imagen) }}" class="img-fluid d-block" alt="{{ $producto->nombre }}">
            </div>
            <div class="col-xs-12 col-sm-9">
                <h2 class="h1">{{ $producto->nombre }}</h2>
                <p>{{ $producto->descripcion }}</p>

                <p class="card-text precio"><strong>$ {{ $producto->precio }}</strong></p>

                <form action="{{ route('carrito.add', $producto->id) }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="cantidad">Cantidad</label>
                        <input type="number" name="cantidad" id="cantidad" value="1" min="1"
                            class="form-control" required>
                    </div>
                    <button class="btn btn-primary mt-3">Añadir al carrito</button>
                </form>

            </div>

        </div>

        <div class="row my-4 pb-4">
            <h3 class="mb-4">Ficha técnica</h3>
            <div class="col-xs-12 col-md-6">
                <ol class="list-group">
                    <li class="list-group-item d-flex justify-content-between align-items-start">
                        <div class="ms-2 me-auto">
                            <div class="fw-bold">Bodega</div>
                            {{ $producto->bodega }}
                        </div>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-start">
                        <div class="ms-2 me-auto">
                            <div class="fw-bold">Variedad</div>
                            {{ $producto->variedad }}
                        </div>
                    </li>
                </ol>
            </div>
            <div class="col-xs-12 col-md-6">
                <ol class="list-group">
                    <li class="list-group-item d-flex justify-content-between align-items-start">
                        <div class="ms-2 me-auto">
                            <div class="fw-bold">País</div>
                            Argentina
                        </div>
                    </li>
                </ol>
            </div>
        </div>

        <a href="{{ route('productos.index') }}" class="btn btn-secondary mt-3">Volver a la lista</a>
    </div>
</x-layout>
