<?php

use App\Http\Controllers\Admin\ConceptoController;
use App\Http\Controllers\Admin\DirectorController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\InspectorController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\ColoniaController;
use App\Http\Controllers\LoteController;


Route::get('',[HomeController::class, 'index'])->name('admin.index');

Route::resource('users', UserController::class)->names('admin.users');

Route::resource('directors', DirectorController::class)->names('admin.directors');

Route::resource('inspectors', InspectorController::class)->names('admin.inspectors');

Route::resource('conceptos', ConceptoController::class)->names('admin.conceptos');

//Papelera de reciclaje

Route::get('colonias', [ColoniaController::class, 'trash'])->name('admin.colonias.trash');

Route::get('colonias/restore/{colonia}', [ColoniaController::class, 'restore'])->name('admin.colonias.restore');

Route::get('colonias/recycle/{colonia}', [ColoniaController::class, 'recycle'])->name('admin.colonias.recycle');

Route::get('lotes', [LoteController::class, 'trash'])->name('admin.lotes.trash');

Route::get('lotes/restore/{lote}', [LoteController::class, 'restore'])->name('admin.lotes.restore');

Route::get('lotes/recycle/{lote}', [LoteController::class, 'recycle'])->name('admin.lotes.recycle');