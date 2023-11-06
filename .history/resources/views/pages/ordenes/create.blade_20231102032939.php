

<x-app-layout>
    <div class="w-full px-4 py-8 mx-auto sm:px-6 lg:px-8 max-w-9xl">
        <div class="grid grid-cols-1 gap-8 md:grid-cols-2">
            <!-- Sección de Productos -->
            <div class="h-full mb-8">
                <h2 class="mb-4 text-xl font-bold">Lista de Productos</h2>
                <div class="grid h-full grid-cols-1 gap-4 sm:grid-cols-2 lg:grid-cols-3">
                    <!-- Contenido de la sección de productos -->
                    <!-- ... -->
                </div>
                {{-- <!-- Agrega más espacio si es necesario -->
                <div class="mt-4">
                    <!-- Agrega más contenido si es necesario -->
                </div> --}}
            </div>
        </div>
    </div>

    <!-- Sección de Factura (Aside) -->
    <aside class="w-full max-w-2xl px-4 py-8 mx-auto md:w-1/3 sm:px-6 lg:px-8">
        <div>
            <h2 class="mb-4 text-xl font-bold">Factura</h2>
            <div class="px-4 py-3 bg-transparent border-b card-header">
                <!-- Contenido de la sección de factura -->
                <!-- ... -->
            </div>
        </div>
    </aside>

    <script>
        @verbatim
        // Tu código JavaScript aquí
        @endverbatim
    </script>
</x-app-layout>
