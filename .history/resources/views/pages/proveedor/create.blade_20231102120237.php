<x-app-layout>
    <div class="w-full px-4 py-8 mx-auto sm:px-6 lg:px-8 max-w-9xl">
        <div class="container mx-auto">
            <div class="flex justify-between items-center mb-4">
                <h2 class="text-2xl font-bold">Create New Proveedor</h2>
                <a href="{{ route('proveedors.index') }}" class="btn btn-primary">Back</a>
            </div>
    
            @if ($errors->any())
                <div class="alert alert-danger">
                    <strong>Error!</strong> Please check your input and try again.
                </div>
            @endif
    
            <form action="{{ route('proveedors.store') }}" method="POST" class="max-w-lg">
                @csrf
    
                <div class="mb-4">
                    <label for="compañia" class="block text-sm font-medium text-gray-600">Compañia:</label>
                    <input type="text" name="compañia" id="compañia" class="form-input mt-1 block w-full" placeholder="Compañia" />
                </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>Representante:</strong>
                            <input type="text" name="representante" class="form-control" placeholder="Representante">
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>Ruc:</strong>
                            <input type="text" name="ruc" class="form-control" placeholder="Ruc">
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>Celular:</strong>
                            <input type="text" name="celular" class="form-control" placeholder="Celular">
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>Direccion:</strong>
                            <input type="text" name="direccion" class="form-control" placeholder="Direccion">
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>Email:</strong>
                            <input type="text" name="email" class="form-control" placeholder="Email">
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>Estado:</strong>
                            <select name="estado" class="form-control">
                                <option value="pagada">Pagada</option>
                                <option value="pendiente">Pendiente</option>
                                <option value="aprobada">Aprobada</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </div>
            </form>
        </div>

    </div>
</x-app-layout>
