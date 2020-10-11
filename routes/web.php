<?php

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

Route::get('/', function () {
    return view('consulta');
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('admin.dashboard');
})->name('dashboard');

Route::middleware(['auth:sanctum', 'verified'])->post('alumnos', [App\Http\Controllers\AlumnosController::class, 'buscar']);
Route::middleware(['auth:sanctum', 'verified'])->post('alumnos/guardar', [App\Http\Controllers\AlumnosController::class, 'guardar'])->name('alumnos.guardar');
Route::middleware(['auth:sanctum', 'verified'])->resource('alumnos', App\Http\Controllers\AlumnosController::class)->only(['index', 'create']);
Route::post('/', [App\Http\Controllers\ConsultasController::class, 'index']);

Route::middleware(['auth:sanctum', 'verified'])->get('import_alumnos', function (){return  view('import');});
Route::middleware(['auth:sanctum', 'verified'])->post('import_alumnos', [App\Http\Controllers\AlumnosController::class, 'importExcel'])->name('alumnos.import.excel');
Route::middleware(['auth:sanctum', 'verified'])->get('export-list-excel', [App\Http\Controllers\AlumnosController::class, 'exportExcel'])->name('alumnos.export.excel');
