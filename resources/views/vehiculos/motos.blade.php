<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800">
            {{ __('Motos disponibles 🏍️') }}
        </h2>
    </x-slot>

    <div class="p-6 grid grid-cols-1 md:grid-cols-3 gap-6">
        <div class="border rounded-lg shadow-md p-4 bg-white">
            <img src="https://via.placeholder.com/400x200" alt="Moto" class="rounded-lg mb-4">
            <h3 class="text-lg font-bold">Yamaha FZ 2023</h3>
            <p class="text-gray-600">Precio: $12,000,000</p>
            <p class="text-gray-500">150cc · Gasolina</p>
            <button class="mt-4 bg-green-500 text-white px-4 py-2 rounded">Ver Detalles</button>
        </div>

        <div class="border rounded-lg shadow-md p-4 bg-white">
            <img src="https://via.placeholder.com/400x200" alt="Moto" class="rounded-lg mb-4">
            <h3 class="text-lg font-bold">Honda CBR 500R</h3>
            <p class="text-gray-600">Precio: $35,000,000</p>
            <p class="text-gray-500">500cc · Gasolina</p>
            <button class="mt-4 bg-green-500 text-white px-4 py-2 rounded">Ver Detalles</button>
        </div>
    </div>
</x-app-layout>
