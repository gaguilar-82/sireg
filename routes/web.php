<?php

use App\Http\Controllers\AsignadoController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ColoniaController;
use App\Http\Controllers\EscrituraController;
use App\Http\Controllers\InspeccionController;
use App\Http\Controllers\LoteController;
use App\Http\Controllers\PagoController;
use App\Http\Controllers\PosesionarioController;



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

Route::middleware(['auth:sanctum', 'verified'])->get('/', function () {
    return view('welcome');
})->name('home');

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

//Rutas Colonias
Route::get('colonias', [ColoniaController::class, 'index'])->name('colonias.index');

Route::post('colonias', [ColoniaController::class, 'store'])->name('colonias.store');

Route::get('colonias/{colonia}', [ColoniaController::class, 'show'])->name('colonias.show');

Route::get('colonias/{colonia}/edit', [ColoniaController::class, 'edit'])->name('colonias.edit');

Route::put('colonias/{colonia}', [ColoniaController::class, 'update'])->name('colonias.update');

Route::delete('colonias/{colonia}', [ColoniaController::class, 'destroy'])->name('colonias.destroy');

//Rutas Lotes
Route::get('lotes', [LoteController::class, 'index'])->name('lotes.index');

Route::post('lotes', [LoteController::class, 'store'])->name('lotes.store');

Route::get('lotes/{lote}', [LoteController::class, 'show'])->name('lotes.show');

Route::get('lotes/{lote}/edit', [LoteController::class, 'edit'])->name('lotes.edit');

Route::put('lotes/{lote}', [LoteController::class, 'update'])->name('lotes.update');

Route::delete('lotes/{lote}', [LoteController::class, 'destroy'])->name('lotes.destroy');

Route::get('lotes/{lote}/print', [LoteController::class, 'print'])->name('lotes.print');

//Rutas Posesionarios
Route::get('posesionarios', [PosesionarioController::class, 'index'])->name('posesionarios.index');

Route::post('posesionarios', [PosesionarioController::class, 'store'])->name('posesionarios.store');

Route::get('posesionarios/{posesionario}', [PosesionarioController::class, 'show'])->name('posesionarios.show');

Route::get('posesionarios/{posesionario}/edit', [PosesionarioController::class, 'edit'])->name('posesionarios.edit');

Route::put('posesionarios/{posesionario}', [PosesionarioController::class, 'update'])->name('posesionarios.update');

Route::delete('posesionarios/{posesionario}', [PosesionarioController::class, 'destroy'])->name('posesionarios.destroy');

//Rutas Asignados
Route::get('asignados', [AsignadoController::class, 'index'])->name('asignados.index');

Route::post('asignados', [AsignadoController::class, 'store'])->name('asignados.store');

Route::get('asignados/{asignado}', [AsignadoController::class, 'show'])->name('asignados.show');

Route::get('asignados/{asignado}/edit', [AsignadoController::class, 'edit'])->name('asignados.edit');

Route::put('asignados/{asignado}', [AsignadoController::class, 'update'])->name('asignados.update');

Route::put('asignados/{asignado}/validar', [AsignadoController::class, 'validar'])->name('asignados.validar');

Route::delete('asignados/{asignado}', [AsignadoController::class, 'destroy'])->name('asignados.destroy');

//Rutas Pagos
Route::get('pagos', [PagoController::class, 'index'])->name('pagos.index');

Route::post('pagos', [PagoController::class, 'store'])->name('pagos.store');

Route::get('pagos/{pago}', [PagoController::class, 'show'])->name('pagos.show');

Route::get('pagos/{pago}/edit', [PagoController::class, 'edit'])->name('pagos.edit');

Route::put('pagos/{pago}', [PagoController::class, 'update'])->name('pagos.update');

Route::delete('pagos/{pago}', [PagoController::class, 'destroy'])->name('pagos.destroy');

Route::get('pagos/{pago}/print', [PagoController::class, 'print'])->name('pagos.print');

Route::get('pagos/{pago}/pdf', [PagoController::class, 'pdf'])->name('pagos.pdf');

//Rutas Inspecciones
Route::get('inspecciones', [InspeccionController::class, 'index'])->name('inspecciones.index');

Route::post('inspecciones', [InspeccionController::class, 'store'])->name('inspecciones.store');

Route::get('inspecciones/{inspeccion}',[InspeccionController::class, 'show'])->name('inspecciones.show');

Route::get('inspecciones/{inspeccion}/edit',[InspeccionController::class, 'edit'])->name('inspecciones.edit');

Route::put('inspecciones/{inspeccion}', [InspeccionController::class, 'update'])->name('inspecciones.update');

Route::delete('inspecciones/{inspeccion}', [InspeccionController::class, 'destroy'])->name('inspecciones.destroy');

Route::get('inspecciones/{inspeccion}/print', [InspeccionController::class, 'print'])->name('inspecciones.print');

//Rutas Escrituras
Route::get('escrituras', [EscrituraController::class, 'index'])->name('escrituras.index');

Route::post('escrituras', [EscrituraController::class, 'store'])->name('escrituras.store');

Route::get('escrituras/{escritura}', [EscrituraController::class, 'show'])->name('escrituras.show');

Route::get('escrituras/{escritura}/edit', [EscrituraController::class, 'edit'])->name('escrituras.edit');

Route::put('escrituras/{escritura}', [EscrituraController::class, 'update'])->name('escrituras.update');

Route::delete('escrituras/{escritura}', [EscrituraController::class, 'destroy'])->name('escrituras.destroy');

Route::get('escrituras/{escritura}/print', [EscrituraController::class, 'print'])->name('escrituras.print');

Route::get('escrituras/{escritura}/pdf', [EscrituraController::class, 'pdf'])->name('escrituras.pdf');


//Ruta Acerca de
Route::view('acercade','acercade')->name('acercade');