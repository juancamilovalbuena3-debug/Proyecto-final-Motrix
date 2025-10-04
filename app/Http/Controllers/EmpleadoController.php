<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Empleado;
use Barryvdh\DomPDF\Facade\Pdf; // Para PDF
use Symfony\Component\HttpFoundation\StreamedResponse; // Para CSV

class EmpleadoController extends Controller
{
    /**
     * Muestra la lista de empleados
     */
    public function index(Request $request)
    {
        $query = Empleado::query();

        if ($request->filled('busqueda')) {
            $busqueda = trim($request->busqueda);

            // Búsqueda exacta por nombre o email (insensible a mayúsculas/minúsculas)
            $query->whereRaw('LOWER(nombre) = ?', [strtolower($busqueda)])
                  ->orWhereRaw('LOWER(email) = ?', [strtolower($busqueda)]);
        }

        $empleados = $query->get();

        return view('empleados.index', compact('empleados'))
               ->with('busqueda', $request->busqueda);
    }

    /**
     * Guarda un nuevo empleado
     */
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'puesto' => 'required|string|max:255',
            'salario' => 'required|numeric|min:1',
            'email'  => 'required|email|unique:empleados,email',
        ]);

        Empleado::create($request->all());

        return redirect()->route('empleados.index')
                         ->with('success', 'Empleado creado correctamente.');
    }

    /**
     * Editar empleado
     */
    public function edit($id)
    {
        $empleado = Empleado::findOrFail($id);
        return view('empleados.edit', compact('empleado'));
    }

    /**
     * Actualizar empleado
     */
    public function update(Request $request, $id)
    {
        $empleado = Empleado::findOrFail($id);

        $request->validate([
            'nombre' => 'required|string|max:255',
            'puesto' => 'required|string|max:255',
            'salario' => 'required|numeric|min:1',
            'email'  => 'required|email|unique:empleados,email,' . $empleado->id,
        ]);

        $empleado->update($request->all());

        return redirect()->route('empleados.index')
                         ->with('success', 'Empleado actualizado correctamente.');
    }

    /**
     * Eliminar empleado
     */
    public function destroy($id)
    {
        $empleado = Empleado::findOrFail($id);
        $empleado->delete();

        return redirect()->route('empleados.index')
                         ->with('success', 'Empleado eliminado correctamente.');
    }

    /**
     * Exportar empleados en PDF (respetando filtros)
     */
    public function exportPdf(Request $request)
    {
        $query = Empleado::query();

        if ($request->filled('busqueda')) {
            $busqueda = trim($request->busqueda);
            $query->whereRaw('LOWER(nombre) = ?', [strtolower($busqueda)])
                  ->orWhereRaw('LOWER(email) = ?', [strtolower($busqueda)]);
        }

        $empleados = $query->get();
        $fecha = now()->format('d/m/Y H:i');

        $pdf = Pdf::loadView('empleados.pdf', compact('empleados', 'fecha'));
        return $pdf->download('empleados.pdf');
    }

    /**
     * Exportar empleados en CSV (respetando filtros)
     */
    public function exportCsv(Request $request)
    {
        $query = Empleado::query();

        if ($request->filled('busqueda')) {
            $busqueda = trim($request->busqueda);
            $query->whereRaw('LOWER(nombre) = ?', [strtolower($busqueda)])
                  ->orWhereRaw('LOWER(email) = ?', [strtolower($busqueda)]);
        }

        $empleados = $query->get();

        $response = new StreamedResponse(function () use ($empleados) {
            $handle = fopen('php://output', 'w');
            // Cabeceras del CSV
            fputcsv($handle, ['ID', 'Nombre', 'Puesto', 'Salario', 'Email']);

            // Filas
            foreach ($empleados as $empleado) {
                fputcsv($handle, [
                    $empleado->id,
                    $empleado->nombre,
                    $empleado->puesto,
                    $empleado->salario,
                    $empleado->email,
                ]);
            }
            fclose($handle);
        });

        $response->headers->set('Content-Type', 'text/csv');
        $response->headers->set('Content-Disposition', 'attachment; filename="empleados.csv"');

        return $response;
    }
}
