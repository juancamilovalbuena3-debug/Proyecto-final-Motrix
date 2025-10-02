<x-app-layout> 
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Motrix') }}
        </h2>
    </x-slot>

    <!-- Fondo global con la imagen del carro -->
    <div class="py-12 bg-cover bg-center min-h-screen" style="background-image: url('{{ asset('images/carro.jpg') }}');">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <!-- Caja semi-transparente para que se vea el fondo -->
            <div class="bg-white/80 overflow-hidden shadow-xl sm:rounded-lg flex">
                
                <!-- Sidebar -->
                <aside class="w-64 bg-gray-100/90 border-r p-6">
                    <h2 class="text-lg font-bold mb-4">Panel</h2>
                    <ul class="space-y-2">
                       <li><a href="{{ route('dashboard') }}" class="text-blue-600">Inicio</a></li>
                       <li><a href="{{ route('empleados.index') }}" class="text-gray-700">Empleados</a></li>
                       <li><a href="{{ route('carros') }}" class="text-gray-700">Carros</a></li>
                       <li><a href="{{ route('motos') }}" class="text-gray-700">Motos</a></li>
                       <li><a href="{{ route('vender') }}" class="text-gray-700">Vender Vehículo</a></li>
                       <li><a href="{{ route('configuracion') }}" class="text-gray-700">Configuración</a></li>
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button type="submit" class="text-red-600">Cerrar sesión</button>
                            </form>
                        </li>
                    </ul>
                </aside>

                <!-- Contenido principal -->
                <main class="flex-1 p-6">
                    <h1 class="text-2xl font-bold mb-4">Bienvenido a Motrix</h1>
                    <p class="mb-4">“Tu aventura empieza con Motrix”.</p>
                </main>
            </div>
        </div>
    </div>
</x-app-layout>
