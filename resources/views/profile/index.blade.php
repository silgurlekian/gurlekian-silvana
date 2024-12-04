<x-layout title="Perfil de Usuario">
    <div class="container">
        <h1>Perfil de Usuario</h1>
        <p><strong>Nombre:</strong> {{ Auth::user()->name }}</p>
        <p><strong>Email:</strong> {{ Auth::user()->email }}</p>
        <p><strong>Rol:</strong> {{ Auth::user()->role }}</p>

        <a href="{{ route('profile.edit') }}" class="btn btn-primary">Editar Perfil</a>
    </div>
</x-layout>
