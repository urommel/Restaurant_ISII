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
                            <div
                                class="grid grid-cols-3 p-4 text-sm font-medium text-gray-900 bg-gray-100 border-t border-b border-gray-200 gap-x-16 dark:bg-gray-800 dark:border-gray-700 dark:text-white">
                                <div class="flex items-center">Roles</div>
                                <div></div>
                                <div></div>
                            </div>

                            @php
                                $role = Spatie\Permission\Models\Role::find(1);
                                    // Aquí asigna el rol específico que deseas mostrar;
                                    $permissions = $role->permissions->pluck('name')->toArray();
                                $chunkedPermissions = array_chunk($permissions, 3);
                            @endphp

                            @foreach ($chunkedPermissions as $chunk)
                                <div
                                    class="grid grid-cols-3 px-4 py-5 text-sm text-gray-700 border-b border-gray-200 gap-x-16 dark:border-gray-700">
                                    <div class="text-gray-500 dark:text-gray-400"></div>
                                    @foreach ($chunk as $permission)
                                        <div>
                                            <svg class="w-3 h-3 text-green-500" aria-hidden="true"
                                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 16 12">
                                                <path stroke="currentColor" stroke-linecap="round"
                                                    stroke-linejoin="round" stroke-width="2"
                                                    d="M1 5.917 5.724 10.5 15 1.5" />
                                            </svg>
                                            {{ $permission }}
                                        </div>
                                    @endforeach
                                    <div>
                                        <label class="inline-flex items-center">
                                            <input type="checkbox" name="permissions[]"
                                                value="{{ implode(',', $chunk) }}" class="form-checkbox">
                                            <span class="ml-2">Seleccionar todo</span>
                                        </label>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>

                </div>
                <button type="submit" class="px-4 py-2 text-white bg-blue-500 rounded-lg hover:bg-blue-700">Crear
                    Rol</button>
            </form>
        </div>
</x-app-layout>
