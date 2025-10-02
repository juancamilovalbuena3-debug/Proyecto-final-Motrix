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

    // Dashboard con controlador
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // CRUD empleados
    Route::resource('empleados', EmpleadoController::class);
    
    // Exportaciones empleados
    Route::get('/empleados/export/pdf', [EmpleadoController::class, 'exportPdf'])->name('empleados.export.pdf');
    Route::get('/empleados/export/csv', [EmpleadoController::class, 'exportCsv'])->name('empleados.export.csv');

    // Carros
    Route::get('/carros', [VehiculoController::class, 'carros'])->name('carros');

    // Motos
    Route::get('/motos', [VehiculoController::class, 'motos'])->name('motos');

    // Configuración
    Route::get('/configuracion', [ConfiguracionController::class, 'index'])->name('configuracion');

    // Vender vehículo
    Route::get('/vender', [VehiculoController::class, 'create'])->name('vender');
    Route::post('/vender', [VehiculoController::class, 'store'])->name('vender.store');
});
