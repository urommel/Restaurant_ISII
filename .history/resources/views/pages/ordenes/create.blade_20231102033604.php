<x-app-layout>
    <div class="w-full px-4 py-8 mx-auto sm:px-6 lg:px-8 max-w-9xl">
        <div class="grid grid-cols-1 gap-8 lg:grid-cols-2">
            <!-- Sección de Productos -->
            <div class="mb-8">
                <h2 class="mb-4 text-xl font-bold">Lista de Productos</h2>
                <div class="grid grid-cols-1 gap-4 md:grid-cols-2 lg:grid-cols-1 xl:grid-cols-2">
                    @foreach ($platos as $plato)
                        <!-- Contenido de la sección de productos -->
                        <div class="flex flex-col items-center mb-4 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                            <a href="#" class="flex-shrink-0">
                                <img class="p-4 rounded-lg" src="/docs/images/products/apple-watch.png" alt="product image" />
                            </a>
                            <div class="flex-grow px-4">
                                <a href="#">
                                    <h5 class="text-lg font-semibold text-gray-900 dark:text-white">{{ $plato->nombre }}</h5>
                                </a>
                                <div class="flex items-center justify-between mt-2">
                                    <span class="text-xl font-bold text-gray-900 dark:text-white">${{ $plato->precio }}</span>
                                    <div class="flex items-center">
                                        <input type="number" id="quantity_{{ $plato->id }}" min="1" value="1" class="p-2 mr-2 border rounded">
                                        <button onclick="agregarAlCarrito('{{ $plato->nombre }}', {{ $plato->precio }}, document.getElementById('quantity_{{ $plato->id }}').value)"
                                            class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Add</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>

            <!-- Sección de Factura -->
            <div class="lg:pl-8">
                <h2 class="mb-4 text-xl font-bold">Factura</h2>
                <div class="px-4 py-3 bg-transparent border-b card-header">
                    <!-- Contenido de la sección de factura -->
                    <!-- ... -->
                </div>
            </div>
        </div>
    </div>

    <script>
        @verbatim
        // Tu código JavaScript aquí
        @endverbatim
    </script>
</x-app-layout>


