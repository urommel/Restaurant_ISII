<x-app-layout>
    <div class="w-full px-4 py-8 mx-auto sm:px-6 lg:px-8 max-w-9xl">
        <!-- Sección de Productos -->
        <div class="grid grid-cols-1 gap-8 md:grid-cols-2">
            <!-- Lista de Productos (Bebidas y Platos) -->
            <div>
                <h2 class="mb-4 text-xl font-bold">Lista de Productos</h2>
                <!-- Aquí iría el código para mostrar la lista de productos -->
                <!-- Puedes agregar botones o controles para seleccionar productos y cantidades -->
                <!-- También puedes agregar un botón de "Confirmar Pedido" -->
                <button class="px-4 py-2 mt-4 text-white bg-blue-500 rounded-full">
                    Confirmar Pedido
                </button>
            </div>

            <!-- Confirmación del Pedido y Comanda -->
            <div>
                <h2 class="mb-4 text-xl font-bold">Confirmación del Pedido</h2>
                <!-- Aquí iría el código para mostrar la lista de productos seleccionados -->
                <!-- Puedes mostrar la cantidad, el precio unitario, y el subtotal por cada producto -->
                <!-- También puedes mostrar el precio total del pedido -->
            </div>
        </div>
    </div>

    <!-- Sección de Factura -->
    <div class="w-full px-4 py-8 mx-auto sm:px-6 lg:px-8 max-w-9xl">
        <h2 class="mb-4 text-xl font-bold">Factura</h2>
        <!-- Aquí iría el código para mostrar la factura -->
        <!-- Puedes incluir la mesa, cliente, mesero, monto a pagar, etc. -->
        <!-- Además, agrega campos para el monto que dio el cliente, el vuelto, y un botón para pagar -->
        <button class="px-4 py-2 mt-4 text-white bg-green-500 rounded-full">
            Pagar
        </button>
    </div>
</x-app-layout>


<script></script>
