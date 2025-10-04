<x-app-layout> 
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-black-800 leading-tight">
            {{ __('Motrix') }}
        </h2>
    </x-slot>

    <!-- Fondo global con la imagen del carro -->
    <div class="py-12 bg-cover bg-center min-h-screen" style="background-image: url('{{ asset('images/amarillo.jpg') }}');">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <!-- Caja semi-transparente para que se vea el fondo -->
            <div class="bg-white/80 overflow-hidden shadow-xl sm:rounded-lg flex">
                
                <!-- Sidebar -->
                <aside class="w-64 bg-gray-100/90 border-r p-6">
                    <h2 class="text-lg font-bold mb-4">Panel</h2>
                    <ul class="space-y-2">
                       <li><a href="{{ route('dashboard') }}" class="text-blue-600 font-semibold">Inicio</a></li>
                       <li><a href="{{ route('empleados.index') }}" class="text-gray-700 font-semibold">Empleados</a></li>
                       <li><a href="{{ route('carros') }}" class="text-gray-700 font-semibold">Carros</a></li>
                       <li><a href="{{ route('motos') }}" class="text-gray-700 font-semibold">Motos</a></li>
                       <li><a href="{{ route('vender') }}" class="text-gray-700 font-semibold">Vender Vehículo</a></li>
                       <li><a href="{{ route('configuracion') }}" class="text-gray-700 font-semibold">Configuración</a></li>
                       <form method="POST" action="{{ route('logout') }}">
                           @csrf
                           <button type="submit" class="text-red-600 mt-2 font-semibold">Cerrar sesión</button>
                       </form>
                    </ul>
                </aside>

                <!-- Contenido principal -->
                <main class="flex-1 p-6">
                    <h1 class="text-2xl font-bold mb-4">Bienvenido a Motrix</h1>
                    <p class="mb-4 font-medium">“Tu aventura empieza con Motrix”.</p>

                    <!-- Mostrar vehículos publicados -->
                    <h2 class="text-xl font-semibold mb-3">Vehículos Publicados</h2>

                    @if(session('success'))
                        <div class="mb-4 p-3 bg-green-100 text-green-700 rounded shadow">
                            {{ session('success') }}
                        </div>
                    @endif

                    <!-- Botones de exportación -->
                    <div class="mb-4 flex space-x-3">
                        <a href="{{ route('vehiculos.export.pdf') }}" 
                           class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded shadow font-semibold">
                           📄 Exportar PDF
                        </a>
                        <a href="{{ route('vehiculos.export.csv') }}" 
                           class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded shadow font-semibold">
                           📊 Exportar CSV
                        </a>
                    </div>

                    <!-- Formulario de filtro -->
                    <form method="GET" action="{{ route('vehiculos.index') }}" class="mb-4 flex space-x-2">
                        <input type="text" name="marca" value="{{ request('marca') }}" 
                               placeholder="Buscar por marca" 
                               class="border rounded px-3 py-2 w-1/3">
                        <input type="text" name="modelo" value="{{ request('modelo') }}" 
                               placeholder="Buscar por modelo" 
                               class="border rounded px-3 py-2 w-1/3">
                        <button type="submit" 
                                class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded shadow font-semibold">
                                🔍 Filtrar
                        </button>
                        <a href="{{ route('vehiculos.index') }}" 
                           class="bg-gray-400 hover:bg-gray-500 text-white px-4 py-2 rounded shadow font-semibold">
                           ❌ Limpiar
                        </a>
                    </form>

                    @if(isset($vehiculos) && $vehiculos->count() > 0)
                        <table class="table-auto w-full border bg-white shadow rounded text-gray-800">
                            <thead class="bg-gray-300">
                                <tr>
                                    <th class="px-4 py-2 border">ID</th>
                                    <th class="px-4 py-2 border">Imagen</th>
                                    <th class="px-4 py-2 border">Tipo</th>
                                    <th class="px-4 py-2 border">Marca</th>
                                    <th class="px-4 py-2 border">Modelo</th>
                                    <th class="px-4 py-2 border">Precio</th>
                                    <th class="px-4 py-2 border">Descripción</th>
                                    <th class="px-4 py-2 border">Acciones</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white">
                                @foreach($vehiculos as $vehiculo)
                                    <tr>
                                        <td class="border px-4 py-2">{{ $vehiculo->id }}</td>
                                        <td class="border px-4 py-2">
                                            @if($vehiculo->imagen)
                                                <img src="{{ asset('storage/vehiculos/'.$vehiculo->imagen) }}" alt="Imagen" class="w-20 h-auto rounded">
                                            @else
                                                <span class="text-gray-500">Sin imagen</span>
                                            @endif
                                        </td>
                                        <td class="border px-4 py-2">{{ $vehiculo->tipo }}</td>
                                        <td class="border px-4 py-2">{{ $vehiculo->marca }}</td>
                                        <td class="border px-4 py-2">{{ $vehiculo->modelo }}</td>
                                        <td class="border px-4 py-2">${{ number_format($vehiculo->precio, 2) }}</td>
                                        <td class="border px-4 py-2">{{ $vehiculo->descripcion }}</td>
                                        <td class="border px-4 py-2 flex space-x-2">
                                            <!-- Botón Editar -->
                                            <a href="{{ route('vehiculos.edit', $vehiculo->id) }}" 
                                               class="bg-gray-600 hover:bg-gray-700 text-black px-3 py-1 rounded shadow font-semibold transition">
                                                Editar
                                            </a>
                                            <!-- Botón Eliminar -->
                                            <form action="{{ route('vehiculos.destroy', $vehiculo->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" onclick="return confirm('¿Eliminar este vehículo?')" 
                                                        class="bg-gray-600 hover:bg-gray-700 text-black px-3 py-1 rounded shadow font-semibold transition">
                                                    Eliminar
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    @else
                        <p class="text-gray-800 font-medium mt-4">No hay vehículos publicados aún.</p>
                    @endif
                </main>
            </div>
        </div>
    </div>
</x-app-layout>
