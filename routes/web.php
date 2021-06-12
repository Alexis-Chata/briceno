<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::view('/', 'consulta');
Route::post('/', [App\Http\Controllers\ConsultasController::class, 'index']);

Route::middleware(['auth:sanctum', 'verified'])->group(function () {
    Route::view('/dashboard', 'admin.dashboard')->name('dashboard');
    Route::view('import_alumnos', 'import', ['success' =>"", 'message']);
    Route::view('alumnos/eliminar', 'alumnos.eliminar', [ 'msj' =>""]);

    Route::resource('alumnos', App\Http\Controllers\AlumnosController::class)->only(['index', 'create', 'edit', 'update', 'destroy']);
    Route::post('alumnos', [App\Http\Controllers\AlumnosController::class, 'buscar']);
    Route::post('alumnos/guardar', [App\Http\Controllers\AlumnosController::class, 'guardar'])->name('alumnos.guardar');
    Route::post('alumnos/eliminar', [App\Http\Controllers\AlumnosController::class, 'truncate'])->name('alumnos.truncate');
    Route::post('import_alumnos', [App\Http\Controllers\AlumnosController::class, 'importExcel'])->name('alumnos.import.excel');

    Route::get('alumnos/lista', [App\Http\Controllers\AlumnosController::class, 'lista']);
    Route::get('alumnos/asistencia', [App\Http\Controllers\AsistenciasController::class, 'asistencia'])->name('alumnos.asistencia');
    Route::get('export_alumnos_excel', [App\Http\Controllers\AlumnosController::class, 'exportExcel'])->name('alumnos.export.excel');
    Route::get('export_alumnos', [App\Http\Controllers\AlumnosController::class, 'exportCsv'])->name('alumnos.export.csv');
});
