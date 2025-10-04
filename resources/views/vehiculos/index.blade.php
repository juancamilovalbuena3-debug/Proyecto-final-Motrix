<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Vehículos') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg flex">

                <!-- Sidebar -->
                <aside class="w-64 bg-gray-100 border-r p-6">
                    <h2 class="text-lg font-bold mb-4">Panel</h2>
                    <ul class="space-y-2">
                        <li><a href="{{ route('dashboard') }}" class="text-gray-700">Inicio</a></li>
                        <li><a href="{{ route('empleados.index') }}" class="text-gray-700">Empleados</a></li>
                        <li><a href="{{ route('carros') }}" class="text-blue-600">Carros</a></li>
                        <li><a href="{{ route('motos') }}" class="text-gray-700">Motos</a></li>
                        <li><a href="{{ route('configuracion') }}" class="text-gray-700">Configuración</a></li>
                        <li><a href="{{ route('vender') }}" class="text-gray-700">Vender Vehículo</a></li>
                         <li>
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button type="submit" class="text-red-600">Cerrar sesión</button>
                            </form>
                        </li>
                    </ul>
                </aside>

                <!-- Contenido principal -->
                <main class="flex-1 p-6">
                    <h2 class="text-xl font-semibold mb-6">Gestión de Vehículos</h2>

                    {{-- Formulario de búsqueda --}}
                    <form method="GET" action="{{ route('vehiculos.index') }}" class="mb-6 flex gap-2">
                        <input type="text" name="busqueda" value="{{ request('busqueda') }}"
                               placeholder="Buscar por marca, modelo o placa..."
                               class="border p-2 rounded w-1/2">
                        <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded">
                            🔍 Buscar
                        </button>
                        <a href="{{ route('vehiculos.index') }}"
                           class="bg-gray-500 hover:bg-gray-600 text-white px-4 py-2 rounded">
                            ✖ Limpiar
                        </a>
                    </form>

                    {{-- Mensaje de resultados --}}
                    @if(request('busqueda'))
                        <div class="mb-4 p-3 bg-blue-100 text-blue-700 rounded">
                            Se encontraron <strong>{{ $vehiculos->count() }}</strong> resultados para 
                            "<em>{{ request('busqueda') }}</em>".
                        </div>
                    @endif

                    {{-- Formulario para agregar vehículo --}}
                    <div class="mb-6">
                        <form action="{{ route('vehiculos.store') }}" method="POST" class="flex gap-2">
                            @csrf
                            <input type="text" name="marca" placeholder="Marca" class="border p-2 rounded" required>
                            <input type="text" name="modelo" placeholder="Modelo" class="border p-2 rounded" required>
                            <input type="text" name="placa" placeholder="Placa" class="border p-2 rounded" required>
                            <input type="number" step="0.01" name="precio" placeholder="Precio" class="border p-2 rounded" required>
                            <button type="submit" class="bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded">
                                ➕ Agregar
                            </button>
                        </form>
                    </div>

                    {{-- Botones de exportación --}}
                    <div class="mb-6 flex gap-3">
                        <a href="{{ route('vehiculos.export.pdf', ['busqueda' => request('busqueda')]) }}"
                           class="bg-red-600 hover:bg-red-700 text-white px-4 py-2 rounded">
                            📄 Exportar PDF
                        </a>
                        <a href="{{ route('vehiculos.export.csv', ['busqueda' => request('busqueda')]) }}"
                           class="bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded">
                            📊 Exportar CSV
                        </a>
                    </div>

                    {{-- Lista de vehículos --}}
                    <div class="overflow-x-auto">
                        <table class="table-auto w-full border">
                            <thead>
                                <tr class="bg-gray-200 text-left">
                                    <th class="px-4 py-2 border">ID</th>
                                    <th class="px-4 py-2 border">Marca</th>
                                    <th class="px-4 py-2 border">Modelo</th>
                                    <th class="px-4 py-2 border">Placa</th>
                                    <th class="px-4 py-2 border">Precio</th>
                                    <th class="px-4 py-2 border">Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($vehiculos as $vehiculo)
                                    <tr>
                                        <td class="px-4 py-2 border">{{ $vehiculo->id }}</td>
                                        <td class="px-4 py-2 border">{{ $vehiculo->marca }}</td>
                                        <td class="px-4 py-2 border">{{ $vehiculo->modelo }}</td>
                                        <td class="px-4 py-2 border">{{ $vehiculo->placa }}</td>
                                        <td class="px-4 py-2 border">{{ $vehiculo->precio }}</td>
                                        <td class="px-4 py-2 border flex gap-2">
                                            {{-- Editar --}}
                                            <a href="{{ route('vehiculos.edit', $vehiculo->id) }}"
                                               class="bg-blue-600 hover:bg-blue-700 text-white px-3 py-1 rounded">
                                                ✏️
                                            </a>
                                            {{-- Eliminar --}}
                                            <form action="{{ route('vehiculos.destroy', $vehiculo->id) }}" method="POST" class="inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit"
                                                        class="bg-red-600 hover:bg-red-700 text-white px-3 py-1 rounded"
                                                        onclick="return confirm('¿Seguro que quieres eliminar este vehículo?')">
                                                    🗑️
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="6" class="px-4 py-4 text-center text-gray-500">No hay vehículos registrados.</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </main>
            </div>
        </div>
    </div>
</x-app-layout>
