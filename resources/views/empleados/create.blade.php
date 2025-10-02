<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Agregar Empleado') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white p-6 shadow-md rounded">
                <h2 class="text-lg font-semibold mb-4">Nuevo Empleado</h2>

                <form action="{{ route('empleados.store') }}" method="POST">
                    @csrf

                    <div class="mb-4">
                        <label class="block">Nombre:</label>
                        <input type="text" name="nombre" class="w-full border px-3 py-2 rounded" required>
                    </div>

                    <div class="mb-4">
                        <label class="block">Puesto:</label>
                        <input type="text" name="puesto" class="w-full border px-3 py-2 rounded" required>
                    </div>

                    <div class="mb-4">
                        <label class="block">Salario:</label>
                        <input type="number" step="0.01" name="salario" class="w-full border px-3 py-2 rounded" required>
                    </div>

                    <div class="mb-4">
                        <label class="block">Email:</label>
                        <input type="email" name="email" class="w-full border px-3 py-2 rounded" required>
                    </div>

                    <div class="flex space-x-4">
                        <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded">Guardar</button>
                        <a href="{{ route('empleados.index') }}" class="bg-gray-500 text-white px-4 py-2 rounded">Cancelar</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
