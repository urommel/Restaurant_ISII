<x-app-layout>
    <div class="w-full px-4 py-8 mx-auto sm:px-6 lg:px-8 max-w-9xl">
        <div class="relative overflow-x-auto">
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
                
                @can('Crear-Rol')
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
                        <th scope="col" class="px-6 py-3">
                            Nº
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Apellidos
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Nombre
                        </th>
                        <th scope="col" class="px-6 py-3">
                            DNI
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Celular
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Salario
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Fecha de Ingreso
                        </th>
                        {{-- <th scope="col" class="px-6 py-3">
                            Horario
                        </th> --}}
                        {{-- <th scope="col" class="px-6 py-3">
                                Acciones
                            </th> --}}
                    </tr>
                </thead>
                @foreach ($personals as $personal)
                    <tbody>
                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                            <th scope="row"
                                class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                {{ $personal->id }}
                            </th>
                            <td class="px-6 py-4">
                                {{ $personal->apellido }}
                            </td>
                            <td class="px-6 py-4">
                                {{ $personal->user->name }}
                            </td>
                            <td class="px-6 py-4">
                                {{ $personal->dni }}
                            </td>
                            <td class="px-6 py-4">
                                {{ $personal->phone }}
                            </td>
                            <td class="px-6 py-4">
                                {{ $personal->salario }}
                            </td>
                            <td class="px-6 py-4">
                                {{-- {{ $empleado->fecha_inicio }} --}}
                                {{-- {{ date('d-m-Y', strtotime($empleado->fecha_inicio)) }} --}}
                                {{ date('d, F Y', strtotime($personal->fecha_inicio)) }}
                            </td>
                            {{-- <td class="px-6 py-4">
                                <a href="{{ route('horarios.create', ['empleado_id' => $empleado->id]) }}"
                                    class="text-white  focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-full text-sm p-2.5 text-center inline-flex items-center mr-2 dark:bg-white dark:hover:bg-white dark:text-black dark:focus:ring-white">
                                    <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 512 512">
                                        <path
                                            d="M464 256A208 208 0 1 1 48 256a208 208 0 1 1 416 0zM0 256a256 256 0 1 0 512 0A256 256 0 1 0 0 256zM232 120V256c0 8 4 15.5 10.7 20l96 64c11 7.4 25.9 4.4 33.3-6.7s4.4-25.9-6.7-33.3L280 243.2V120c0-13.3-10.7-24-24-24s-24 10.7-24 24z" />
                                    </svg> --}}
                            {{-- <span class="sr-only">Icon description</span> --}}
                            {{-- </a>
                            </td> --}}

                            {{-- <td class="px-6 py-4">
                                @php
                                    $horario = $empleado->horarios->first(); // Obtener el primer horario del empleado
                                @endphp

                                @if ($horario)
                                    <a href="{{ route('horarios.show', ['horario' => $horario->id]) }}"
                                        class="text-white focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-full text-sm p-2.5 text-center inline-flex items-center mr-2 dark:bg-white dark:hover:bg-white dark:text-black dark:focus:ring-white">
                                        <svg xmlns="http://www.w3.org/2000/svg" height="1em"
                                            viewBox="0 0 448 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. -->
                                            <path
                                                d="M0 464c0 26.5 21.5 48 48 48h352c26.5 0 48-21.5 48-48V192H0v272zm320-196c0-6.6 5.4-12 12-12h40c6.6 0 12 5.4 12 12v40c0 6.6-5.4 12-12 12h-40c-6.6 0-12-5.4-12-12v-40zm0 128c0-6.6 5.4-12 12-12h40c6.6 0 12 5.4 12 12v40c0 6.6-5.4 12-12 12h-40c-6.6 0-12-5.4-12-12v-40zM192 268c0-6.6 5.4-12 12-12h40c6.6 0 12 5.4 12 12v40c0 6.6-5.4 12-12 12h-40c-6.6 0-12-5.4-12-12v-40zm0 128c0-6.6 5.4-12 12-12h40c6.6 0 12 5.4 12 12v40c0 6.6-5.4 12-12 12h-40c-6.6 0-12-5.4-12-12v-40zM64 268c0-6.6 5.4-12 12-12h40c6.6 0 12 5.4 12 12v40c0 6.6-5.4 12-12 12H76c-6.6 0-12-5.4-12-12v-40zm0 128c0-6.6 5.4-12 12-12h40c6.6 0 12 5.4 12 12v40c0 6.6-5.4 12-12 12H76c-6.6 0-12-5.4-12-12v-40zM400 64h-48V16c0-8.8-7.2-16-16-16h-32c-8.8 0-16 7.2-16 16v48H160V16c0-8.8-7.2-16-16-16h-32c-8.8 0-16 7.2-16 16v48H48C21.5 64 0 85.5 0 112v48h448v-48c0-26.5-21.5-48-48-48z" />
                                        </svg>
                                    </a>
                                @else
                                    <a href="{{ route('horarios.create', ['empleado_id' => $empleado->id]) }}"
                                        class="text-white focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-full text-sm p-2.5 text-center inline-flex items-center mr-2 dark:bg-white dark:hover:bg-white dark:text-black dark:focus:ring-white">
                                        <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 512 512">
                                            <path
                                                d="M464 256A208 208 0 1 1 48 256a208 208 0 1 1 416 0zM0 256a256 256 0 1 0 512 0A256 256 0 1 0 0 256zM232 120V256c0 8 4 15.5 10.7 20l96 64c11 7.4 25.9 4.4 33.3-6.7s4.4-25.9-6.7-33.3L280 243.2V120c0-13.3-10.7-24-24-24s-24 10.7-24 24z" />
                                        </svg>
                                    </a>
                                @endif
                            </td> --}}
                        </tr>
                    </tbody>
                @endforeach
            </table>
        </div>
    </div>
</x-app-layout>
