<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800">
            {{ __('Motos disponibles 🏍️') }}
        </h2>
    </x-slot>

    <div class="p-6 grid grid-cols-1 md:grid-cols-3 gap-6">

        <!-- Moto 1 -->
        <div class="border rounded-lg shadow-md p-4 bg-white">
            <img src="{{ asset('images/motos/Yamaha MT-07 2022.jpg') }}" alt="Yamaha MT-07 2022" class="rounded-lg mb-4">
            <h3 class="text-lg font-bold">Yamaha MT-07 2022</h3>
            <p class="text-gray-600">Precio: $38,000,000</p>
            <p class="text-gray-500">Naked · Gasolina</p>
            <div class="mt-4 flex space-x-2">
                <button class="bg-white hover:bg-gray-200 text-black px-4 py-2 rounded border flex-1">Ver Detalles</button>
                <button class="bg-white hover:bg-gray-200 text-black px-4 py-2 rounded border flex-1">Comprar</button>
            </div>
        </div>

        <!-- Moto 2 -->
        <div class="border rounded-lg shadow-md p-4 bg-white">
            <img src="{{ asset('images/motos/KTM Duke 390 2023.jpg') }}" alt="KTM Duke 390 2023" class="rounded-lg mb-4">
            <h3 class="text-lg font-bold">KTM Duke 390 2023</h3>
            <p class="text-gray-600">Precio: $28,000,000</p>
            <p class="text-gray-500">Naked · Gasolina</p>
            <div class="mt-4 flex space-x-2">
                <button class="bg-white hover:bg-gray-200 text-black px-4 py-2 rounded border flex-1">Ver Detalles</button>
                <button class="bg-white hover:bg-gray-200 text-black px-4 py-2 rounded border flex-1">Comprar</button>
            </div>
        </div>

        <!-- Moto 3 -->
        <div class="border rounded-lg shadow-md p-4 bg-white">
            <img src="{{ asset('images/motos/Suzuki GSX-R750 2022.jpg') }}" alt="Suzuki GSX-R750 2022" class="rounded-lg mb-4">
            <h3 class="text-lg font-bold">Suzuki GSX-R750 2022</h3>
            <p class="text-gray-600">Precio: $45,000,000</p>
            <p class="text-gray-500">Deportiva · Gasolina</p>
            <div class="mt-4 flex space-x-2">
                <button class="bg-white hover:bg-gray-200 text-black px-4 py-2 rounded border flex-1">Ver Detalles</button>
                <button class="bg-white hover:bg-gray-200 text-black px-4 py-2 rounded border flex-1">Comprar</button>
            </div>
        </div>

        <!-- Moto 4 -->
        <div class="border rounded-lg shadow-md p-4 bg-white">
            <img src="{{ asset('images/motos/Kawasaki Ninja 650 2023.jpg') }}" alt="Kawasaki Ninja 650 2023" class="rounded-lg mb-4">
            <h3 class="text-lg font-bold">Kawasaki Ninja 650 2023</h3>
            <p class="text-gray-600">Precio: $42,000,000</p>
            <p class="text-gray-500">Deportiva · Gasolina</p>
            <div class="mt-4 flex space-x-2">
                <button class="bg-white hover:bg-gray-200 text-black px-4 py-2 rounded border flex-1">Ver Detalles</button>
                <button class="bg-white hover:bg-gray-200 text-black px-4 py-2 rounded border flex-1">Comprar</button>
            </div>
        </div>

        <!-- Moto 5 -->
        <div class="border rounded-lg shadow-md p-4 bg-white">
            <img src="{{ asset('images/motos/BMW G310R 2022.jpg') }}" alt="BMW G310R 2022" class="rounded-lg mb-4">
            <h3 class="text-lg font-bold">BMW G310R 2022</h3>
            <p class="text-gray-600">Precio: $40,000,000</p>
            <p class="text-gray-500">Naked · Gasolina</p>
            <div class="mt-4 flex space-x-2">
                <button class="bg-white hover:bg-gray-200 text-black px-4 py-2 rounded border flex-1">Ver Detalles</button>
                <button class="bg-white hover:bg-gray-200 text-black px-4 py-2 rounded border flex-1">Comprar</button>
            </div>
        </div>

    </div>
</x-app-layout>
