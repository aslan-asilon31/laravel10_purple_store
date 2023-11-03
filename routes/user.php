<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserMasterController;
use App\Http\Controllers\UserController;


Route::get('/usermasters', [UserMasterController::class, 'index'])->name('usermaster.index');
Route::get('/usermasterlist', [UserMasterController::class, 'getdata'])->name('usermaster.list');

Route::resource('users', UserController::class);
Route::get('/userslist', [UserController::class, 'getdata'])->name('users.list');
