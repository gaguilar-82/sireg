<?php

use App\Http\Controllers\Admin\DirectorController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\InspectorController;
use App\Http\Controllers\Admin\TrabajadorController;
use App\Http\Controllers\Admin\UserController;




Route::get('',[HomeController::class, 'index'])->name('admin.index');

Route::resource('users', UserController::class)->names('admin.users');

Route::resource('directors', DirectorController::class)->names('admin.directors');

Route::resource('inspectors', InspectorController::class)->names('admin.inspectors');
