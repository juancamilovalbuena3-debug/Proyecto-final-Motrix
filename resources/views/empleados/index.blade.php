<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Empleados') }}
        </h2>
    </x-slot>
    <!-- Fondo global con la imagen del carro -->
    <div class="py-12 bg-cover bg-center min-h-screen" style="background-image: url('{{ asset('images/turbo.jpg') }}');">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <!-- Caja semi-transparente para que se vea el fondo -->
            <div class="bg-white/80 overflow-hidden shadow-xl sm:rounded-lg flex">
                

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg flex">

                <!-- Sidebar -->
                <aside class="w-64 bg-gray-100 border-r p-6">
                    <h2 class="text-lg font-bold mb-4">Panel</h2>
                    <ul class="space-y-2">
                        <li><a href="{{ route('dashboard') }}" class="text-gray-700">Inicio</a></li>
                        <li><a href="{{ route('empleados.index') }}" class="text-blue-600">Empleados</a></li>
                        <li><a href="{{ route('carros') }}" class="text-gray-700">Carros</a></li>
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
                    <h2 class="text-xl font-semibold mb-6">Gestión de Empleados</h2>

                    {{-- Formulario de búsqueda --}}
                    <form method="GET" action="{{ route('empleados.index') }}" class="mb-6 flex gap-2">
                        <input type="text" name="busqueda" value="{{ request('busqueda') }}"
                               placeholder="Buscar por nombre o email..."
                               class="border p-2 rounded w-1/2">
                        <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded">
                            🔍 Buscar
                        </button>
                        <a href="{{ route('empleados.index') }}"
                           class="bg-gray-500 hover:bg-gray-600 text-white px-4 py-2 rounded">
                            ✖ Limpiar
                        </a>
                    </form>

                    {{-- Mensaje de resultados --}}
                    @if(request('busqueda'))
                        <div class="mb-4 p-3 bg-blue-100 text-blue-700 rounded">
                            Se encontraron <strong>{{ $empleados->count() }}</strong> resultados para 
                            "<em>{{ request('busqueda') }}</em>".
                        </div>
                    @endif

                    {{-- Formulario para agregar empleado --}}
                    <div class="mb-6">
                        <form action="{{ route('empleados.store') }}" method="POST" class="flex gap-2">
                            @csrf
                            <input type="text" name="nombre" placeholder="Nombre" class="border p-2 rounded" required>
                            <input type="text" name="puesto" placeholder="Puesto" class="border p-2 rounded" required>
                            <input type="number" step="0.01" name="salario" placeholder="Salario" class="form-control"
                            min="1" step="0.01" required>
                            <input type="email" name="email" placeholder="Email" class="border p-2 rounded" required>
                            <button type="submit" class="bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded">
                                ➕ Agregar
                            </button>
                        </form>
                    </div>

                    {{-- Botones de exportación --}}
                    <div class="mb-6 flex gap-3">
                        <a href="{{ route('empleados.export.pdf', ['busqueda' => request('busqueda')]) }}"
                           class="bg-red-600 hover:bg-red-700 text-white px-4 py-2 rounded">
                            📄 Exportar PDF
                        </a>
                        <a href="{{ route('empleados.export.csv', ['busqueda' => request('busqueda')]) }}"
                           class="bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded">
                            📊 Exportar CSV
                        </a>
                    </div>

                    {{-- Lista de empleados --}}
                    <div class="overflow-x-auto">
                        <table class="table-auto w-full border">
                            <thead>
                                <tr class="bg-gray-200 text-left">
                                    <th class="px-4 py-2 border">ID</th>
                                    <th class="px-4 py-2 border">Nombre</th>
                                    <th class="px-4 py-2 border">Puesto</th>
                                    <th class="px-4 py-2 border">Salario</th>
                                    <th class="px-4 py-2 border">Email</th>
                                    <th class="px-4 py-2 border">Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($empleados as $empleado)
                                    <tr>
                                        <td class="px-4 py-2 border">{{ $empleado->id }}</td>
                                        <td class="px-4 py-2 border">{{ $empleado->nombre }}</td>
                                        <td class="px-4 py-2 border">{{ $empleado->puesto }}</td>
                                        <td class="px-4 py-2 border">{{ $empleado->salario }}</td>
                                        <td class="px-4 py-2 border">{{ $empleado->email }}</td>
                                        <td class="px-4 py-2 border flex gap-2">
                                            {{-- Editar --}}
                                            <a href="{{ route('empleados.edit', $empleado->id) }}"
                                               class="bg-blue-600 hover:bg-blue-700 text-white px-3 py-1 rounded">
                                                ✏️
                                            </a>
                                            {{-- Eliminar --}}
                                            <form action="{{ route('empleados.destroy', $empleado->id) }}" method="POST" class="inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit"
                                                        class="bg-red-600 hover:bg-red-700 text-white px-3 py-1 rounded"
                                                        onclick="return confirm('¿Seguro que quieres eliminar este empleado?')">
                                                    🗑️
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="6" class="px-4 py-4 text-center text-gray-500">No hay empleados registrados.</td>
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
