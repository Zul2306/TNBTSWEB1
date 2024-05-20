<?php

use Illuminate\Support\Facades\Route;

// Route untuk halaman login menggunakan LoginController dengan method index
Route::get('/login', [App\Http\Controllers\Auth\LoginController::class, 'index'])->name('login');
Route::post('/logout', [App\Http\Controllers\Auth\LoginController::class, 'logout'])->name('logout');

// Route untuk root URL yang mengembalikan view 'welcome'
Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


