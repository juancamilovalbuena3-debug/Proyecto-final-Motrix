@extends('layouts.app')

@section('content')
<div class="max-w-3xl mx-auto bg-white shadow p-6 rounded">
    <h1 class="text-2xl font-bold mb-6">Publicar Vehículo en Venta 🚗</h1>

    <form action="{{ route('vender.store') }}" method="POST">
        @csrf
        <div class="mb-4">
            <label class="block font-semibold">Tipo:</label>
            <select name="tipo" class="w-full border p-2 rounded" required>
                <option value="Carro">Carro</option>
                <option value="Moto">Moto</option>
            </select>
        </div>

        <div class="mb-4">
            <label class="block font-semibold">Marca:</label>
            <input type="text" name="marca" class="w-full border p-2 rounded" required>
        </div>

        <div class="mb-4">
            <label class="block font-semibold">Modelo:</label>
            <input type="text" name="modelo" class="w-full border p-2 rounded" required>
        </div>

        <div class="mb-4">
            <label class="block font-semibold">Precio:</label>
            <input type="number" name="precio" class="w-full border p-2 rounded" required>
        </div>

        <div class="mb-4">
            <label class="block font-semibold">Descripción:</label>
            <textarea name="descripcion" class="w-full border p-2 rounded"></textarea>
        </div>

        <button type="submit" class="bg-red-600 hover:bg-red-700 text-white px-4 py-2 rounded">
            Publicar Vehículo
        </button>
    </form>
</div>
@endsection
