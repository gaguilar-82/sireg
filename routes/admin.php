<?php

use App\Http\Controllers\Admin\ConceptoController;
use App\Http\Controllers\Admin\DirectorController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\InspectorController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\AsignadoController;
use App\Http\Controllers\ColoniaController;
use App\Http\Controllers\EscrituraController;
use App\Http\Controllers\InspeccionController;
use App\Http\Controllers\LoteController;
use App\Http\Controllers\PagoController;
use App\Http\Controllers\PosesionarioController;

Route::get('',[HomeController::class, 'index'])->name('admin.index');

Route::resource('users', UserController::class)->names('admin.users');

Route::resource('directors', DirectorController::class)->names('admin.directors');

Route::resource('inspectors', InspectorController::class)->names('admin.inspectors');

Route::resource('conceptos', ConceptoController::class)->names('admin.conceptos');

//Papelera de reciclaje colonias

Route::get('colonias', [ColoniaController::class, 'trash'])->middleware('can:admin.colonias.trash')->name('admin.colonias.trash');

Route::get('colonias/restore/{colonia}', [ColoniaController::class, 'restore'])->middleware('can:admin.colonias.restore')->name('admin.colonias.restore');

Route::get('colonias/recycle/{colonia}', [ColoniaController::class, 'recycle'])->middleware('can:admin.colonias.recycle')->name('admin.colonias.recycle');

//Papelera de reciclaje lotes

Route::get('lotes', [LoteController::class, 'trash'])->middleware('can:admin.lotes.trash')->name('admin.lotes.trash');

Route::get('lotes/restore/{lote}', [LoteController::class, 'restore'])->middleware('can:admin.lotes.restore')->name('admin.lotes.restore');

Route::get('lotes/recycle/{lote}', [LoteController::class, 'recycle'])->middleware('can:admin.lotes.recycle')->name('admin.lotes.recycle');

//Papelera de reciclaje posesionarios

Route::get('posesionarios', [PosesionarioController::class, 'trash'])->middleware('can:admin.posesionarios.trash')->name('admin.posesionarios.trash');

Route::get('posesionarios/restore/{posesionario}', [PosesionarioController::class, 'restore'])->middleware('can:admin.posesionarios.restore')->name('admin.posesionarios.restore');

Route::get('posesionarios/recycle/{posesionario}', [PosesionarioController::class, 'recycle'])->middleware('can:admin.posesionarios.recycle')->name('admin.posesionarios.recycle');

//Papelera de reciclaje asignados

Route::get('asignados', [AsignadoController::class, 'trash'])->middleware('can:admin.asignados.trash')->name('admin.asignados.trash');

Route::get('asignados/restore/{asignado}', [AsignadoController::class, 'restore'])->middleware('can:admin.asignados.restore')->name('admin.asignados.restore');

Route::get('asignados/recycle/{asignado}', [AsignadoController::class, 'recycle'])->middleware('can:admin.asignados.recycle')->name('admin.asignados.recycle');

//Papelera de reciclaje pagos

Route::get('pagos', [PagoController::class, 'trash'])->middleware('can:admin.pagos.trash')->name('admin.pagos.trash');

Route::get('pagos/restore/{pago}', [PagoController::class, 'restore'])->middleware('can:admin.pagos.restore')->name('admin.pagos.restore');

Route::get('pagos/recycle/{pago}', [PagoController::class, 'recycle'])->middleware('can:admin.pagos.recycle')->name('admin.pagos.recycle');

//Papelera de reciclaje inspecciones

Route::get('inspecciones', [InspeccionController::class, 'trash'])->middleware('can:admin.inspecciones.trash')->name('admin.inspecciones.trash');

Route::get('inspecciones/restore/{inspeccion}', [InspeccionController::class, 'restore'])->middleware('can:admin.inspecciones.restore')->name('admin.inspecciones.restore');

Route::get('inspecciones/recycle/{inspeccion}', [InspeccionController::class, 'recycle'])->middleware('can:admin.inspecciones.recycle')->name('admin.inspecciones.recycle');

//Papelera de reciclaje escrituras

Route::get('escrituras', [EscrituraController::class, 'trash'])->middleware('can:admin.escrituras.trash')->name('admin.escrituras.trash');

Route::get('escrituras/restore/{escritura}', [EscrituraController::class, 'restore'])->middleware('can:admin.escrituras.restore')->name('admin.escrituras.restore');

Route::get('escrituras/recycle/{escritura}', [EscrituraController::class, 'recycle'])->middleware('can:admin.escrituras.recycle')->name('admin.escrituras.recycle');