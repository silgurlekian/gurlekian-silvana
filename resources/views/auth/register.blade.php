<x-layout>
    <div class="container mt-5">
        <h2 class="mb-4">Registro</h2>

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

        <form action="{{ route('register') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Nombre</label>
                <input type="text" id="name" name="name" class="form-control" value="{{ old('name') }}">
                @error('name')
                    <div class="text-danger" id="error-name">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" id="email" name="email" class="form-control" value="{{ old('email') }}">
                @error('email')
                    <div class="text-danger" id="error-email">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Contraseña</label>
                <input type="password" id="password" name="password" class="form-control">
                @error('password')
                    <div class="text-danger" id="error-password">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="password_confirmation" class="form-label">Confirmar contraseña</label>
                <input type="password" id="password_confirmation" name="password_confirmation" class="form-control">
                @error('password_confirmation')
                    <div class="text-danger" id="error-password_confirmation">{{ $message }}</div>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary">Registrarse</button>
        </form>
        <div class="mt-3">
            <a href="{{ route('login') }}">¿Ya tienes una cuenta? Inicia sesión aquí</a>
        </div>
    </div>
</x-layout>
