{{-- <x-app-layout>
    <div class="w-full px-4 py-8 mx-auto sm:px-6 lg:px-8 max-w-9xl">
        <div class="container mx-auto mt-8">
            <h1 class="mb-4 text-2xl font-semibold">Crear Rol y Asignar Permisos</h1>
            <form method="POST" action="{{ route('roles.store') }}">
                @csrf
                <div class="mb-4">
                    <label for="role_name" class="block mb-2 font-bold text-gray-700">Nombre del Rol:</label>
                    <input type="text" id="role_name" name="name" class="w-full px-4 py-2 border rounded-lg">
                </div>
                <div class="mb-4">
                    <label class="block mb-2 font-bold text-gray-700">Permisos:</label>
                    @foreach ($permissions as $permission)
                        <label class="inline-flex items-center">
                            <input type="checkbox" name="permissions[]" value="{{ $permission->name }}" class="form-checkbox">
                            <span class="ml-2">{{ $permission->name }}</span>
                        </label>
                    @endforeach
                    <div id="detailed-pricing" class="w-full overflow-x-auto">
                        <div class="overflow-hidden min-w-max">
                            <table class="w-full table-auto">
                                <thead>
                                    <tr>
                                        <th>Permiso</th>
                                        <th>Asignar a Rol</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($permissions as $permission)
                                        <tr>
                                            <td>{{ $permission->name }}</td>
                                            <td>
                                                <label class="inline-flex items-center">
                                                    <input type="checkbox" name="permissions[]" value="{{ $permission->id }}" class="form-checkbox">
                                                </label>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    



                </div>
                <button type="submit" class="px-4 py-2 text-white bg-blue-500 rounded-lg hover:bg-blue-700">Crear
                    Rol</button>
            </form>
        </div>
</x-app-layout> --}}


<x-app-layout>
    <div class="w-full px-4 py-8 mx-auto sm:px-6 lg:px-8 max-w-9xl">
        <div class="container mx-auto mt-8">
            <h1 class="mb-4 text-2xl font-semibold">Crear Rol y Asignar Permisos</h1>
            <form method="POST" action="{{ route('roles.store') }}">
                @csrf
                <div class="mb-4">
                    <label for="role_name" class="block mb-2 font-bold text-gray-700">Nombre del Rol:</label>
                    <input type="text" id="role_name" name="name" class="w-full px-4 py-2 border rounded-lg">
                </div>
                <div class="mb-4">
                    <label class="block mb-2 font-bold text-gray-700">Permisos:</label>
                    <div id="permissions-container" class="grid grid-cols-3 gap-4">
                        @foreach ($permissions as $permission)
                            <div
                                class="px-2 py-1 font-semibold leading-tight text-green-700 bg-green-100 rounded-full dark:bg-green-700 dark:text-green-100">
                                <label class="inline-flex items-center">
                                    <input type="checkbox" name="permissions[]" value="{{ $permission->id }}"
                                        class="form-checkbox">
                                    <span class="ml-2">{{ $permission->name }}</span>
                                </label>
                            </div>
                        @endforeach
                    </div>
                </div>
                <button type="submit" class="px-4 py-2 text-white bg-blue-500 rounded-lg hover:bg-blue-700">Crear
                    Rol</button>
            </form>
        </div>
    </div>
</x-app-layout>

<script>
    // JavaScript para organizar los permisos en filas y columnas
    document.addEventListener('DOMContentLoaded', function() {
        const permissionsContainer = document.getElementById('permissions-container');
        const permissionElements = permissionsContainer.querySelectorAll('.font-semibold');

        const numColumns = 3; // Número de columnas

        for (let i = 0; i < permissionElements.length; i += numColumns) {
            const row = document.createElement('div');
            row.classList.add('grid', 'grid-cols-3', 'gap-4');

            for (let j = 0; j < numColumns; j++) {
                const permissionElement = permissionElements[i + j];
                if (permissionElement) {
                    row.appendChild(permissionElement);
                }
            }

            permissionsContainer.insertBefore(row, permissionElements[i]);
        }
    });
</script>
