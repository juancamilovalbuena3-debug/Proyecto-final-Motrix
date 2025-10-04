<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Vehiculo;
use PDF;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Storage;

class VehiculoController extends Controller
{
    // Mostrar vista de carros
    public function carros()
    {
        return view('vehiculos.carros');
    }

    // Mostrar vista de motos
    public function motos()
    {
        return view('vehiculos.motos');
    }

    // Mostrar formulario de publicar vehículo
    public function create()
    {
        return view('vehiculos.vender');
    }

    // Guardar vehículo en la base de datos
    public function store(Request $request)
    {
        $request->validate([
            'tipo' => 'required|string',
            'marca' => 'required|string',
            'modelo' => 'required|string',
            'precio' => 'required|numeric',
            'descripcion' => 'nullable|string',
            'imagen' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $vehiculo = new Vehiculo($request->only([
            'tipo','marca','modelo','precio','descripcion'
        ]));

        if ($request->hasFile('imagen')) {
            $file = $request->file('imagen');
            $filename = time().'_'.$file->getClientOriginalName();
            $file->storeAs('public/vehiculos', $filename);
            $vehiculo->imagen = $filename;
        }

        $vehiculo->save();

        return redirect()->route('dashboard')->with('success', 'Vehículo publicado con éxito 🚗🏍️');
    }

    // Mostrar formulario para editar un vehículo
    public function edit($id)
    {
        $vehiculo = Vehiculo::findOrFail($id);
        return view('vehiculos.edit', compact('vehiculo'));
    }

    // Actualizar vehículo
    public function update(Request $request, $id)
    {
        $vehiculo = Vehiculo::findOrFail($id);

        $request->validate([
            'tipo' => 'required|string',
            'marca' => 'required|string',
            'modelo' => 'required|string',
            'precio' => 'required|numeric',
            'descripcion' => 'nullable|string',
            'imagen' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $vehiculo->fill($request->only([
            'tipo','marca','modelo','precio','descripcion'
        ]));

        if ($request->hasFile('imagen')) {
            // Borrar imagen antigua si existe
            if ($vehiculo->imagen && Storage::exists('public/vehiculos/'.$vehiculo->imagen)) {
                Storage::delete('public/vehiculos/'.$vehiculo->imagen);
            }

            $file = $request->file('imagen');
            $filename = time().'_'.$file->getClientOriginalName();
            $file->storeAs('public/vehiculos', $filename);
            $vehiculo->imagen = $filename;
        }

        $vehiculo->save();

        return redirect()->route('dashboard')->with('success', 'Vehículo actualizado correctamente.');
    }

    // Eliminar vehículo
    public function destroy($id)
    {
        $vehiculo = Vehiculo::findOrFail($id);

        // Borrar imagen si existe
        if ($vehiculo->imagen && Storage::exists('public/vehiculos/'.$vehiculo->imagen)) {
            Storage::delete('public/vehiculos/'.$vehiculo->imagen);
        }

        $vehiculo->delete();

        return redirect()->route('dashboard')->with('success', 'Vehículo eliminado correctamente.');
    }

    // Listado de vehículos con filtros
    public function index(Request $request)
    {
        $query = Vehiculo::query();

        if ($request->filled('marca')) {
            $query->where('marca', 'like', '%' . $request->marca . '%');
        }
        if ($request->filled('modelo')) {
            $query->where('modelo', 'like', '%' . $request->modelo . '%');
        }

        $vehiculos = $query->get();

        return view('dashboard', compact('vehiculos'));
    }

    // Exportar PDF
    public function exportPdf(Request $request)
    {
        $query = Vehiculo::query();
        if ($request->filled('marca')) $query->where('marca', 'like', '%' . $request->marca . '%');
        if ($request->filled('modelo')) $query->where('modelo', 'like', '%' . $request->modelo . '%');

        $vehiculos = $query->get();

        $pdf = PDF::loadView('vehiculos.pdf', compact('vehiculos'));
        return $pdf->download('vehiculos.pdf');
    }

    // Exportar CSV
    public function exportCsv(Request $request)
    {
        $query = Vehiculo::query();
        if ($request->filled('marca')) $query->where('marca', 'like', '%' . $request->marca . '%');
        if ($request->filled('modelo')) $query->where('modelo', 'like', '%' . $request->modelo . '%');

        $vehiculos = $query->get();

        $filename = 'vehiculos.csv';
        $headers = ['Content-Type' => 'text/csv', 'Content-Disposition' => "attachment; filename=\"$filename\""];

        $callback = function() use ($vehiculos) {
            $file = fopen('php://output', 'w');
            fputcsv($file, ['ID','Tipo','Marca','Modelo','Precio','Descripción']);
            foreach ($vehiculos as $v) {
                fputcsv($file, [
                    $v->id, $v->tipo, $v->marca, $v->modelo,
                    $v->precio, $v->descripcion
                ]);
            }
            fclose($file);
        };

        return Response::stream($callback, 200, $headers);
    }
}
