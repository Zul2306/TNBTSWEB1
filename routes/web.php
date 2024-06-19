<?php

use App\Http\Controllers\WeatherController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\LaporanBencanaController;

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


Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::get('/Dashboard', [\App\Http\Controllers\DashboardController::class, 'index']);
Route::get('/Admin', [\App\Http\Controllers\AdminController::class, 'read'])->name('admin.read');
Route::post('/Admin', [\App\Http\Controllers\AdminController::class, 'store'])->name('admin.store');
Route::get('/Admin/index', [\App\Http\Controllers\AdminController::class, 'create'])->name('admin.create');
Route::get('/Admin/{id}/index', [\App\Http\Controllers\AdminController::class, 'edit'])->name('admin.edit');
Route::put('/Admin/update/{id}', [\App\Http\Controllers\AdminController::class, 'update'])->name('admin.update');
Route::delete('/admin/{id}', [\App\Http\Controllers\AdminController::class, 'delete'])->name('admin.delete');
Route::get('admin/login', [\App\Http\Controllers\AdminController::class, 'showLoginForm'])->name('admin.login');
Route::post('admin/login', [\App\Http\Controllers\AdminController::class, 'login']);
Route::get('/pengguna', [\App\Http\Controllers\PenggunaController::class, 'read'])->name('pengguna.read');
Route::delete('/pengguna/{id}', [\App\Http\Controllers\PenggunaController::class, 'destroy'])->name('pengguna.destroy');
// Route::get('/pengguna', 'PenggunaController@index')->name('pengguna.index');
Route::post('/Auth/login', [\App\Http\Controllers\AdminController::class, 'read'])->name('admin.read');
Route::get('/home', [App\Http\Controllers\AdminController::class, 'index'])->name('dashboard')->middleware('auth');
// routes/web.php
Route::get('/weather', [WeatherController::class, 'getWeather']);

// Menampilkan daftar laporan bencana
Route::get('/laporan-bencana', [LaporanBencanaController::class, 'index'])->name('laporan-bencana.index');
Route::get('/laporan-bencana/{id}/edit', [LaporanBencanaController::class, 'edit'])->name('laporan_bencana.edit');
Route::put('/laporan-bencana/{id}', [LaporanBencanaController::class, 'update'])->name('laporan_bencana.update');
Route::delete('/laporan-bencana/{id}', [LaporanBencanaController::class, 'destroy'])->name('laporan_bencana.destroy');
Auth::routes();
Route::post('/logout', function () {
    auth()->logout();
    return redirect('/');
})->name('logout');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
