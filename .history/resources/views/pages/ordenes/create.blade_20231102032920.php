{{-- <x-app-layout>
    <div class="w-full px-4 py-8 mx-auto sm:px-6 lg:px-8 max-w-9xl">
        <div class="grid grid-cols-1 gap-8 md:grid-cols-2">
            <!-- Sección de Productos -->
            <div class="mb-8">
                <h2 class="mb-4 text-xl font-bold">Lista de Productos</h2>
                {{-- <!-- Aquí iría el código para mostrar la lista de productos -->
                <!-- Puedes agregar botones o controles para seleccionar productos y cantidades -->
                <!-- También puedes agregar un botón de "Confirmar Pedido" -->
                <button class="px-4 py-2 mt-4 text-white bg-blue-500 rounded-full">
                    Confirmar Pedido
                </button> --}}

                <div
                    class="w-full bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                    <ul class="flex flex-wrap text-sm font-medium text-center text-gray-500 border-b border-gray-200 rounded-t-lg bg-gray-50 dark:border-gray-700 dark:text-gray-400 dark:bg-gray-800"
                        id="defaultTab" data-tabs-toggle="#defaultTabContent" role="tablist">
                        <li class="mr-2">
                            <button id="about-tab" data-tabs-target="#about" type="button" role="tab"
                                aria-controls="about" aria-selected="true"
                                class="inline-block p-4 text-blue-600 rounded-tl-lg hover:bg-gray-100 dark:bg-gray-800 dark:hover:bg-gray-700 dark:text-blue-500">Platos</button>
                        </li>
                        <li class="mr-2">
                            <button id="services-tab" data-tabs-target="#services" type="button" role="tab"
                                aria-controls="services" aria-selected="false"
                                class="inline-block p-4 hover:text-gray-600 hover:bg-gray-100 dark:hover:bg-gray-700 dark:hover:text-gray-300">Bebidas</button>
                        </li>
                        {{-- <li class="mr-2">
                            <button id="statistics-tab" data-tabs-target="#statistics" type="button" role="tab" aria-controls="statistics" aria-selected="false" class="inline-block p-4 hover:text-gray-600 hover:bg-gray-100 dark:hover:bg-gray-700 dark:hover:text-gray-300">Facts</button>
                        </li> --}}
                    </ul>
                    <div id="defaultTabContent">
                        <div class="hidden p-4 bg-white rounded-lg md:p-8 dark:bg-gray-800" id="about"
                            role="tabpanel" aria-labelledby="about-tab">
                            @foreach ($platos as $plato)
                                <div class="flex items-center">
                                    <a href="#" class="flex-shrink-0">
                                        <img class="p-4 rounded-lg" src="/docs/images/products/apple-watch.png"
                                            alt="product image" />
                                    </a>
                                    <div class="flex-grow px-4">
                                        <a href="#">
                                            <h5 class="text-lg font-semibold text-gray-900 dark:text-white">
                                                {{ $plato->nombre }}
                                            </h5>
                                        </a>
                                        <div class="flex items-center justify-between mt-2">
                                            <span
                                                class="text-xl font-bold text-gray-900 dark:text-white">${{ $plato->precio }}</span>
                                            <input type="number" id="quantity_{{ $plato->id }}" min="1"
                                                value="1">
                                            <button
                                                onclick="agregarAlCarrito('{{ $plato->nombre }}', {{ $plato->precio }}, document.getElementById('quantity_{{ $plato->id }}').value)"
                                                class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Add</button>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        <div class="hidden p-4 bg-white rounded-lg md:p-8 dark:bg-gray-800" id="services"
                            role="tabpanel" aria-labelledby="services-tab">
                            @foreach ($bebidas as $bebida)
                                <div class="flex items-center">
                                    <a href="#" class="flex-shrink-0">
                                        <img class="p-4 rounded-lg" src="/docs/images/products/apple-watch.png"
                                            alt="product image" />
                                    </a>
                                    <div class="flex-grow px-4">
                                        <a href="#">
                                            <h5 class="text-lg font-semibold text-gray-900 dark:text-white">
                                                {{ $bebida->nombre }}
                                            </h5>
                                        </a>
                                        <div class="flex items-center justify-between mt-2">
                                            <span
                                                class="text-xl font-bold text-gray-900 dark:text-white">${{ $bebida->precio }}</span>
                                            <button
                                                onclick="agregarAlCarrito('{{ $bebida->nombre }}', {{ $bebida->precio }})"
                                                class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Add</button>
                                        </div>
                                    </div>
                                </div>
                            @endforeach

                        </div>
                        {{-- <div class="hidden p-4 bg-white rounded-lg md:p-8 dark:bg-gray-800" id="statistics" role="tabpanel" aria-labelledby="statistics-tab">
                            
                        </div> --}}
                    </div>
                </div>

            </div>

            <!-- Sección de Factura -->
            <div>
                <h2 class="mb-4 text-xl font-bold">Factura</h2>
                {{-- <!-- Aquí iría el código para mostrar la factura -->
                <!-- Puedes incluir la mesa, cliente, mesero, monto a pagar, etc. -->
                <!-- Además, agrega campos para el monto que dio el cliente, el vuelto, y un botón para pagar -->
                <button class="px-4 py-2 mt-4 text-white bg-green-500 rounded-full">
                    Pagar
                </button> --}}

                <div class="px-4 py-3 bg-transparent border-b card-header">
                    <h5 class="mb-0 text-16">Mesa: <span class="float-right">0{{ $mesas->numero_mesa }}</span></h5>
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
                    <h5 class="mb-0 text-16">Mesero: <span class="float-right"> {{ Auth::user()->name }}</span>
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



                    {{-- <button type="submit"
                        class="w-full mt-4 text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Crear
                        Orden</button> --}}
                    <button type="button" onclick="crearOrden()"
                        class="w-full mt-4 text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                        Crear Orden
                    </button>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>










<script></script> --}}



