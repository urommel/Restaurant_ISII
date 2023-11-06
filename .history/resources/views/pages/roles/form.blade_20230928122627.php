{{-- <div class="mb-4">
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
</div>
<button type="submit" class="px-4 py-2 text-white bg-blue-500 rounded-lg hover:bg-blue-700">Crear
    Rol</button> --}}

<div class="mb-4">
    <label for="role_name" class="block mb-2 font-bold text-gray-700">Nombre del Rol:</label>
    <input type="text" id="role_name" name="name" class="w-full px-4 py-2 border rounded-lg"
        value="{{ old('name', isset($role) ? $role->name : '') }}">
</div>

<div class="mb-4">
    <label class="block mb-2 font-bold text-gray-700">Permisos:</label>
    @foreach ($permissions as $permission)
        <label class="inline-flex items-center">
            <input type="checkbox" name="permissions[]" value="{{ $permission->name }}" class="form-checkbox"
                {{ in_array($permission->name, old('permissions', isset($role) ? $role->permissions->pluck('name')->toArray() : [])) ? 'checked' : '' }}>
            <span class="ml-2">{{ $permission->name }}</span>
        </label>
    @endforeach
</div>

<button type="submit" class="px-4 py-2 text-white bg-blue-500 rounded-lg hover:bg-blue-700">
    @if (isset($role))
        Actualizar Rol
    @else
        Crear Rol
    @endif
</button>
