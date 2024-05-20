<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::get('/Admin', [\App\Http\Controllers\AdminController::class, 'read']);
Route::post('/Admin', [\App\Http\Controllers\AdminController::class, 'store']);
Route::get('/Admin/index', [\App\Http\Controllers\AdminController::class, 'create']);
Route::get('/Admin/{id}/index', [\App\Http\Controllers\AdminController::class, 'edit']);
Route::put('/Admin/update/{id}', [\App\Http\Controllers\AdminController::class, 'update'])->name('admin.update');
Route::delete('/admin/{id}', [\App\Http\Controllers\AdminController::class, 'delete'])->name('admin.delete');
