<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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
// Route::post('/register', [\App\Http\Controllers\AdminController::class, 'registeradmin']);
// Route::get('/register', [\App\Http\Controllers\AdminController::class, 'showRegisForm'])->name('admin.registeradmin');
Route::post('/Auth/login', [\App\Http\Controllers\AdminController::class, 'read'])->name('admin.read');
Route::get('/home', [App\Http\Controllers\AdminController::class, 'index'])->name('dashboard')->middleware('auth');

Auth::routes();
Route::post('/logout', function () {auth()->logout();return redirect('/');})->name('logout');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
