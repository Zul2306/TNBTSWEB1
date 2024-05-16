<?php

use Illuminate\Support\Facades\Route;


Route::get('/login', [App\Http\Controllers\LoginController::class, 'index']);

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
