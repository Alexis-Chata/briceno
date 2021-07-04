<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AlumnosController;
use App\Http\Controllers\AsistenciasController;
use App\Http\Controllers\CamposAdicionales;
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

    Route::resource('alumnos', AlumnosController::class)->only(['index', 'create', 'edit', 'update', 'destroy']);
    Route::post('alumnos', [AlumnosController::class, 'buscar']);
    Route::post('alumnos/guardar', [AlumnosController::class, 'guardar'])->name('alumnos.guardar');
    Route::post('alumnos/eliminar', [AlumnosController::class, 'truncate'])->name('alumnos.truncate');
    Route::post('import_alumnos', [AlumnosController::class, 'importExcel'])->name('alumnos.import.excel');

    Route::get('alumnos/lista', [AlumnosController::class, 'lista']);
    Route::get('alumnos/asistencia', [AsistenciasController::class, 'asistencia'])->name('alumnos.asistencia');
    Route::get('export_alumnos_excel', [AlumnosController::class, 'exportExcel'])->name('alumnos.export.excel');
    Route::get('export_alumnos', [AlumnosController::class, 'exportCsv'])->name('alumnos.export.csv');
    Route::get('export_asistencias_excel', [AsistenciasController::class, 'exportExcel'])->name('asistencias.export.excel');
    Route::get('export_asistencias', [AsistenciasController::class, 'exportCsv'])->name('asistencias.export.csv');
	/**/
	Route::resource('camposAdicionales', CamposAdicionales::class);
	//rout especifica
	Route::get('camposAdicionales/{id}/{signo}/mover',[CamposAdicionales::class,'mover']);
	Route::get('camposAdicionales/{id}/{categoria}/{signo}/mover2',[CamposAdicionales::class,'mover2']);
	Route::get('camposAdicionales/{id}/crearcampo',[CamposAdicionales::class,'crearcampo']);
	Route::get('camposAdicionales/{id}/edit2',[CamposAdicionales::class,'edit2']);
	Route::post('camposAdicionales/store2',[CamposAdicionales::class,'store2']);
	Route::post('camposAdicionales/{id}/update2',[CamposAdicionales::class,'update2']);
	Route::post('camposAdicionales/{id}/destroy2',[CamposAdicionales::class,'destroy2']);
});
