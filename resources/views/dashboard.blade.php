<x-app-layout> 
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-black-800 leading-tight">
            {{ __('Motrix') }}
        </h2>
    </x-slot>

    <!-- Fondo blanco sin imagen -->
    <div class="py-12 bg-white min-h-screen">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <!-- Caja semi-transparente para que se vea el fondo -->
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg flex">
                
                <!-- Sidebar -->
                <aside class="w-64 bg-gray-100/90 border-r p-6">
                    <h2 class="text-lg font-bold mb-4">Panel</h2>
                    <ul class="space-y-2">
                       <li><a href="{{ route('dashboard') }}" class="text-black font-semibold">Inicio</a></li>
                       <li><a href="{{ route('empleados.index') }}" class="text-black font-semibold">Empleados</a></li>
                       <li><a href="{{ route('carros') }}" class="text-black font-semibold">Carros</a></li>
                       <li><a href="{{ route('motos') }}" class="text-black font-semibold">Motos</a></li>
                       <li><a href="{{ route('vender') }}" class="text-black font-semibold">Vender Vehículo</a></li>
                       <li><a href="{{ route('configuracion') }}" class="text-black font-semibold">Configuración</a></li>
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

                    <div class="mt-8 bg-gray-100 p-6 rounded-lg shadow text-center">
                        <h3 class="text-lg font-semibold mb-2">Panel Principal</h3>
                        <p class="text-gray-700">
                            Desde aquí puedes navegar a las secciones de empleados, vehículos, configuración y más.
                        </p>
                    </div>
                </main>
            </div>
        </div>
    </div>
</x-app-layout>
