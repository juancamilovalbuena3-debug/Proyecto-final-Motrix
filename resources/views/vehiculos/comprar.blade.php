<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800">Comprar {{ $vehiculo->marca }} {{ $vehiculo->modelo }}</h2>
    </x-slot>

    <div class="max-w-3xl mx-auto p-6 bg-white rounded-lg shadow-md mt-6">
        <p class="mb-4">Estás a punto de comprar el vehículo <strong>{{ $vehiculo->marca }} {{ $vehiculo->modelo }}</strong> por <strong>${{ number_format($vehiculo->precio,0) }}</strong>.</p>

        <form method="POST" action="{{ route('comprar.confirmar', $vehiculo->id) }}">
            @csrf
            <button type="submit" class="bg-green-500 hover:bg-green-600 text-white px-6 py-2 rounded shadow-md">
                Confirmar Compra
            </button>
            <a href="{{ url()->previous() }}" class="bg-gray-500 hover:bg-gray-600 text-white px-6 py-2 rounded shadow-md ml-2">
                Cancelar
            </a>
        </form>
    </div>
</x-app-layout>
