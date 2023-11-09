<x-app-layout>
    <div class="w-full px-4 py-8 mx-auto sm:px-6 lg:px-8 max-w-9xl">
        <div class="grid grid-cols-1 gap-8 md:grid-cols-3">
            <!-- Sección de Productos -->
            <div class="mb-8 md:col-span-2" style="height: calc(100vh - 150px); overflow-y: scroll;">
                <h2 class="mb-4 text-xl font-bold">Lista de Productos</h2>
                <div class="">
                    <div class="divide-y-2">
                        <div
                            class="w-full mb-8 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                            <ul class="flex flex-wrap text-sm font-medium text-center text-gray-500 border-b border-gray-200 rounded-t-lg bg-gray-50 dark:border-gray-700 dark:text-gray-400 dark:bg-gray-800"
                                id="defaultTab" data-tabs-toggle="#defaultTabContent" role="tablist">
                                @foreach ($categorias as $categoria)
                                    <li class="mr-2">
                                        <button id="{{ $categoria->nombre }}-tab"
                                            data-tabs-target="#{{ $categoria->nombre }}" type="button" role="tab"
                                            aria-controls="{{ $categoria->nombre }}" aria-selected="true"
                                            class="inline-block p-4 text-blue-600 rounded-tl-lg hover:bg-gray-100 dark:bg-gray-800 dark:hover:bg-gray-700 dark:text-blue-500">{{ $categoria->nombre }}</button>
                                    </li>
                                @endforeach
                            </ul>
                            <div id="defaultTabContent">
                                @foreach ($categorias as $categoria)
                                    <div class="hidden p-4 bg-white rounded-lg md:p-8 dark:bg-gray-800"
                                        id="{{ $categoria->nombre }}" role="tabpanel"
                                        aria-labelledby="{{ $categoria->nombre }}-tab">
                                        <div class="slick-arrows">
                                            <button type="button" class="slick-prev"></button>
                                            <button type="button" class="slick-next"></button>
                                        </div>
                                        <div class="slick-carousel">
                                            @foreach ($productosPorCategoria[$categoria->id] as $producto)
                                                <div class="mb-8 plato-container bg-red-50">
                                                    <div class="px-4 py-3">
                                                        <a href="#">
                                                            <h5 class="text-lg font-semibold text-gray-900">
                                                                {{ $producto->nombre }}</h5>
                                                        </a>
                                                    </div>
                                                    <div class="flex justify-center">
                                                        <a href="#">
                                                            <img class="object-cover w-32 h-32 p-4 rounded-lg"
                                                                src="/docs/images/products/apple-watch.png"
                                                                alt="product image" />
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
                                            @endforeach
                                        </div>
                                    </div>
                                @endforeach
                            </div>

                        </div>


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

                        <div id="montoTotalContainer" class="mt-4 text-right" style="display: none;">
                            <span id="montoTotalLabel" class="text-lg font-bold text-gray-700 dark:text-gray-400">Monto
                                Total:</span>
                            <span id="montoTotal"
                                class="ml-2 text-lg font-bold text-gray-900 dark:text-gray-400">\$0.00</span>
                        </div>

                        <button type="button"
                            class="w-full mt-4 text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                            Crear Orden
                        </button>
                    </div>
                </div>
            </div>
            <!-- Sección de Factura -->
            <div class="md:col-span-1 ">
                <h2 class="mb-4 text-xl font-bold">Factura</h2>
                <div class="p-4 bg-white rounded-lg dark:bg-gray-800">
                    <div class="px-4 py-3 bg-transparent border-b card-header">
                        <h5 class="mb-0 text-16">Mesa: <span class="float-right">0{{ $mesas->numero_mesa }}</span>
                        </h5>
                    </div>
                    <div class="px-4 py-3 bg-transparent border-b card-header">
                        <label for="client_id">Selecciona el cliente:</label>
                        <select name="client_id" id="client_id" disabled>
                            @foreach ($clients as $client)
                                <option value="{{ $client->id }}">{{ $client->name }}</option>
                            @endforeach
                        </select>

                        <input type="checkbox" id="general_customer" name="general_customer"
                            onchange="toggleCustomerSelect()" checked>
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
                        <button type="button" onclick="crearOrden()"
                            class="w-full mt-4 text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                            Pagar
                        </button>

                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>


<script>
    document.addEventListener('DOMContentLoaded', function() {
        let montoTotal = 0;

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
            enlaceEliminar.classList.add('font-medium', 'text-blue-600', 'dark:text-blue-500',
                'hover:underline');
            enlaceEliminar.textContent = 'Delete';
            enlaceEliminar.addEventListener('click', function() {
                // Eliminar la fila al hacer clic en el enlace "Delete"
                fila.remove();

                // Actualizar el monto total
                updateMontoTotal();
            });
            celdaEliminar.appendChild(enlaceEliminar);

            celdaProducto.textContent = nombre;

            // Crear el campo de entrada de cantidad
            const inputCantidad = document.createElement('input');
            inputCantidad.type = 'number';
            inputCantidad.id = `quantity_${nombre.replace(/\s+/g, '_')}`;
            inputCantidad.min = '1';
            inputCantidad.value = '1';
            inputCantidad.classList.add('w-16', 'px-2', 'py-1', 'ml-4', 'text-sm', 'text-gray-900', 'bg-white',
                'border',
                'border-gray-300', 'rounded-lg', 'dark:bg-gray-800', 'dark:border-gray-700',
                'dark:text-gray-400');

            // Agregar un evento para actualizar el precio total al cambiar la cantidad
            inputCantidad.addEventListener('input', function() {
                const cantidad = parseInt(inputCantidad.value);
                const precioTotal = (cantidad * precio).toFixed(2);
                celdaPrecioTotal.textContent = `$${precioTotal}`;

                // Actualizar el monto total
                updateMontoTotal();
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

            // Actualizar el monto total
            const cantidad = parseInt(inputCantidad.value);
            const precioTotal = (cantidad * precio).toFixed(2);
            montoTotal += parseFloat(precioTotal);
            updateMontoTotal();

            // Mostrar el contenedor del monto total
            const montoTotalContainer = document.getElementById('montoTotalContainer');
            montoTotalContainer.style.display = 'block';
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



        const tabs = document.querySelectorAll('.tab');
        const listaPlatos = document.getElementById('listaPlatos');

        tabs.forEach(function(tab) {
            tab.addEventListener('click', function() {
                const categoria = tab.dataset.categoria;

                // Remover la clase 'active' de todas las pestañas
                tabs.forEach(function(tab) {
                    tab.classList.remove('active');
                });

                // Agregar la clase 'active' a la pestaña seleccionada
                tab.classList.add('active');

                // Filtrar los platos por categoría
                const platosFiltrados = filtrarPlatosPorCategoria(categoria);

                // Actualizar la lista de platos con los platos filtrados
                actualizarListaPlatos(platosFiltrados);
            });
        });

        function filtrarPlatosPorCategoria(categoria) {
            // Aquí puedes implementar la lógica para filtrar los platos por categoría
            // Puedes utilizar el valor de 'categoria' para realizar la filtración
            // y devolver un array con los platos que pertenecen a esa categoría
            // Por ejemplo:
            const platos = [{
                    nombre: 'Ensalada',
                    categoria: 'entradas'
                },
                {
                    nombre: 'Sopa de Tomate',
                    categoria: 'entradas'
                },
                {
                    nombre: 'Lomo Saltado',
                    categoria: 'platos-principales'
                },
                {
                    nombre: 'Pollo a la Brasa',
                    categoria: 'platos-principales'
                },
                {
                    nombre: 'Tiramisú',
                    categoria: 'postres'
                },
                {
                    nombre: 'Flan',
                    categoria: 'postres'
                }
            ];

            return platos.filter(function(plato) {
                return plato.categoria === categoria;
            });
        }

        function actualizarListaPlatos(platos) {
            listaPlatos.innerHTML = '';

            platos.forEach(function(plato) {
                const platoElement = document.createElement('li');
                platoElement.textContent = plato.nombre;
                listaPlatos.appendChild(platoElement);
            });
        }
    });
</script>
