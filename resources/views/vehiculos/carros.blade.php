<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800">
            {{ __('Carros disponibles 🚗') }}
        </h2>
    </x-slot>
                
    <div class="p-6 grid grid-cols-1 md:grid-cols-3 gap-6">
        <!-- Vehículo 1 -->
        <div class="border rounded-lg shadow-md p-4 bg-white">
            <img src="{{ asset('images/carros/Toyota Corolla 2023.jpg') }}" alt="Toyota Corolla" class="rounded-lg mb-4">
            <h3 class="text-lg font-bold">Toyota Corolla 2023</h3>
            <p class="text-gray-600">Precio: $85,000,000</p>
            <p class="text-gray-500">Automático · Gasolina</p>
            <div class="mt-4 flex space-x-2">
                <button class="bg-white hover:bg-gray-200 text-black font-semibold px-4 py-2 rounded flex-1 border">Ver Detalles</button>
                <button class="bg-white hover:bg-gray-200 text-black font-semibold px-4 py-2 rounded flex-1 border">Comprar</button>
            </div>
        </div>

        <!-- Vehículo 2 -->
        <div class="border rounded-lg shadow-md p-4 bg-white">
            <img src="{{ asset('images/carros/Mazda.jpg') }}" alt="Mazda CX-5" class="rounded-lg mb-4">
            <h3 class="text-lg font-bold">Mazda CX-5 2022</h3>
            <p class="text-gray-600">Precio: $120,000,000</p>
            <p class="text-gray-500">Automático · Diesel</p>
            <div class="mt-4 flex space-x-2">
                <button class="bg-white hover:bg-gray-200 text-black font-semibold px-4 py-2 rounded flex-1 border">Ver Detalles</button>
                <button class="bg-white hover:bg-gray-200 text-black font-semibold px-4 py-2 rounded flex-1 border">Comprar</button>
            </div>
        </div>

        <!-- Vehículo 3 -->
        <div class="border rounded-lg shadow-md p-4 bg-white">
            <img src="{{ asset('images/carros/Ford.jpg') }}" alt="Ford EcoSport" class="rounded-lg mb-4">
            <h3 class="text-lg font-bold">Ford EcoSport 2022</h3>
            <p class="text-gray-600">Precio: $95,000,000</p>
            <p class="text-gray-500">Automático · Gasolina</p>
            <div class="mt-4 flex space-x-2">
                <button class="bg-white hover:bg-gray-200 text-black font-semibold px-4 py-2 rounded flex-1 border">Ver Detalles</button>
                <button class="bg-white hover:bg-gray-200 text-black font-semibold px-4 py-2 rounded flex-1 border">Comprar</button>
            </div>
        </div>

        <!-- Vehículo 4 -->
        <div class="border rounded-lg shadow-md p-4 bg-white">
            <img src="{{ asset('images/carros/Hyundai.jpg') }}" alt="Hyundai Tucson" class="rounded-lg mb-4">
            <h3 class="text-lg font-bold">Hyundai Tucson 2023</h3>
            <p class="text-gray-600">Precio: $130,000,000</p>
            <p class="text-gray-500">Automático · Diesel</p>
            <div class="mt-4 flex space-x-2">
                <button class="bg-white hover:bg-gray-200 text-black font-semibold px-4 py-2 rounded flex-1 border">Ver Detalles</button>
                <button class="bg-white hover:bg-gray-200 text-black font-semibold px-4 py-2 rounded flex-1 border">Comprar</button>
            </div>
        </div>

        <!-- Vehículo 5 -->
        <div class="border rounded-lg shadow-md p-4 bg-white">
            <img src="{{ asset('images/carros/golf.jpg') }}" alt="Volkswagen Golf" class="rounded-lg mb-4">
            <h3 class="text-lg font-bold">Volkswagen Golf 2021</h3>
            <p class="text-gray-600">Precio: $88,000,000</p>
            <p class="text-gray-500">Automático · Gasolina</p>
            <div class="mt-4 flex space-x-2">
                <button class="bg-white hover:bg-gray-200 text-black font-semibold px-4 py-2 rounded flex-1 border">Ver Detalles</button>
                <button class="bg-white hover:bg-gray-200 text-black font-semibold px-4 py-2 rounded flex-1 border">Comprar</button>
            </div>
        </div>
    </div>
</x-app-layout>
