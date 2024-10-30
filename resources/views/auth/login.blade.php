<x-layout>
    <div class="container">
        <h2>Inicio de sesión</h2>

        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        @if (session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif

        <form action="{{ route('login') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" class="form-control" value="{{ old('email') }}">
                @error('email')
                    <div class="text-danger" id="error-email">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="password">Contraseña</label>
                <input type="password" id="password" name="password" class="form-control">
                @error('password')
                    <div class="text-danger" id="error-password">{{ $message }}</div>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary">Iniciar Sesión</button>
        </form>
        <div class="mt-3">
            <a href="{{ route('register') }}">¿No tienes una cuenta? Registrate aquí</a>
        </div>
    </div>
</x-layout>
