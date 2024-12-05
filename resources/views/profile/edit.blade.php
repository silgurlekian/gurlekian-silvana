<x-layout>
    <x-slot:title>Editar perfil</x-slot:title>

    <div class="container">
        <h2 class="h1 my-4">Editar perfil</h2>

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

        <form action="{{ route('profile.update') }}" method="POST" class="pb-3">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="name" class="form-label">Nombre</label>
                <input type="text" name="name" id="name" class="form-control" value="{{ Auth::user()->name }}">
                
                <!-- Mostrar mensaje de error para 'name' -->
                @error('name')
                    <div class="text-danger" id="error-name">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" name="email" id="email" class="form-control" value="{{ Auth::user()->email }}" disabled>
            </div>

            <div class="mb-3">
                <label for="password" class="form-label">Nueva Contraseña</label>
                <input type="password" name="password" id="password" class="form-control">
                
                <!-- Mostrar mensaje de error para 'password' -->
                @error('password')
                    <div class="text-danger" id="error-password">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="password_confirmation" class="form-label">Confirmar Nueva Contraseña</label>
                <input type="password" name="password_confirmation" id="password_confirmation" class="form-control">
                
                <!-- Mostrar mensaje de error para 'password_confirmation' -->
                @error('password_confirmation')
                    <div class="text-danger" id="error-password-confirmation">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary mt-3">Guardar Cambios</button>
        </form>
    </div>
</x-layout>