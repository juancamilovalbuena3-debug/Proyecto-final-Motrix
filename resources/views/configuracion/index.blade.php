<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800">
            {{ __('Configuración ⚙️') }}
        </h2>
    </x-slot>
    
    <div class="p-6 space-y-6">
        <div class="border p-4 rounded bg-white shadow">
            <h3 class="font-bold text-lg">Perfil del Usuario</h3>
            <p class="text-gray-600">Actualiza tu nombre, correo y contraseña.</p>
            <button class="mt-2 bg-gray-700 text-white px-4 py-2 rounded">Editar Perfil</button>
        </div>

        <div class="border p-4 rounded bg-white shadow">
            <h3 class="font-bold text-lg">Preferencias</h3>
            <p class="text-gray-600">Configura tu experiencia dentro del concesionario virtual.</p>
            <button class="mt-2 bg-gray-700 text-white px-4 py-2 rounded">Actualizar Preferencias</button>
        </div>
    </div>
</x-app-layout>
