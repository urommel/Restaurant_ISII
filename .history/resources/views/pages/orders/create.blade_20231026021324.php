{{-- <x-app-layout>
    <div class="w-full px-4 py-8 mx-auto sm:px-6 lg:px-8 max-w-9xl">

        <form method="POST" action="{{ route('ordenes.store') }}">
            @csrf
            <input type="hidden" name="mesas_id" value="{{ $mesas->id }}">
        
            <label for="client_id">Selecciona el cliente:</label>
            <select name="client_id" id="client_id">
                @foreach ($clients as $client)
                    <option value="{{ $client->id }}">{{ $client->name }}</option>
                @endforeach
            </select>
        
            <label for="platos">Platos:</label>
            <select name="platos[]" id="platos" multiple>
                @foreach ($platos as $plato)
                    <option value="{{ $plato->id }}">{{ $plato->nombre }}</option>
                @endforeach
            </select>
        
            <label for="bebidas">Bebidas:</label>
            <select name="bebidas[]" id="bebidas" multiple>
                @foreach ($bebidas as $bebida)
                    <option value="{{ $bebida->id }}">{{ $bebida->nombre }}</option>
                @endforeach
            </select>
        
            <!-- Otros campos para detalles de la orden, como cantidad, observaciones, etc. -->
        
            <button type="submit">Crear Orden</button>
        </form>
    </div>
</x-app-layout> --}}

<x-app-layout>
    <div class="w-full px-4 py-8 mx-auto sm:px-6 lg:px-8 max-w-9xl">

        <form method="POST" action="{{ route('ordenes.store') }}">
            @csrf
            <input type="hidden" name="mesas_id" value="{{ $mesas->id }}">
        
            <label for="client_id">Selecciona el cliente:</label>
            <select name="client_id" id="client_id">
                @foreach ($clients as $client)
                    <option value="{{ $client->id }}">{{ $client->name }}</option>
                @endforeach
            </select>

            <label for="platos">Platos:</label>
            <select name="plato_id" id="plato_id">
                @foreach ($platos as $plato)
                    <option value="{{ $plato->id }}">{{ $plato->nombre }} - ${{ $plato->precio }}</option>
                @endforeach
            </select>
            <button type="button" onclick="agregarAlCarrito('plato')">Agregar Plato</button>

            <label for="bebidas">Bebidas:</label>
            <select name="bebida_id" id="bebida_id">
                @foreach ($bebidas as $bebida)
                    <option value="{{ $bebida->id }}">{{ $bebida->nombre }} - ${{ $bebida->precio }}</option>
                @endforeach
            </select>
            <button type="button" onclick="agregarAlCarrito('bebida')">Agregar Bebida</button>
        
            <!-- Carrito de compras -->
            <div id="carrito">
                <h2>Carrito de compras</h2>
                <ul id="items"></ul>
                <p>Total: $<span id="total">0</span></p>
            </div>
        
            <!-- Otros campos para detalles de la orden, como cantidad, observaciones, etc. -->
        
            <button type="submit">Crear Orden</button>
        </form>
    </div>

    <script>
        let carrito = [];
        let total = 0;

        function agregarAlCarrito(tipo) {
            let select = document.getElementById(tipo + '_id');
            let selectedItem = select.options[select.selectedIndex];
            let item = {
                id: selectedItem.value,
                nombre: selectedItem.text,
                precio: parseFloat(selectedItem.text.split('- $')[1])
            };
            carrito.push(item);
            total += item.precio;

            // Actualizar la lista en el carrito
            actualizarCarrito();
        }

        function actualizarCarrito() {
            let itemsList = document.getElementById('items');
            let totalElement = document.getElementById('total');
            
            // Limpiar la lista actual
            itemsList.innerHTML = '';

            // Actualizar la lista con los elementos del carrito
            carrito.forEach(item => {
                let listItem = document.createElement('li');
                listItem.textContent = item.nombre;
                itemsList.appendChild(listItem);
            });

            // Actualizar el total
            totalElement.textContent = total.toFixed(2);
        }
    </script>


    <div class="w-full px-4 py-8 mx-auto sm:px-6 lg:px-8 max-w-9xl">
        {{-- <div class="flex">
        <div class="w-8/12">
            <div class="card border shadow-none">
                <div class="card-body">

                    <div class="flex border-b pb-3">
                        <div class="me-4">
                            <img src="{{ URL::asset('./assets/images/product/img-1.png') }}" alt=""
                                class="avatar-lg">
                        </div>
                        <div class="flex-grow-1 self-center overflow-hidden">
                            <div>
                                <h5 class="truncate text-16"><a href="ecommerce-product-detail" class="text-dark">Nike
                                        N012 Running Shoes</a></h5>
                                <p class="mb-1">Color : <span class="font-medium">Gray</span></p>
                                <p>Size : <span class="font-medium">08</span></p>
                            </div>
                        </div>
                        <div class="flex-shrink-0 ms-2">
                            <ul class="list-inline text-16 mb-0">
                                <li class="list-inline-item">
                                    <a href="#" class="text-muted px-1">
                                        <i class="mdi mdi-trash-can-outline"></i>
                                    </a>
                                </li>
                                <li class="list-inline-item">
                                    <a href="#" class="text-muted px-1">
                                        <i class="mdi mdi-heart-outline"></i>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>

                    <div>
                        <div class="grid grid-cols-3 gap-4">
                            <div>
                                <div class="mt-3">
                                    <p class="text-muted mb-2">Price</p>
                                    <h5 class="text-16">$260</h5>
                                </div>
                            </div>
                            <div>
                                <div class="mt-3">
                                    <p class="text-muted mb-2">Quantity</p>
                                    <div class="inline-flex">
                                        <select class="form-select form-select-sm w-48">
                                            <option value="1">1</option>
                                            <option value="2" selected>2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                            <option value="5">5</option>
                                            <option value="6">6</option>
                                            <option value="7">7</option>
                                            <option value="8">8</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div>
                                <div class="mt-3">
                                    <p class="text-muted mb-2">Total</p>
                                    <h5 class="text-16">$520</h5>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            <!-- end card -->

            <!-- Repeat the above structure for the other cards -->

            <div class="mt-4">
                <div class="flex">
                    <div class="w-6/12">
                        <a href="ecommerce-products" class="btn btn-link text-muted">
                            <i class="mdi mdi-arrow-left me-1"></i> Continue Shopping
                        </a>
                    </div>
                    <div class="w-6/12 text-right">
                        <div class="mt-2">
                            <a href="ecommerce-checkout" class="btn btn-success">
                                <i class="mdi mdi-cart-outline me-1"></i> Checkout
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="w-4/12 mt-5 lg:mt-0">
            <div class="card border shadow-none">
                <div class="card-header bg-transparent border-b py-3 px-4">
                    <h5 class="text-16 mb-0">Order Summary <span class="float-right">#MN0124</span></h5>
                </div>
                <div class="card-body p-4">

                    <div class="table-responsive">
                        <table class="table mb-0">
                            <tbody>
                                <tr>
                                    <td>Sub Total :</td>
                                    <td class="text-right">$ 780</td>
                                </tr>
                                <tr>
                                    <td>Discount :</td>
                                    <td class="text-right">- $ 78</td>
                                </tr>
                                <tr>
                                    <td>Shipping Charge :</td>
                                    <td class="text-right">$ 25</td>
                                </tr>
                                <tr>
                                    <td>Estimated Tax :</td>
                                    <td class="text-right">$ 18.20</td>
                                </tr>
                                <tr class="bg-light">
                                    <th>Total :</th>
                                    <td class="text-right">
                                        <span class="font-bold">
                                            $ 745.2
                                        </span>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <!-- end table-responsive -->
                </div>
            </div>
        </div> --}}

        <div class="flex">
            <!-- Contenido de la izquierda (platos y bebidas) -->
            <div class="w-full bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                <div class="sm:hidden">
                    <label for="tabs" class="sr-only">Sleccionar Producto</label>
                    <select id="tabs" class="bg-gray-50 border-0 border-b border-gray-200 text-gray-900 text-sm rounded-t-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        <option>Platos</option>
                        <option>Bebidas</option>
                    </select>
                </div>
                <ul class="hidden text-sm font-medium text-center text-gray-500 divide-x divide-gray-200 rounded-lg sm:flex dark:divide-gray-600 dark:text-gray-400" id="fullWidthTab" data-tabs-toggle="#fullWidthTabContent" role="tablist">
                    <li class="w-full">
                        <button id="stats-tab" data-tabs-target="#stats" type="button" role="tab" aria-controls="stats" aria-selected="true" class="inline-block w-full p-4 rounded-tl-lg bg-gray-50 hover:bg-gray-100 focus:outline-none dark:bg-gray-700 dark:hover:bg-gray-600">Platos</button>
                    </li>
                    <li class="w-full">
                        <button id="about-tab" data-tabs-target="#about" type="button" role="tab" aria-controls="about" aria-selected="false" class="inline-block w-full p-4 rounded-tr-lg bg-gray-50 hover:bg-gray-100 focus:outline-none dark:bg-gray-700 dark:hover:bg-gray-600">Bebidas</button>
                    </li>
                </ul>
                <div id="fullWidthTabContent" class="border-t border-gray-200 dark:border-gray-600">
                    {{-- <div class="hidden p-4 bg-white rounded-lg md:p-8 dark:bg-gray-800" id="stats" role="tabpanel" aria-labelledby="stats-tab">
                        <!-- Aquí coloca el código para mostrar la información de los platos -->
                        <!-- Puedes repetir el siguiente bloque para cada plato -->
                        <div class="w-full max-w-sm bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                            <a href="#">
                                <img class="p-8 rounded-t-lg" src="/docs/images/products/apple-watch.png" alt="product image" />
                            </a>
                            <div class="px-5 pb-5">
                                <a href="#">
                                    <h5 class="text-xl font-semibold tracking-tight text-gray-900 dark:text-white">Nombre del Plato 1</h5>
                                </a>
                                <!-- Resto del contenido del plato -->
                            </div>
                        </div>
                    </div> --}}

                    <div class="hidden p-4 bg-white rounded-lg md:p-8 dark:bg-gray-800" id="stats" role="tabpanel" aria-labelledby="stats-tab">
                        @foreach ($platos as $plato)
                        <div class="flex items-center">
                            <a href="#" class="flex-shrink-0">
                                <img class="p-4 rounded-lg" src="/docs/images/products/apple-watch.png" alt="product image" />
                            </a>
                            <div class="flex-grow px-4">
                                <a href="#">
                                    <h5 class="text-lg font-semibold text-gray-900 dark:text-white">{{ $plato->nombre }}</h5>
                                </a>
                                <p class="text-gray-500 dark:text-gray-400">Descripción del plato...</p>
                                <div class="flex items-center justify-between mt-2">
                                    <span class="text-xl font-bold text-gray-900 dark:text-white">${{ $plato->precio }}</span>
                                    <button class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Add</button>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    
                    {{-- <div class="hidden p-4 bg-white rounded-lg md:p-8 dark:bg-gray-800" id="about" role="tabpanel" aria-labelledby="about-tab">
                        <!-- Aquí coloca el código para mostrar la información de las bebidas -->
                        <!-- Puedes repetir el siguiente bloque para cada bebida -->
                        <div class="w-full max-w-sm bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                            <a href="#">
                                <img class="p-8 rounded-t-lg" src="/docs/images/products/apple-watch.png" alt="product image" />
                            </a>
                            <div class="px-5 pb-5">
                                <a href="#">
                                    <h5 class="text-xl font-semibold tracking-tight text-gray-900 dark:text-white">Nombre de la Bebida 1</h5>
                                </a>
                                <!-- Resto del contenido de la bebida -->
                            </div>
                        </div>
                    </div> --}}

                    <div class="hidden p-4 bg-white rounded-lg md:p-8 dark:bg-gray-800" id="about" role="tabpanel" aria-labelledby="about-tab">
                        @foreach ($bebidas as $bebida)
                        <div class="flex items-center">
                            <a href="#" class="flex-shrink-0">
                                <img class="p-4 rounded-lg" src="/docs/images/products/apple-watch.png" alt="product image" />
                            </a>
                            <div class="flex-grow px-4">
                                <a href="#">
                                    <h5 class="text-lg font-semibold text-gray-900 dark:text-white">{{ $bebida->nombre }}</h5>
                                </a>
                                <p class="text-gray-500 dark:text-gray-400">Descripción del plato...</p>
                                <div class="flex items-center justify-between mt-2">
                                    <span class="text-xl font-bold text-gray-900 dark:text-white">${{ $bebida->precio }}</span>
                                    <button class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Add</button>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    
                </div>
            </div>

            <!-- Contenido de la derecha (resumen del pedido) -->
            <div class="w-4/12 mt-5 lg:mt-0">
                <div class="card border shadow-none">
                    <div class="card-header bg-transparent border-b py-3 px-4">
                        <h5 class="text-16 mb-0">Cliente: <span class="float-right">#</span></h5>
                    </div>
                    <div class="card-body p-4">
                        <div class="table-responsive">
                            <table class="table mb-0">
                                <tbody>
                                    <!-- Puedes agregar dinámicamente los elementos del pedido aquí -->
                                    <tr class="bg-light">
                                        <th>Total :</th>
                                        <td class="text-right">
                                            <span class="font-bold">
                                                $ 745.2
                                            </span>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <!-- end table-responsive -->
                    </div>
                </div>
            </div>
        </div>
        
    </div>





</x-app-layout>
