<x-app-layout>
    <div class="w-full px-4 py-8 mx-auto sm:px-6 lg:px-8 max-w-9xl">
        <div class="container mx-auto mt-8">
            <h1 class="mb-4 text-2xl font-semibold">Editar Rol y Asignar Permisos</h1>
            <form method="POST" action="{{ route('roles.store') }}">
                @csrf

                @include('pages.roles.form')

            </form>
        </div>
</x-app-layout>
