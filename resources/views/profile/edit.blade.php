<x-layout title="Editar Perfil">
    <div class="container">
        <h1>Editar Perfil</h1>
        
        <!-- Mensajes de éxito o error -->
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

        <form action="{{ route('profile.update') }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="name" class="form-label">Nombre</label>
                <input type="text" name="name" id="name" class="form-control" value="{{ Auth::user()->name }}" required>
            </div>

            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" name="email" id="email" class="form-control" value="{{ Auth::user()->email }}" required>
            </div>

            <button type="submit" class="btn btn-success">Guardar Cambios</button>
        </form>
    </div>
</x-layout>
