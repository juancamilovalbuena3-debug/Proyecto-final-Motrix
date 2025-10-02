<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Empleado; // modelo de empleados

class DashboardController extends Controller
{
    public function index()
    {
        $empleados = Empleado::all();
        return view('dashboard', compact('empleados'));
    }
}

