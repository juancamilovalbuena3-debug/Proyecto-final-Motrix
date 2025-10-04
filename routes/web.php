<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\EmpleadoController;
use App\Http\Controllers\VehiculoController;
use App\Http\Controllers\ConfiguracionController;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {

    // Dashboard
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // CRUD Empleados
    Route::resource('empleados', EmpleadoController::class);
    Route::get('/empleados/export/pdf', [EmpleadoController::class, 'exportPdf'])->name('empleados.export.pdf');
    Route::get('/empleados/export/csv', [EmpleadoController::class, 'exportCsv'])->name('empleados.export.csv');

    // Listado completo de Vehículos con búsqueda
    Route::get('/vehiculos', [VehiculoController::class, 'index'])->name('vehiculos.index');

    // Carros
    Route::get('/carros', [VehiculoController::class, 'carros'])->name('carros');
    // Motos
    Route::get('/motos', [VehiculoController::class, 'motos'])->name('motos');

    // Vender vehículo
    Route::get('/vender', [VehiculoController::class, 'create'])->name('vender');
    Route::post('/vender', [VehiculoController::class, 'store'])->name('vender.store');
    Route::get('/vehiculos/{id}/edit', [VehiculoController::class, 'edit'])->name('vehiculos.edit');
    Route::put('/vehiculos/{id}', [VehiculoController::class, 'update'])->name('vehiculos.update');
    Route::delete('/vehiculos/{id}', [VehiculoController::class, 'destroy'])->name('vehiculos.destroy');

    // Exportaciones Vehículos (PDF y CSV filtrados con el mismo parámetro)
    Route::get('/vehiculos/export/pdf', [VehiculoController::class, 'exportPdf'])->name('vehiculos.export.pdf');
    Route::get('/vehiculos/export/csv', [VehiculoController::class, 'exportCsv'])->name('vehiculos.export.csv');

    // Configuración
    Route::get('/configuracion', [ConfiguracionController::class, 'index'])->name('configuracion');
    
});
