<x-app-layout>
    <div class="w-full px-4 py-8 mx-auto sm:px-6 lg:px-8 max-w-9xl">
        <h1 class="mb-4 text-2xl font-bold">Selecciona una Mesa</h1>

        <div class="grid grid-cols-1 gap-4 sm:grid-cols-2 md:grid-cols-4">
            <!-- Loop sobre las mesas -->
            @foreach ($mesas as $mesa)
                <div class="w-full max-w-sm bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                    <!-- Contenido de la mesa -->
                    <!-- ... (resto del código de la mesa) -->
                </div>
            @endforeach
        </div>
    </div>

    <div class="w-full px-4 py-8 mx-auto sm:px-6 lg:px-8 max-w-9xl">
        <div class="grid grid-cols-1 gap-8 md:grid-cols-2">
            <!-- Productos -->
            <div>
                <h2 class="mb-4 text-xl font-bold">Lista de Productos</h2>
                <!-- Aquí iría el código para mostrar la lista de productos -->
            </div>

            <!-- Factura -->
            <div>
                <h2 class="mb-4 text-xl font-bold">Factura</h2>
                <!-- Aquí iría el código para mostrar la factura -->
            </div>
        </div>
    </div>
</x-app-layout>


<script>
    
</script>
