<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'Inicio' }} :: Cepante</title>

    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>

<body>
    <header>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container-fluid">
                <a class="navbar-brand" href="{{ url('/') }}">
                    <img src="{{ asset('images/logo.png') }}" alt="Logo de Cepante" class="me-2">
                    <h1 class="visually-hidden">Cepante</h1>
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <x-nav-link href="{{ route('home') }}" :active="request()->routeIs('home')">Inicio</x-nav-link>
                        <x-nav-link href="{{ route('productos.index') }}" :active="request()->is('productos.index')">Productos</x-nav-link>
                        <x-nav-link href="{{ route('noticias.index') }}" :active="request()->is('noticias.index')">Noticias</x-nav-link>

                        @auth
                            @if (Auth::check() && Auth::user()->role === 'admin')
                                <!-- Solo se muestra si el usuario tiene el rol 'admin' -->
                                <x-nav-link href="{{ route('admin.dashboard') }}" :active="request()->routeIs('admin.dashboard.*')">Dashboard</x-nav-link>
                                <x-nav-link href="{{ route('admin.productos.index') }}" :active="request()->routeIs('admin.productos.*')">Administrar
                                    productos</x-nav-link>
                                <x-nav-link href="{{ route('admin.noticias.index') }}" :active="request()->routeIs('admin.noticias.*')">Administrar
                                    noticias</x-nav-link>
                                <x-nav-link href="{{ route('admin.usuarios.index') }}"
                                    :active="request()->routeIs('admin.usuarios.index')">Usuarios</x-nav-link>
                            @endif

                            <x-nav-link href="{{ route('profile.show') }}" :active="request()->routeIs('profile.show')">Mis datos</x-nav-link>

                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('carrito.index') }}">
                                    Carrito
                                    @auth
                                        @php
                                            $carrito = session()->get('carrito', []);
                                            $cantidadTotal = array_sum(array_column($carrito, 'cantidad'));
                                        @endphp
                                        @if ($cantidadTotal > 0)
                                            <span class="badge bg-danger">{{ $cantidadTotal }}</span>
                                        @endif
                                    @endauth
                                </a>
                            </li>

                            <li class="nav-item">
                                <a href="{{ route('logout') }}"
                                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                                    class="nav-link">Cerrar sesión</a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                    style="display: none;">
                                    @csrf
                                </form>
                            </li>
                        @endauth

                        @guest
                            <x-nav-link href="{{ route('login') }}">Iniciar sesión</x-nav-link>
                            <x-nav-link href="{{ route('register') }}">Registrarse</x-nav-link>
                        @endguest
                    </ul>

                </div>
            </div>
        </nav>
    </header>

    <main>
        {{ $slot }}
    </main>

    <footer class="footer">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-md-6">
                    <p class="fw-bold">Información de contacto</p>
                    <ul class="list-unstyled">
                        <li>Dirección: Calle Falsa 123, Buenos Aires</li>
                        <li>Teléfono: +54 9 11 6569 7890</li>
                        <li>Email: <a href="mailto:info@cepante.com">info@cepante.com</a></li>
                    </ul>
                </div>
                <div class="col-xs-12 col-md-6">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('home') }}">Inicio</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('productos.index') }}">Productos</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('noticias.index') }}">Noticias</a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="row mt-4">
                <div class="col-lg-12 text-center">
                    <p>&copy; {{ date('Y') }} Todos los derechos reservados.</p>
                </div>
            </div>
        </div>
    </footer>

    <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
</body>

</html>
