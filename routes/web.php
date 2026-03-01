<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\EmpleadoController;
use App\Http\Controllers\VehiculoController;
use App\Http\Controllers\ConfiguracionController;
<<<<<<< HEAD
=======
use App\Http\Controllers\PaymentController;
>>>>>>> ae96dda (Agregar integración)

Route::get('/', function () {
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {

<<<<<<< HEAD
    /* ========================
       🏠 DASHBOARD
    ========================= */
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    /* ========================
       👨‍💼 EMPLEADOS
    ========================= */
=======
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

>>>>>>> ae96dda (Agregar integración)
    Route::resource('empleados', EmpleadoController::class);
    Route::get('/empleados/export/pdf', [EmpleadoController::class, 'exportPdf'])->name('empleados.export.pdf');
    Route::get('/empleados/export/csv', [EmpleadoController::class, 'exportCsv'])->name('empleados.export.csv');

<<<<<<< HEAD
    /* ========================
       🚗 VEHÍCULOS
    ========================= */

    // Listado general con búsqueda y filtros
    Route::get('/vehiculos', [VehiculoController::class, 'index'])->name('vehiculos.index');

    // Crear vehículo (desde dashboard o formulario)
    Route::get('/vehiculos/create', [VehiculoController::class, 'create'])->name('vehiculos.create');
    Route::post('/vehiculos', [VehiculoController::class, 'store'])->name('vehiculos.store');

    // Editar / Actualizar / Eliminar
    Route::get('/vehiculos/{id}/edit', [VehiculoController::class, 'edit'])->name('vehiculos.edit');
    Route::put('/vehiculos/{id}', [VehiculoController::class, 'update'])->name('vehiculos.update');
    Route::delete('/vehiculos/{id}', [VehiculoController::class, 'destroy'])->name('vehiculos.destroy');

    // Exportaciones PDF / CSV
    Route::get('/vehiculos/export/pdf', [VehiculoController::class, 'exportPdf'])->name('vehiculos.export.pdf');
    Route::get('/vehiculos/export/csv', [VehiculoController::class, 'exportCsv'])->name('vehiculos.export.csv');

    // Secciones separadas
    Route::get('/carros', [VehiculoController::class, 'carros'])->name('carros');
    Route::get('/motos', [VehiculoController::class, 'motos'])->name('motos');

    /* ========================
       💰 VENDER VEHÍCULO
    ========================= */
    Route::get('/vender', [VehiculoController::class, 'create'])->name('vender');
    Route::post('/vender', [VehiculoController::class, 'store'])->name('vender.store');

    /* ========================
       ⚙️ CONFIGURACIÓN
    ========================= */
    Route::get('/configuracion', [ConfiguracionController::class, 'index'])->name('configuracion');
=======
    Route::get('/vehiculos', [VehiculoController::class, 'index'])->name('vehiculos.index');
    Route::get('/vehiculos/create', [VehiculoController::class, 'create'])->name('vehiculos.create');
    Route::post('/vehiculos', [VehiculoController::class, 'store'])->name('vehiculos.store');
    Route::get('/vehiculos/{id}/edit', [VehiculoController::class, 'edit'])->name('vehiculos.edit');
    Route::put('/vehiculos/{id}', [VehiculoController::class, 'update'])->name('vehiculos.update');
    Route::delete('/vehiculos/{id}', [VehiculoController::class, 'destroy'])->name('vehiculos.destroy');
    Route::get('/vehiculos/export/pdf', [VehiculoController::class, 'exportPdf'])->name('vehiculos.export.pdf');
    Route::get('/vehiculos/export/csv', [VehiculoController::class, 'exportCsv'])->name('vehiculos.export.csv');
    Route::get('/carros', [VehiculoController::class, 'carros'])->name('carros');
    Route::get('/motos', [VehiculoController::class, 'motos'])->name('motos');

    Route::get('/vender', [VehiculoController::class, 'create'])->name('vender');
    Route::post('/vender', [VehiculoController::class, 'store'])->name('vender.store');

    Route::get('/configuracion', [ConfiguracionController::class, 'index'])->name('configuracion');

    /* ========================
       💳 PAGOS
    ========================= */
    Route::get('/pagar', [PaymentController::class, 'pagar'])->name('pagar');

    Route::get('/success', function () {
        return "Pago exitoso";
    })->name('success');

    Route::get('/cancel', function () {
        return "Pago cancelado";
    })->name('cancel');
>>>>>>> ae96dda (Agregar integración)
});
