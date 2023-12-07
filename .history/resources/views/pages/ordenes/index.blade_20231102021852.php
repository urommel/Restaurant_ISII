<x-app-layout>
    <h1 class="mb-4 text-2xl font-bold">Selecciona una Mesa</h1>

    <div class="grid grid-cols-4 gap-4">
        @foreach($mesas as $mesa)
    <a href="{{ route('ordenes.show', $mesa->id) }}" class="block p-4 m-2 border">{{ $mesa->nombre }}</a>
@endforeach
    </div>
</x-app-layout>
