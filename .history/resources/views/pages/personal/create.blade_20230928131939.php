@section('name')
    Empleados
@endsection

<x-app-layout>
    <div class="w-full px-4 py-8 mx-auto sm:px-6 lg:px-8 max-w-9xl">

        {{-- <x-banner.create /> --}}

        <form method="POST" action="{{ route('personal.store') }}" enctype="multipart/form-data">
            @csrf <!-- Campo CSRF para protección -->
            
        </form>

    </div>
</x-app-layout>


<script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.8.1/datepicker.min.js"></script>
