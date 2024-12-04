<x-layout>
    <x-slot:title>Perfil de usuario</x-slot:title>

    <div class="container">
        <h2 class="h1 my-4">Mis datos</h2>
        <p><strong>Nombre:</strong> {{ Auth::user()->name }}</p>
        <p><strong>Email:</strong> {{ Auth::user()->email }}</p>

        <a href="{{ route('profile.edit') }}" class="btn btn-primary mt-3">Editar Perfil</a>
    </div>
</x-layout>
