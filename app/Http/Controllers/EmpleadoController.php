<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Empleado;
use App\Models\Vehiculo;
use Barryvdh\DomPDF\Facade\Pdf; // Para PDF
use Symfony\Component\HttpFoundation\StreamedResponse; // Para CSV

class EmpleadoController extends Controller
{
    /**
     * Muestra la lista de empleados y vehículos
     */
    public function index(Request $request)
    {
        // === Empleados ===
        $queryEmpleados = Empleado::query();

        if ($request->filled('busqueda')) {
            $busqueda = trim($request->busqueda);

            // Búsqueda parcial (no exacta)
            $queryEmpleados->where(function ($q) use ($busqueda) {
                $q->where('nombre', 'like', '%' . strtolower($busqueda) . '%')
                  ->orWhere('email', 'like', '%' . strtolower($busqueda) . '%');
            });
        }

        $empleados = $queryEmpleados->paginate(10)->withQueryString();

        // === Vehículos === (solo se muestran en la tabla, sin filtrar empleados)
        $vehiculos = Vehiculo::paginate(10);

        return view('empleados.index', compact('empleados', 'vehiculos'))
                ->with('busqueda', $request->busqueda);
    }

    /**
     * Mostrar formulario para crear un nuevo empleado
     */
    public function create()
    {
        return view('empleados.create');
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

            $query->where(function ($q) use ($busqueda) {
                $q->where('nombre', 'like', '%' . strtolower($busqueda) . '%')
                  ->orWhere('email', 'like', '%' . strtolower($busqueda) . '%');
            });
        }

        $empleados = $query->get();
        $fecha = now()->format('d/m/Y H:i');

        $pdf = Pdf::loadView('empleados.pdf', compact('empleados', 'fecha'))
                  ->setPaper('a4', 'landscape');

        $filename = 'empleados_' . now()->format('Ymd_His') . '.pdf';
        return $pdf->download($filename);
    }

    /**
     * Exportar empleados en CSV (respetando filtros)
     */
    public function exportCsv(Request $request)
    {
        $query = Empleado::query();

        if ($request->filled('busqueda')) {
            $busqueda = trim($request->busqueda);

            $query->where(function ($q) use ($busqueda) {
                $q->where('nombre', 'like', '%' . strtolower($busqueda) . '%')
                  ->orWhere('email', 'like', '%' . strtolower($busqueda) . '%');
            });
        }

        $empleados = $query->get();

        $response = new StreamedResponse(function () use ($empleados) {
            $handle = fopen('php://output', 'w');
            fputcsv($handle, ['ID', 'Nombre', 'Puesto', 'Salario', 'Email']);

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

        $filename = 'empleados_' . now()->format('Ymd_His') . '.csv';
        $response->headers->set('Content-Type', 'text/csv');
        $response->headers->set('Content-Disposition', 'attachment; filename="' . $filename . '"');

        return $response;
    }
}
