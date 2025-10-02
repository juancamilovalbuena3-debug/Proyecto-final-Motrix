<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800">
            {{ __('Publicar Vehículo en Venta 🚘') }}
        </h2>
    </x-slot>

    <div class="p-6">
        <form method="POST" action="{{ route('vender.store') }}" class="bg-white shadow p-6 rounded-lg">
            @csrf
            <div>
                <label for="tipo" class="block font-semibold">Tipo:</label>
                <select name="tipo" id="tipo" class="border rounded p-2 w-full">
                    <option value="Carro">Carro</option>
                    <option value="Moto">Moto</option>
                </select>
            </div>
            <div class="mt-4">
                <label for="marca" class="block font-semibold">Marca:</label>
                <input type="text" name="marca" class="border rounded p-2 w-full" required>
            </div>
            <div class="mt-4">
                <label for="modelo" class="block font-semibold">Modelo:</label>
                <input type="text" name="modelo" class="border rounded p-2 w-full" required>
            </div>
            <div class="mt-4">
                <label for="precio" class="block font-semibold">Precio:</label>
                <input type="number" name="precio" class="border rounded p-2 w-full" required>
            </div>
            <div class="mt-4">
                <label for="descripcion" class="block font-semibold">Descripción:</label>
                <textarea name="descripcion" rows="4" class="border rounded p-2 w-full"></textarea>
            </div>

            
            <!-- BOTÓN PUBLICAR -->
            <div class="mt-6 text-center">
                <button type="submit" class="bg-red-600 hover:bg-red-700 text-white px-6 py-3 rounded-lg text-lg font-bold shadow-md">
                     Publicar Vehículo
                </button>
            </div>
        </form>
    </div>
</x-app-layout>
