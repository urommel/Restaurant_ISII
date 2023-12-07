<x-app-layout>
    <div class="w-full px-4 py-8 mx-auto sm:px-6 lg:px-8 max-w-9xl">
        <div class="relative overflow-x-auto shadow-md sm:rounded-lg">

            <div class="flex items-center justify-between pb-4 bg-white dark:bg-gray-900">
                <label for="table-search" class="sr-only">Buscar</label>
                <div class="relative flex items-center mt-1">
                    <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                        <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                        </svg>
                    </div>
                    <input type="text" id="table-search"
                        class="block p-2 pl-10 text-sm text-gray-900 border border-gray-300 rounded-lg w-80 bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder="Buscar roles">
                </div>

                @can('Editar-Rol')
                    <div class="relative mt-1">
                        <!-- Add view button -->
                        <button class="text-white bg-indigo-500 btn hover:bg-indigo-600">
                            <svg class="w-4 h-4 opacity-50 fill-current shrink-0" viewBox="0 0 16 16">
                                <path
                                    d="M15 7H9V1c0-.6-.4-1-1-1S7 .4 7 1v6H1c-.6 0-1 .4-1 1s.4 1 1 1h6v6c0 .6.4 1 1 1s1-.4 1-1V9h6c.6 0 1-.4 1-1s-.4-1-1-1z" />
                            </svg>

                            <a href="{{ route('roles.create') }}"><span class="hidden ml-2 xs:block">Crear nuevo</span></a>

                        </button>
                    </div>
                @endcan
            </div>

            <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="p-4">
                            <div class="flex items-center">
                                <input id="checkbox-all-search" type="checkbox"
                                    class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                <label for="checkbox-all-search" class="sr-only">checkbox</label>
                            </div>
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Rol
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Permisos
                        </th>
                        {{-- <th scope="col" class="px-6 py-3">
                            Category
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Price
                        </th> --}}
                        <th scope="col" class="px-6 py-3">
                            Acción
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($roles as $role)
                        <tr
                            class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                            <td class="w-4 p-4">
                                <div class="flex items-center">
                                    <input id="checkbox-table-search-1" type="checkbox"
                                        class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                    <label for="checkbox-table-search-1" class="sr-only">checkbox</label>
                                </div>
                            </td>
                            <th scope="row"
                                class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                {{ $role->name }}
                            </th>
                            {{-- <td class="px-6 py-4">
                            Silver
                        </td>
                        <td class="px-6 py-4">
                            Laptop
                        </td> --}}
                            {{-- <td class="px-6 py-4">
                                <ul>
                                    <span
                                        class="px-2 py-1 font-semibold leading-tight text-green-700 bg-green-100 rounded-full dark:bg-green-700 dark:text-green-100">
                                        @foreach ($role->permissions as $permission)
                                            <li>{{ $permission->name }}</li>
                                        @endforeach
                                    </span>
                                </ul>
                            </td> --}}
                            <td class="px-6 py-4">
                                @php $permissions = $role->permissions->pluck('name')->toArray(); @endphp

                                <div class="flex flex-wrap space-x-2">
                                    @foreach ($permissions as $permission)
                                        <div
                                            class="px-2 py-1 font-semibold leading-tight text-blue-700 bg-blue-100 rounded-full dark:bg-blue-700 dark:text-blue-100">
                                            {{ $permission }},
                                        </div>
                                    @endforeach
                                </div>
                            </td>


                            {{-- <td class="px-6 py-4">
                                <div>
                                    <a href="#"
                                        class="text-white focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-full text-sm p-2.5 text-center inline-flex items-center mr-2 dark:bg-white dark:hover:bg-white dark:text-black dark:focus:ring-white"><svg
                                            xmlns="http://www.w3.org/2000/svg" height="1em"
                                            viewBox="0 0 640 512">
                                            <path
                                                d="M224 256c70.7 0 128-57.3 128-128S294.7 0 224 0 96 57.3 96 128s57.3 128 128 128zm89.6 32h-16.7c-22.2 10.2-46.9 16-72.9 16s-50.6-5.8-72.9-16h-16.7C60.2 288 0 348.2 0 422.4V464c0 26.5 21.5 48 48 48h274.9c-2.4-6.8-3.4-14-2.6-21.3l6.8-60.9 1.2-11.1 7.9-7.9 77.3-77.3c-24.5-27.7-60-45.5-99.9-45.5zm45.3 145.3l-6.8 61c-1.1 10.2 7.5 18.8 17.6 17.6l60.9-6.8 137.9-137.9-71.7-71.7-137.9 137.8zM633 268.9L595.1 231c-9.3-9.3-24.5-9.3-33.8 0l-37.8 37.8-4.1 4.1 71.8 71.7 41.8-41.8c9.3-9.4 9.3-24.5 0-33.9z" />
                                        </svg></a>
                                </div>
                                <div>
                                    <a href="#"
                                        class="text-white focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-full text-sm p-2.5 text-center inline-flex items-center mr-2 dark:bg-white dark:hover:bg-white dark:text-black dark:focus:ring-white">
                                        <svg xmlns="http://www.w3.org/2000/svg" height="1em"
                                            viewBox="0 0 640 512">
                                            <path
                                                d="M633.8 458.1L362.3 248.3C412.1 230.7 448 183.8 448 128 448 57.3 390.7 0 320 0c-67.1 0-121.5 51.8-126.9 117.4L45.5 3.4C38.5-2 28.5-.8 23 6.2L3.4 31.4c-5.4 7-4.2 17 2.8 22.4l588.4 454.7c7 5.4 17 4.2 22.5-2.8l19.6-25.3c5.4-6.8 4.1-16.9-2.9-22.3zM96 422.4V464c0 26.5 21.5 48 48 48h350.2L207.4 290.3C144.2 301.3 96 356 96 422.4z" />
                                        </svg></a>
                                </div>
                            </td> --}}

                            <td class="px-6 py-4">
                                <div class="flex flex-wrap justify-center items-center">
                                    <div class="mb-2 sm:mb-0">
                                        <a href="#" class="text-white focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-full text-sm p-2.5 text-center inline-flex items-center mr-2 dark:bg-white dark:hover:bg-white dark:text-black dark:focus:ring-white">
                                            <svg
                                            xmlns="http://www.w3.org/2000/svg" height="1em"
                                            viewBox="0 0 640 512">
                                            <path
                                                d="M224 256c70.7 0 128-57.3 128-128S294.7 0 224 0 96 57.3 96 128s57.3 128 128 128zm89.6 32h-16.7c-22.2 10.2-46.9 16-72.9 16s-50.6-5.8-72.9-16h-16.7C60.2 288 0 348.2 0 422.4V464c0 26.5 21.5 48 48 48h274.9c-2.4-6.8-3.4-14-2.6-21.3l6.8-60.9 1.2-11.1 7.9-7.9 77.3-77.3c-24.5-27.7-60-45.5-99.9-45.5zm45.3 145.3l-6.8 61c-1.1 10.2 7.5 18.8 17.6 17.6l60.9-6.8 137.9-137.9-71.7-71.7-137.9 137.8zM633 268.9L595.1 231c-9.3-9.3-24.5-9.3-33.8 0l-37.8 37.8-4.1 4.1 71.8 71.7 41.8-41.8c9.3-9.4 9.3-24.5 0-33.9z" />
                                        </svg>
                                        </a>
                                    </div>
                                    <div>
                                        <a href="#" class="text-white focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-full text-sm p-2.5 text-center inline-flex items-center mr-2 dark:bg-white dark:hover:bg-white dark:text-black dark:focus:ring-white">
                                            <svg xmlns="http://www.w3.org/2000/svg" height="1em"
                                            viewBox="0 0 640 512">
                                            <path
                                                d="M633.8 458.1L362.3 248.3C412.1 230.7 448 183.8 448 128 448 57.3 390.7 0 320 0c-67.1 0-121.5 51.8-126.9 117.4L45.5 3.4C38.5-2 28.5-.8 23 6.2L3.4 31.4c-5.4 7-4.2 17 2.8 22.4l588.4 454.7c7 5.4 17 4.2 22.5-2.8l19.6-25.3c5.4-6.8 4.1-16.9-2.9-22.3zM96 422.4V464c0 26.5 21.5 48 48 48h350.2L207.4 290.3C144.2 301.3 96 356 96 422.4z" />
                                        </svg>
                                        </a>
                                    </div>
                                </div>
                            </td>

                            <td class="px-6 py-4">
                                <div class="space-x-2"> <!-- Utiliza "space-x" para espacio horizontal y "space-y" para espacio vertical -->
                                    <a href="#" class="text-white focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-full text-sm p-2.5 text-center inline-flex items-center dark:bg-white dark:hover:bg-white dark:text-black dark:focus:ring-white">
                                        <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 640 512">
                                            <!-- ... (Icono 1) -->
                                        </svg>
                                    </a>
                                    <a href="#" class="text-white focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-full text-sm p-2.5 text-center inline-flex items-center dark:bg-white dark:hover:bg-white dark:text-black dark:focus:ring-white">
                                        <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 640 512">
                                            <!-- ... (Icono 2) -->
                                        </svg>
                                    </a>
                                </div>
                            </td>


                        </tr>
                    @endforeach
                </tbody>
            </table>
            <nav class="flex items-center justify-between pt-4" aria-label="Table navigation">
                <span class="text-sm font-normal text-gray-500 dark:text-gray-400">
                    Mostrar <span class="font-semibold text-gray-900 dark:text-white">
                        {{ $roles->firstItem() }}-{{ $roles->lastItem() }}
                    </span> de <span class="font-semibold text-gray-900 dark:text-white">
                        {{ $roles->total() }}
                    </span>
                </span>
                <ul class="inline-flex h-8 -space-x-px text-sm">
                    <li>
                        <a href="{{ $roles->previousPageUrl() }}"
                            class="flex items-center justify-center h-8 px-3 ml-0 leading-tight text-gray-500 bg-white border border-gray-300 rounded-l-lg hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white"
                            @if (!$roles->onFirstPage()) aria-label="Anterior" @endif>
                            Anterior
                        </a>
                    </li>
                    @foreach ($roles as $role)
                        <!-- Mostrar el número de página actual como texto -->
                        <li>
                            <span
                                class="flex items-center justify-center h-8 px-3 leading-tight text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">
                                {{ $loop->iteration }}
                            </span>
                        </li>
                    @endforeach
                    <li>
                        <a href="{{ $roles->nextPageUrl() }}"
                            class="flex items-center justify-center h-8 px-3 leading-tight text-gray-500 bg-white border border-gray-300 rounded-r-lg hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white"
                            @if ($roles->hasMorePages()) aria-label="Siguiente" @endif>
                            Siguiente
                        </a>
                    </li>
                </ul>
            </nav>
        </div>

</x-app-layout>
