<x-app-layout>
    <div class="w-full px-4 py-8 mx-auto sm:px-6 lg:px-8 max-w-9xl">
        <h1 class="mb-4 text-2xl font-bold">Selecciona una Mesa</h1>

        <div class="grid grid-cols-1 gap-4 sm:grid-cols-2 md:grid-cols-4">
            @foreach ($mesas as $mesa)
                <div
                    class="w-full max-w-sm bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                    <div class="flex justify-end px-4 pt-4">
                        <!-- Puedes poner contenido aquí según tus necesidades -->
                    </div>
                    <div class="flex flex-col items-center pb-10">
                        <img class="w-24 h-24 mb-3 rounded-full shadow-lg" src="{{ asset('images/mesa.jpg') }}"
                            alt="mesas" />
                        <h5 class="mb-1 text-xl font-medium text-gray-900 dark:text-white"></h5>
                        <span class="text-sm text-gray-500 dark:text-gray-400">Mesa: Nº{{ $mesa->numero_mesa }}</span>
                        <div class="flex mt-4 space-x-3 md:mt-6">
                            <a href="{{ route('orde.create', ['mesas_id' => $mesa->id]) }}"
                                class="inline-flex items-center px-4 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                Añadir orden
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</x-app-layout>
