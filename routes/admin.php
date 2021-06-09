<?php

use App\Http\Controllers\Admin\ConceptoController;
use App\Http\Controllers\Admin\DirectorController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\InspectorController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\AsignadoController;
use App\Http\Controllers\ColoniaController;
use App\Http\Controllers\LoteController;
use App\Http\Controllers\PosesionarioController;


Route::get('',[HomeController::class, 'index'])->name('admin.index');

Route::resource('users', UserController::class)->names('admin.users');

Route::resource('directors', DirectorController::class)->names('admin.directors');

Route::resource('inspectors', InspectorController::class)->names('admin.inspectors');

Route::resource('conceptos', ConceptoController::class)->names('admin.conceptos');

//Papelera de reciclaje colonias

Route::get('colonias', [ColoniaController::class, 'trash'])->name('admin.colonias.trash');

Route::get('colonias/restore/{colonia}', [ColoniaController::class, 'restore'])->name('admin.colonias.restore');

Route::get('colonias/recycle/{colonia}', [ColoniaController::class, 'recycle'])->name('admin.colonias.recycle');

//Papelera de reciclaje lotes

Route::get('lotes', [LoteController::class, 'trash'])->name('admin.lotes.trash');

Route::get('lotes/restore/{lote}', [LoteController::class, 'restore'])->name('admin.lotes.restore');

Route::get('lotes/recycle/{lote}', [LoteController::class, 'recycle'])->name('admin.lotes.recycle');

//Papelera de reciclaje posesionarios

Route::get('posesionarios', [PosesionarioController::class, 'trash'])->name('admin.posesionarios.trash');

Route::get('posesionarios/restore/{posesionario}', [PosesionarioController::class, 'restore'])->name('admin.posesionarios.restore');

Route::get('posesionarios/recycle/{posesionario}', [PosesionarioController::class, 'recycle'])->name('admin.posesionarios.recycle');

//Papelera de reciclaje asignados

Route::get('asignados', [AsignadoController::class, 'trash'])->name('admin.asignados.trash');

Route::get('asignados/restore/{asignado}', [AsignadoController::class, 'restore'])->name('admin.asignados.restore');

Route::get('asignados/recycle/{asignado}', [AsignadoController::class, 'recycle'])->name('admin.asignados.recycle');