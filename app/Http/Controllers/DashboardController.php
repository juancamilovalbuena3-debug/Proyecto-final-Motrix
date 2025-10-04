<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Vehiculo;

class DashboardController extends Controller
{
    public function index(Request $request)
    {
        // Creamos query base
        $query = Vehiculo::query();

        // Filtros dinámicos
        if ($request->filled('marca')) {
            $query->where('marca', 'like', '%' . $request->marca . '%');
        }

        if ($request->filled('modelo')) {
            $query->where('modelo', 'like', '%' . $request->modelo . '%');
        }

        if ($request->filled('precio_min')) {
            $query->where('precio', '>=', $request->precio_min);
        }

        if ($request->filled('precio_max')) {
            $query->where('precio', '<=', $request->precio_max);
        }

        // Ejecutamos consulta
        $vehiculos = $query->get();

        // Retornamos a la vista con resultados
        return view('dashboard', compact('vehiculos'));
    }
}
