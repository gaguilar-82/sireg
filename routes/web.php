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
Route::get('colonias', [ColoniaController::class, 'index'])->middleware('can:colonias.index')->name('colonias.index');

Route::post('colonias', [ColoniaController::class, 'store'])->middleware('can:colonias.store')->name('colonias.store');

Route::get('colonias/{colonia}', [ColoniaController::class, 'show'])->middleware('can:colonias.show')->name('colonias.show');

Route::get('colonias/{colonia}/edit', [ColoniaController::class, 'edit'])->middleware('can:colonias.edit')->name('colonias.edit');

Route::put('colonias/{colonia}', [ColoniaController::class, 'update'])->middleware('can:colonias.update')->name('colonias.update');

Route::delete('colonias/{colonia}', [ColoniaController::class, 'destroy'])->middleware('can:colonias.destroy')->name('colonias.destroy');

//Rutas Lotes
Route::get('lotes', [LoteController::class, 'index'])->middleware('can:lotes.index')->name('lotes.index');

Route::post('lotes', [LoteController::class, 'store'])->middleware('can:lotes.store')->name('lotes.store');

Route::get('lotes/{lote}', [LoteController::class, 'show'])->middleware('can:lotes.show')->name('lotes.show');

Route::get('lotes/{lote}/edit', [LoteController::class, 'edit'])->middleware('can:lotes.edit')->name('lotes.edit');

Route::put('lotes/{lote}', [LoteController::class, 'update'])->middleware('can:lotes.update')->name('lotes.update');

Route::delete('lotes/{lote}', [LoteController::class, 'destroy'])->middleware('can:lotes.destroy')->name('lotes.destroy');

Route::get('lotes/{lote}/print', [LoteController::class, 'print'])->middleware('can:lotes.print')->name('lotes.print');

//Rutas Posesionarios
Route::get('posesionarios', [PosesionarioController::class, 'index'])->middleware('can:posesionarios.index')->name('posesionarios.index');

Route::post('posesionarios', [PosesionarioController::class, 'store'])->middleware('can:posesionarios.store')->name('posesionarios.store');

Route::get('posesionarios/{posesionario}', [PosesionarioController::class, 'show'])->middleware('can:posesionarios.show')->name('posesionarios.show');

Route::get('posesionarios/{posesionario}/edit', [PosesionarioController::class, 'edit'])->middleware('can:posesionarios.edit')->name('posesionarios.edit');

Route::put('posesionarios/{posesionario}', [PosesionarioController::class, 'update'])->middleware('can:posesionarios.update')->name('posesionarios.update');

Route::delete('posesionarios/{posesionario}', [PosesionarioController::class, 'destroy'])->middleware('can:posesionarios.destroy')->name('posesionarios.destroy');

//Rutas Asignados
Route::get('asignados', [AsignadoController::class, 'index'])->middleware('can:asignados.index')->name('asignados.index');

Route::post('asignados', [AsignadoController::class, 'store'])->middleware('can:asignados.store')->name('asignados.store');

Route::get('asignados/{asignado}', [AsignadoController::class, 'show'])->middleware('can:asignados.show')->name('asignados.show');

Route::get('asignados/{asignado}/edit', [AsignadoController::class, 'edit'])->middleware('can:asignados.edit')->name('asignados.edit');

Route::put('asignados/{asignado}', [AsignadoController::class, 'update'])->middleware('can:asignados.update')->name('asignados.update');

Route::put('asignados/{asignado}/validar', [AsignadoController::class, 'validar'])->middleware('can:asignados.validar')->name('asignados.validar');

Route::delete('asignados/{asignado}', [AsignadoController::class, 'destroy'])->middleware('can:asignados.destroy')->name('asignados.destroy');

//Rutas Pagos
Route::get('pagos', [PagoController::class, 'index'])->middleware('can:pagos.index')->name('pagos.index');

Route::post('pagos', [PagoController::class, 'store'])->middleware('can:pagos.store')->name('pagos.store');

Route::get('pagos/{pago}', [PagoController::class, 'show'])->middleware('can:pagos.show')->name('pagos.show');

Route::get('pagos/{pago}/edit', [PagoController::class, 'edit'])->middleware('can:pagos.edit')->name('pagos.edit');

Route::put('pagos/{pago}', [PagoController::class, 'update'])->middleware('can:pagos.update')->name('pagos.update');

Route::delete('pagos/{pago}', [PagoController::class, 'destroy'])->middleware('can:pagos.destroy')->name('pagos.destroy');

Route::get('pagos/{pago}/print', [PagoController::class, 'print'])->middleware('can:pagos.print')->name('pagos.print');

Route::get('pagos/{pago}/pdf', [PagoController::class, 'pdf'])->middleware('can:pagos.pdf')->name('pagos.pdf');

//Rutas Inspecciones
Route::get('inspecciones', [InspeccionController::class, 'index'])->middleware('can:inspecciones.index')->name('inspecciones.index');

Route::post('inspecciones', [InspeccionController::class, 'store'])->middleware('can:inspecciones.store')->name('inspecciones.store');

Route::get('inspecciones/{inspeccion}',[InspeccionController::class, 'show'])->middleware('can:inspecciones.show')->name('inspecciones.show');

Route::get('inspecciones/{inspeccion}/edit',[InspeccionController::class, 'edit'])->middleware('can:inspecciones.edit')->name('inspecciones.edit');

Route::put('inspecciones/{inspeccion}', [InspeccionController::class, 'update'])->middleware('can:inspecciones.update')->name('inspecciones.update');

Route::delete('inspecciones/{inspeccion}', [InspeccionController::class, 'destroy'])->middleware('can:inspecciones.destroy')->name('inspecciones.destroy');

Route::get('inspecciones/{inspeccion}/print', [InspeccionController::class, 'print'])->middleware('can:inspecciones.print')->name('inspecciones.print');

//Rutas Escrituras
Route::get('escrituras', [EscrituraController::class, 'index'])->middleware('can:escrituras.index')->name('escrituras.index');

Route::post('escrituras', [EscrituraController::class, 'store'])->middleware('can:escrituras.store')->name('escrituras.store');

Route::get('escrituras/{escritura}', [EscrituraController::class, 'show'])->middleware('can:escrituras.show')->name('escrituras.show');

Route::get('escrituras/{escritura}/edit', [EscrituraController::class, 'edit'])->middleware('can:escrituras.edit')->name('escrituras.edit');

Route::put('escrituras/{escritura}', [EscrituraController::class, 'update'])->middleware('can:escrituras.update')->name('escrituras.update');

Route::delete('escrituras/{escritura}', [EscrituraController::class, 'destroy'])->middleware('can:escrituras.destroy')->name('escrituras.destroy');

Route::get('escrituras/{escritura}/print', [EscrituraController::class, 'print'])->middleware('can:escrituras.print')->name('escrituras.print');

Route::get('escrituras/{escritura}/pdf', [EscrituraController::class, 'pdf'])->middleware('can:escrituras.pdf')->name('escrituras.pdf');


//Ruta Acerca de
Route::view('acercade','acercade')->name('acercade');