<x-app-layout>
    <div class="w-full px-4 py-8 mx-auto sm:px-6 lg:px-8 max-w-9xl">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-header">
                            <div style="display: flex; justify-content: space-between; align-items: center;">
                                <span id="card_title">
                                    {{ __('Proveedor') }}
                                </span>
                                <div class="float-right">
                                    <a href="{{ route('proveedor.create') }}" class="btn btn-primary btn-sm float-right"
                                        data-placement="left">
                                        {{ __('Create New') }}
                                    </a>
                                </div>
                            </div>
                        </div>
                        @if ($message = Session::get('success'))
                            <div class="alert alert-success">
                                <p>{{ $message }}</p>
                            </div>
                        @endif

                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-hover">
                                    <thead class="thead">
                                        <tr>
                                            <th>No</th>
                                            <th>Compañia</th>
                                            <th>Representante</th>
                                            <th>Ruc</th>
                                            <th>Celular</th>
                                            <th>Direccion</th>
                                            <th>Email</th>
                                            <th>Estado</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($proveedors as $proveedor)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $proveedor->compañia }}</td>
                                                <td>{{ $proveedor->representante }}</td>
                                                <td>{{ $proveedor->ruc }}</td>
                                                <td>{{ $proveedor->celular }}</td>
                                                <td>{{ $proveedor->direccion }}</td>
                                                <td>{{ $proveedor->email }}</td>
                                                <td>{{ $proveedor->estado }}</td>
                                                <td>
                                                    <form
                                                        action="{{ route('proveedor.destroy', $proveedor->idProveedor) }}"
                                                        method="POST">
                                                        <a class="btn btn-sm btn-primary"
                                                            href="{{ route('proveedor.show', $proveedor->idProveedor) }}"><i
                                                                class="fa fa-fw fa-eye"></i> {{ __('Show') }}</a>
                                                        <a class="btn btn-sm btn-success"
                                                            href="{{ route('proveedor.edit', $proveedor->idProveedor) }}"><i
                                                                class="fa fa-fw fa-edit"></i> {{ __('Edit') }}</a>
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger btn-sm"><i
                                                                class="fa fa-fw fa-trash"></i>
                                                            {{ __('Delete') }}</button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    {!! $proveedors->links() !!}
                </div>
            </div>
        </div>

    </div>
</x-app-layout>
