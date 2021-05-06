<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\UserController;


Route::get('admin',[HomeController::class, 'index']);

//Route::get('users',[UserController::class, 'index'])->name('users.index');

Route::resource('users', UserController::class)->names('admin.users');