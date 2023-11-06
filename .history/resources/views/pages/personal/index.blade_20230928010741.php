<x-app-layout>
    <div class="w-full px-4 py-8 mx-auto sm:px-6 lg:px-8 max-w-9xl">
        <div class="relative overflow-x-auto">
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
                        <th scope="col" class="px-6 py-3">
                            Horario
                        </th>
                        {{-- <th scope="col" class="px-6 py-3">
                                Acciones
                            </th> --}}
                    </tr>
                </thead>
                @foreach ($personals as $)
                    <tbody>
                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                            <th scope="row"
                                class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                {{ $empleado->id }}
                            </th>
                            <td class="px-6 py-4">
                                {{ $empleado->apellido }}
                            </td>
                            <td class="px-6 py-4">
                                {{ $empleado->user->name }}
                            </td>
                            <td class="px-6 py-4">
                                {{ $empleado->dni }}
                            </td>
                            <td class="px-6 py-4">
                                {{ $empleado->phone }}
                            </td>
                            <td class="px-6 py-4">
                                {{ $empleado->salario }}
                            </td>
                            <td class="px-6 py-4">
                                {{-- {{ $empleado->fecha_inicio }} --}}
                                {{-- {{ date('d-m-Y', strtotime($empleado->fecha_inicio)) }} --}}
                                {{ date('d, F Y', strtotime($empleado->fecha_inicio)) }}
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

                            <td class="px-6 py-4">
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
                            </td>
                        </tr>
                    </tbody>
                @endforeach
            </table>
        </div>
    </div>
</x-app-layout>
