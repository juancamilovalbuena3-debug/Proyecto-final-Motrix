<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class VehiculoController extends Controller
{
    public function carros()
    {
        return view('vehiculos.carros');
    }

    public function motos()
    {
        return view('vehiculos.motos');
    }

    public function create()
    {
        return view('vehiculos.vender');
    }

    public function store(Request $request)
    {
        // Aquí podrías guardar en la BD más adelante
        // Ejemplo:
        // Vehiculo::create($request->all());

        return redirect()->route('dashboard')->with('success', 'Vehículo publicado con éxito 🚗🏍️');
    }
}
