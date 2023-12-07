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
                    {{-- @foreach ($permissions as $permission)
                        <label class="inline-flex items-center">
                            <input type="checkbox" name="permissions[]" value="{{ $permission->name }}" class="form-checkbox">
                            <span class="ml-2">{{ $permission->name }}</span>
                        </label>
                    @endforeach --}}
                    <div id="detailed-pricing" class="w-full overflow-x-auto">
                        <div class="overflow-hidden min-w-max">
                            <table class="w-full table-auto">
                                <thead>
                                    <tr>
                                        <th>Rol</th>
                                        @foreach ($permissions as $permission)
                                            <th>{{ $permission->name }}</th>
                                        @endforeach
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($roles as $role)
                                        <tr>
                                            <td>{{ $role->name }}</td>
                                            @foreach ($permissions as $permission)
                                                <td>
                                                    <label class="inline-flex items-center">
                                                        <input type="checkbox" name="permissions[{{ $role->id }}][]" value="{{ $permission->id }}" class="form-checkbox">
                                                        <span class="ml-2">{{ $permission->name }}</span>
                                                    </label>
                                                </td>
                                            @endforeach
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
</x-app-layout>
