<x-app-layout>
    <div class="w-full px-4 py-8 mx-auto sm:px-6 lg:px-8 max-w-9xl">
        <div class="grid grid-cols-1 gap-8 md:grid-cols-3">
            <!-- Sección de Productos -->
            <div class="mb-8 md:col-span-2" style="height: calc(100vh - 150px); overflow-y: scroll;">
                <h2 class="mb-4 text-xl font-bold">Lista de Productos</h2>
                <div class="divide-y-2">
                    <div
                        class="w-full mb-8 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                        <!-- Pestaña para mostrar platos -->
                        <ul class="flex flex-wrap text-sm font-medium text-center text-gray-500 border-b border-gray-200 rounded-t-lg bg-gray-50 dark:border-gray-700 dark:text-gray-400 dark:bg-gray-800"
                            id="defaultTab" data-tabs-toggle="#defaultTabContent" role="tablist">
                            <li class="mr-2">
                                <button data-tabs-target="#entrantes" type="button" role="tab"
                                    aria-controls="entrantes" aria-selected="true"
                                    class="inline-block p-4 rounded-tl-lg hover:bg-gray-100 dark:bg-gray-800 dark:hover:bg-gray-700">Entrantes</button>
                            </li>
                            <li class="mr-2">
                                <button data-tabs-target="#sopas" type="button" role="tab" aria-controls="sopas"
                                    aria-selected="false"
                                    class="inline-block p-4 hover:bg-gray-100 dark:bg-gray-800 dark:hover:bg-gray-700">Sopas</button>
                            </li>
                            <li class="mr-2">
                                <button data-tabs-target="#sopas" type="button" role="tab" aria-controls="sopas"
                                    aria-selected="false"
                                    class="inline-block p-4 hover:bg-gray-100 dark:bg-gray-800 dark:hover:bg-gray-700">Especialidades</button>
                            </li>
                            <li class="mr-2">
                                <button data-tabs-target="#sopas" type="button" role="tab" aria-controls="sopas"
                                    aria-selected="false"
                                    class="inline-block p-4 hover:bg-gray-100 dark:bg-gray-800 dark:hover:bg-gray-700">Menu
                                    del Dia</button>
                            </li>
                        </ul>
                        <!-- Contenido para mostrar platos -->
                        <div id="defaultTabContent">
                            <div class="hidden p-4 bg-white rounded-lg md:p-8 dark:bg-gray-800" id="entrantes"
                                role="tabpanel" aria-labelledby="entrantes-tab">
                                <div class="slick-arrows">
                                    <button type="button" class="slick-prev"></button>
                                    <button type="button" class="slick-next"></button>
                                </div>
                                <div class="slick-carousel">
                                    @foreach ($productos as $producto)
                                        @if ($producto->categoria->nombre === 'Entrantes')
                                            <div class="mb-8 producto-container bg-red-50"
                                                data-producto-id="{{ $producto->id }}">
                                                <!-- Tu código para mostrar detalles del producto -->
                                                <div class="px-4 py-3">
                                                    <a href="#">
                                                        <h5 class="text-lg font-semibold text-gray-900">
                                                            {{ $producto->nombre }}</h5>
                                                    </a>
                                                </div>
                                                <div class="flex justify-center">
                                                    <a href="#">
                                                        <img class="object-cover w-32 h-32 p-4 rounded-lg"
                                                            src="{{ $producto->url }}" alt="product image" />
                                                    </a>
                                                </div>
                                                <div class="px-4 py-3 mt-auto">
                                                    <span
                                                        class="text-xl font-bold text-gray-900">${{ $producto->precio }}</span>
                                                </div>
                                                <div class="px-4 py-3">
                                                    <button
                                                        onclick="addToCart('{{ $producto->nombre }}', {{ $producto->precio }})"
                                                        class="w-full px-4 py-2 mt-4 text-sm font-medium text-white bg-blue-700 rounded-md hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300">Agregar
                                                        al carrito</button>
                                                </div>
                                            </div>
                                        @endif
                                    @endforeach
                                </div>
                            </div>

                            <div class="hidden p-4 bg-white rounded-lg md:p-8 dark:bg-gray-800" id="sopas"
                                role="tabpanel" aria-labelledby="sopas-tab">
                                <!-- Contenido específico para Sopas -->
                                <!-- ... tu código ... -->
                            </div>

                        </div>
                    </div>

                    <form action="{{ route('orden.store') }}" method="POST" role="form">
                        @csrf
                        <div class="relative mt-8 overflow-x-auto border border-transparent shadow-md sm:rounded-lg">
                            <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                                <thead
                                    class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                    <tr>
                                        <th scope="col" class="px-6 py-3"></th>
                                        <th scope="col" class="px-6 py-3">Producto</th>
                                        <th scope="col" class="px-6 py-3">Cantidad</th>
                                        <th scope="col" class="px-6 py-3">Precio unidad</th>
                                        <th scope="col" class="px-6 py-3">Precio total de unidad</th>
                                    </tr>
                                </thead>
                                <tbody id="tablaProductosBody">
                                    <!-- Aquí se añadirán las filas de productos seleccionados -->
                                </tbody>
                            </table>
                        </div>

                        <!-- Lista de productos seleccionados -->
                        <input type="hidden" name="productos" id="productosInput" value="">

                        <div id="montoTotalContainer" class="mt-4 text-right" style="display: none;">
                            <span id="montoTotalLabel" class="text-lg font-bold text-gray-700 dark:text-gray-400">Monto
                                Total:</span>
                            <span id="montoTotal"
                                class="ml-2 text-lg font-bold text-gray-900 dark:text-gray-400">\$0.00</span>
                        </div>

                        <!-- Resto de tu formulario -->
                        <button type="submit" id="botonCrearOrden"
                            class="w-full mt-4 text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                            Crear Orden
                        </button>

                </div>
            </div>
            <!-- Sección de Factura -->
            <div class="md:col-span-1 ">
                <h2 class="mb-4 text-xl font-bold">Factura</h2>
                <div class="p-4 bg-white rounded-lg dark:bg-gray-800">
                    <p>Cliente: {{ $orden->client->name }}</p>
                    <p>Mesero: {{ $orden->mesero }}</p>
                    <p>Monto Total: ${{ $orden->monto_total }}</p>

                    <div class="px-4 py-3 bg-transparent border-b card-header">
                        <h5 class="mb-0 text-16" name="numero_mesa">Mesa: <span
                                class="float-right">0{{ $orden->numero_mesa }}</span>
                        </h5>
                    </div>
                    <div class="px-4 py-3 bg-transparent border-b card-header">
                        <label for="client_id">Cliente: {{ $orden }}</label>

                        <input type="checkbox" id="general_customer" name="general_customer"
                            onchange="toggleCustomerSelect()" {{ old('general_customer') ? 'checked' : '' }}>
                        <label for="general_customer">Cliente general</label>
                    </div>
                    <div class="px-4 py-3 bg-transparent border-b card-header">
                        <h5 class="mb-0 text-16">Mesero: <span class="float-right">
                                {{ Auth::user()->name }}</span>
                        </h5>
                    </div>
                    <div class="p-4 card-body">
                        <!-- Carrito de compras -->
                        <div id="carrito">
                            <h2 class="mb-4 text-2xl font-semibold">Carrito de compras</h2>
                            <p class="mb-4">Total: $<span id="total">0</span></p>
                        </div>

                        <!-- Detalles de la orden -->
                        <label for="obs">Observaciones:</label>
                        <textarea name="obs" id="obs" rows="3" class="w-full p-2 mb-4 border"></textarea>
                    </div>
                    </form>
                    <button type="button" onclick="pagar()"
                        class="w-full mt-4 text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                        Pagar
                    </button>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

<script>
    let montoTotal = 0;
    let productos = [];

    function toggleCustomerSelect() {
        var checkBox = document.getElementById("general_customer");
        var select = document.getElementById("client_id");

        // Si el checkbox está marcado, deshabilita el select
        if (checkBox.checked == true) {
            select.disabled = true;
        } else {
            select.disabled = false;
        }
    }

    function addToCart(nombre, precio) {
        // Obtener la referencia a la tabla de productos
        const tablaProductos = document.getElementById('tablaProductosBody');

        // Crear una nueva fila
        const fila = document.createElement('tr');

        // Crear las celdas de la fila
        const celdaEliminar = document.createElement('td');
        const celdaProducto = document.createElement('td');
        const celdaCantidad = document.createElement('td');
        const celdaPrecioUnidad = document.createElement('td');
        const celdaPrecioTotal = document.createElement('td');

        // Agregar contenido a las celdas
        const enlaceEliminar = document.createElement('a');
        enlaceEliminar.href = '#';
        enlaceEliminar.classList.add('font-medium', 'text-blue-600', 'dark:text-blue-500', 'hover:underline');
        enlaceEliminar.textContent = 'Delete';
        enlaceEliminar.addEventListener('click', function() {
            // Eliminar la fila al hacer clic en el enlace "Delete"
            fila.remove();

            // Actualizar el monto total
            updateMontoTotal();

            // Actualizar el array de productos
            updateProductosArray(nombre, 0, precio);

            // Actualizar el campo oculto con la información en formato JSON
            updateProductosInput();
        });
        celdaEliminar.appendChild(enlaceEliminar);

        // Agregar el nombre del producto a la celda correspondiente
        celdaProducto.textContent = nombre;

        // Crear el campo de entrada de cantidad
        const inputCantidad = document.createElement('input');
        inputCantidad.type = 'number';
        inputCantidad.id = `quantity_${nombre.replace(/\s+/g, '_')}`;
        inputCantidad.name = 'cantidades[]'; // Nombre del campo para la cantidad
        inputCantidad.min = '1';
        inputCantidad.value = '1';
        inputCantidad.classList.add('w-16', 'px-2', 'py-1', 'ml-4', 'text-sm', 'text-gray-900', 'bg-white', 'border',
            'border-gray-300', 'rounded-lg', 'dark:bg-gray-800', 'dark:border-gray-700', 'dark:text-gray-400');

        // Agregar un evento para actualizar el precio total al cambiar la cantidad
        inputCantidad.addEventListener('input', function() {
            const cantidad = parseInt(inputCantidad.value);
            const precioTotal = (cantidad * precio).toFixed(2);
            celdaPrecioTotal.textContent = `$${precioTotal}`;

            // Actualizar el monto total
            updateMontoTotal();

            // Actualizar el array de productos
            updateProductosArray(nombre, cantidad, precio);

            // Actualizar el campo oculto con la información en formato JSON
            updateProductosInput();
        });

        celdaCantidad.appendChild(inputCantidad);
        celdaPrecioUnidad.textContent = `$${precio}`;
        celdaPrecioTotal.textContent = `$${precio.toFixed(2)}`;

        // Agregar las celdas a la fila
        fila.appendChild(celdaEliminar);
        fila.appendChild(celdaProducto);
        fila.appendChild(celdaCantidad);
        fila.appendChild(celdaPrecioUnidad);
        fila.appendChild(celdaPrecioTotal);

        // Agregar la fila a la tabla
        tablaProductos.appendChild(fila);

        // Almacenar la información del producto en el array
        const cantidad = parseInt(inputCantidad.value);
        const precioTotal = (cantidad * precio).toFixed(2);
        montoTotal += parseFloat(precioTotal);

        // Almacenar la información del producto en el array
        productos.push({
            nombre: nombre,
            cantidad: cantidad,
            precioUnitario: precio, // Aquí esperas 'precio'
            precioTotalPorUnidad: parseFloat(precioTotal)
        });

        // Actualizar el campo oculto con la información en formato JSON
        updateProductosInput();

        // Actualizar el monto total
        updateMontoTotal();

        // Mostrar el contenedor del monto total
        const montoTotalContainer = document.getElementById('montoTotalContainer');
        montoTotalContainer.style.display = 'block';
    }

    function updateProductosArray(nombre, cantidad, precio) {
        // Encuentra el producto en el array por su nombre
        const productoIndex = productos.findIndex(producto => producto.nombre === nombre);

        // Si el producto está en el array, actualiza la cantidad
        if (productoIndex !== -1) {
            productos[productoIndex].cantidad = cantidad;
            productos[productoIndex].precioTotalPorUnidad = parseFloat((cantidad * precio).toFixed(2));
        }
    }

    function updateProductosInput() {
        // Filtrar productos eliminados
        const productosFiltrados = productos.filter(producto => producto.cantidad > 0);

        // Actualizar el campo oculto con la información en formato JSON
        const productosInput = document.getElementById('productosInput');
        productosInput.value = JSON.stringify(productosFiltrados);
    }

    function updateMontoTotal() {
        montoTotal = 0;

        // Obtener todas las filas de productos
        const filasProductos = document.querySelectorAll('#tablaProductosBody tr');

        // Calcular el monto total sumando el precio total de cada producto
        filasProductos.forEach((fila) => {
            const celdaPrecioTotal = fila.querySelector('td:nth-child(5)');
            const precioTotal = parseFloat(celdaPrecioTotal.textContent.replace('$', ''));
            montoTotal += precioTotal;
        });

        // Actualizar el monto total en el elemento HTML
        const montoTotalElement = document.getElementById('montoTotal');
        montoTotalElement.textContent = `$${montoTotal.toFixed(2)}`;

        const montoTotalContainer = document.getElementById('montoTotalContainer');
        const montoTotalLabel = document.getElementById('montoTotalLabel');
        montoTotalContainer.style.display = montoTotal > 0 ? 'block' : 'none';
        montoTotalLabel.style.display = montoTotal > 0 ? 'inline' : 'none';
    }
</script>
