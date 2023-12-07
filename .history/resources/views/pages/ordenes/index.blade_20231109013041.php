<x-app-layout>
    <div class="w-full px-4 py-8 mx-auto sm:px-6 lg:px-8 max-w-9xl">
        <h1 class="mb-4 text-2xl font-bold">Selecciona una Mesa</h1>

        <div class="grid grid-cols-1 gap-4 sm:grid-cols-2 md:grid-cols-4">
            @foreach ($mesas as $mesa)
                <div class="w-full max-w-sm bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                    <div class="flex justify-end px-4 pt-4">
                        <!-- Puedes poner contenido aquí según tus necesidades -->
                    </div>
                    <div class="flex flex-col items-center pb-10">
                        <img class="w-24 h-24 mb-3 rounded-full shadow-lg" src="{{ asset('images/mesa.jpg') }}"
                            alt="mesas" />
                        <h5 class="mb-1 text-xl font-medium text-gray-900 dark:text-white"></h5>
                        <span class="text-sm text-gray-500 dark:text-gray-400">Mesa: Nº{{ $mesa->numero_mesa }}</span>
                        
                        @if ($mesa->estado == 'libre')
                            <!-- Mesa libre -->
                            <div class="flex mt-4 space-x-3 md:mt-6">
                                <a href="{{ route('orde.create', ['mesas_id' => $mesa->id]) }}"
                                    class="inline-flex items-center px-4 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                    Añadir orden
                                </a>
                            </div>
                        @elseif ($mesa->estado == 'ocupada' && $mesa->orden->estado == 'pendiente')
                            <!-- Mesa ocupada y con orden pendiente -->
                            <div class="flex mt-4 space-x-3 md:mt-6">
                                <a href="{{ route('o', ['orden_id' => $mesa->orden->id]) }}"
                                    class="inline-flex items-center px-4 py-2 text-sm font-medium text-center text-white bg-yellow-500 rounded-lg hover:bg-yellow-600 focus:ring-4 focus:outline-none focus:ring-yellow-300 dark:bg-yellow-400 dark:hover:bg-yellow-500 dark:focus:ring-yellow-600">
                                    Ver orden
                                </a>
                            </div>
                        @elseif ($mesa->estado == 'reservada')
                            <!-- Mesa reservada -->
                            <div class="flex mt-4 space-x-3 md:mt-6">
                                <button class="inline-flex items-center px-4 py-2 text-sm font-medium text-center text-white bg-red-500 rounded-lg cursor-not-allowed opacity-50"
                                    disabled>
                                    Reservada
                                </button>
                            </div>
                        @endif
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</x-app-layout>
